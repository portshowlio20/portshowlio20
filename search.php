<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package portshowlio20
 */

get_header(); ?>

	<main id="primary" class="site-main">


    <header class="page-header">
      <h1 class="page-title">
        <!-- * translators: %s: search query. */ -->
        <?php printf(
          esc_html__('Search Results for: %s', 'portshowlio20'),
          '<span>' . get_search_query() . '</span>'
        ); ?>
      </h1>
    </header><!-- .page-header -->

    <div class="results">

        <div class="student-results">
          <div class="container">
            <h3 class="title">Students related to <?= get_search_query() ?></h3>
            <div class="grid">
              <!-- custom query here -->
              <!-- https://www.smashingmagazine.com/2016/03/advanced-wordpress-search-with-wp_query/ -->
              <!-- https://wordpress.stackexchange.com/questions/70864/meta-query-compare-operator-explanation -->
              <!-- https://wordpress.stackexchange.com/questions/105168/how-can-i-search-for-a-worpress-user-by-display-name-or-a-part-of-it -->
              <?php
              $search_string = esc_attr(trim(get_query_var('s')));
              $users = new WP_User_Query([
                'search' => "*{$search_string}*",
                'search_columns' => ['display_name'],
                'meta_query' => [
                  'relation' => 'OR',
                  [
                    'key' => 'first_name',
                    'value' => $search_string,
                    'compare' => 'LIKE',
                  ],
                  [
                    'key' => 'last_name',
                    'value' => $search_string,
                    'compare' => 'LIKE',
                  ],
                  [
                    'key' => 'focus',
                    'value' => $search_string,
                    'compare' => 'LIKE',
                  ],
                ],
              ]);
              $users_found = $users->get_results();
              if ($users_found) {
                foreach ($users_found as $user) {
                  echo '<pre>' . var_dump($user) . '</pre>';
                }
              } else {
                echo "<p>No students found!</p>" . get_search_query(true);
              }
              /* Restore original Post Data */
              wp_reset_postdata();
              ?>
            </div>
          </div>
        </div>

        <div class="work-results">
          <div class="container">
            <h3 class="title">Works related to <?= get_search_query() ?></h3>
            <div class="grid works-grid">
            <?php if (have_posts()): ?>
              <?php
              /* Start the Loop */
              while (have_posts()):
                the_post();
                // ✅ projects by name
                // 🔲 projects by author
                // 🔲 projects by project_tags
                get_template_part('components/grid-cards/project', 'card');
              endwhile;

              the_posts_navigation();
              ?>


            <?php else:echo "<p>No works found!</p>" .
                get_search_query(true);endif; ?>
            </div>
          </div>
        </div>

    </div>

	</main><!-- #main -->

<?php get_footer();
