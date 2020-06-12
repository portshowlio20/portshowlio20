<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portshowlio20
 */

get_header(); ?>

	<main id="primary" class="site-main page-temp">
    <div class="container">
      <?php
      while (have_posts()):
        the_post(); ?>
            <div class="entry-content-page">
                <?php the_content(); ?>
            </div>

        <?php
      endwhile;
      wp_reset_query();
      ?>
    </div>
	</main>

<?php get_footer();
