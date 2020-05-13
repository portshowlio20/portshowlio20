<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portshowlio20
 */

get_header(); ?>

  <main id="primary" class="site-main">

  <style>.featured-image{max-width:75px;}</style>

  <form method="POST" id="filter" action="">
  <?php
  $cat_args = [
    'exclude' => [1], // "Uncategorized"
    'option_all' => 'All',
  ];

  $categories = get_categories($cat_args);

  foreach ($categories as $cat): ?>
      <div>
        <input
          type="checkbox"
          id="<?php echo $cat->name; ?>"
          value="<?php echo $cat->term_id; ?>"
          checked
        >
        <label for="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></label>
      </div>
    <?php endforeach;
  ?>
  </form>

  <div id="work" style="">
  <?php
  $loop = new WP_Query(['post_type' => 'projects']);
  if ($loop->have_posts()):
    while ($loop->have_posts()):
      $loop->the_post(); ?>

            <a href="<?php the_permalink(); ?>">
              <div class="image">
                <div class="featured-image">
                  <img class="my_class" <?php responsive_image(
                    get_field('featured_image'),
                    'thumb-640',
                    '640px'
                  ); ?>  alt="text" />
                </div>
              </div>
              <div class="project-meta">
                <h2><?php echo get_the_title(); ?></h2>
                <ul><?php
                $terms = get_the_terms($post->ID, 'category');
                $categories = [];
                if ($terms) {
                  foreach ($terms as $category) {
                    $categories[] = $category->name;
                  }
                }

                if ($categories) {
                  foreach ($categories as $category) {
                    echo '<li>' . $category . '</li>';
                  }
                }
                ?></ul>
              </div>
            </a>

        <?php
    endwhile;
  endif;
  wp_reset_postdata();
  ?>
  </div>
	</main><!-- #main -->

<?php get_footer();
