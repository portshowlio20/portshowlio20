<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package portshowlio20
 */

get_header();

$search_string = esc_attr(trim(get_query_var('s')));
$terms = get_terms('category', [
  'name__like' => $search_string,
  'hide_empty' => true, // Optional
]);
$authors_id_array = [];
?>

	<main id="primary" class="site-main">

    <div class="results">

        <div class="student-results">
          <div class="container">
            <div class="search-result-heading"><h3 class="subhead">Students related to <span class="search-query"><?= get_search_query() ?></span></h3><div class="chevron"><?php get_template_part(
  'components/glyphs/glyph',
  'arrow'
); ?></div></div>
            <div class="grid" data-active="students">
              <?php
              $users_by_name = new WP_User_Query([
                'search' => "*{$search_string}*",
                'search_columns' => ['display_name'],
                'exclude' => '1',
                'role' => 'author',
                'has_published_posts' => ['projects'],
              ]);

              if (isset($terms)) {
                $meta_query_array = ['relation' => 'OR'];

                foreach ($terms as $term) {
                  // 1. make a temp array with first item of: 'key' => 'focus'
                  $temp_key = ['key' => 'focus'];
                  // 2. add second item of temp array: 'value' => $item in terms,
                  $temp_value = [
                    'value' => serialize(strval($term->term_id)),
                  ];
                  $temp_compare = ['compare' => 'LIKE'];
                  // array_push($temp_array, $temp_item);
                  $temp_merge = $temp_key + $temp_value + $temp_compare;
                  // 3. push this temp array to $meta_query_array
                  array_push($meta_query_array, $temp_merge);
                }

                $user_focus_meta_query_array = [
                  'role' => 'author',
                  'has_published_posts' => ['projects'],
                  'meta_query' => $meta_query_array,
                ];
              }

              $users_by_focus = new WP_User_Query($user_focus_meta_query_array);

              if (!empty($users_by_name->results)) {
                foreach ($users_by_name->results as $student) {
                  array_push($authors_id_array, $student->ID);
                  set_query_var('student_id', absint($student->ID));
                  get_template_part('components/grid-cards/student', 'card');
                }
              } elseif (!empty($users_by_focus->results)) {
                foreach ($users_by_focus->results as $student) {
                  set_query_var('student_id', absint($student->ID));
                  get_template_part('components/grid-cards/student', 'card');
                }
              } else {
                echo '<span class="no-results">';
                echo "[ 404 ] Oop, we couldn't any students related to " .
                  $search_string;
                echo "</span>";
              }

              wp_reset_postdata();
              ?>
            </div>
          </div>
        </div>

        <div class="work-results">
          <div class="container">
            <div class="search-result-heading"><h3 class="subhead">Works related to <span class="search-query"><?= get_search_query() ?></span></h3><div class="chevron"><?php get_template_part(
  'components/glyphs/glyph',
  'arrow'
); ?></div></div>
            <div class="grid works-grid">
              <?php
              $terms_id_array = [];
              foreach ($terms as $term) {
                array_push($terms_id_array, $term->term_id);
              }

              $work_by_focus = new WP_Query([
                'post_type' => 'projects',
                'post_status' => 'publish',
                'category__in' => $terms_id_array,
              ]);

              $work_by_author = new WP_Query([
                'post_type' => 'projects',
                'post_status' => 'publish',
                'author__in' => $authors_id_array,
              ]);

              $work_by_title = new WP_Query([
                'post_type' => 'projects',
                'post_status' => 'publish',
                's' => $search_string,
              ]);

              if (!empty($terms_id_array)):
                while ($work_by_focus->have_posts()):
                  $work_by_focus->the_post();
                  get_template_part('components/grid-cards/project', 'card');
                endwhile;
              elseif (!empty($authors_id_array)):
                while ($work_by_author->have_posts()):
                  $work_by_author->the_post();
                  get_template_part('components/grid-cards/project', 'card');
                endwhile;
              elseif (!empty($work_by_title->have_posts())):
                while ($work_by_title->have_posts()):
                  $work_by_title->the_post();
                  get_template_part('components/grid-cards/project', 'card');
                endwhile;
              endif;

              wp_reset_postdata();
              ?>
            </div>
          </div>
        </div>

    </div>

	</main><!-- #main -->

<?php get_footer();
