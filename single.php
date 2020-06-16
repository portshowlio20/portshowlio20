<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package portshowlio20
 */

get_header(); ?>

<main
  id="primary"
  class="site-main project-page"
  data-id="<?php the_ID(); ?>"
  data-author="<?php the_author_meta('ID'); ?>"
>

  <?php while (have_posts()):
    the_post();

    get_template_part('template-parts/content', get_post_type());
  endwhile; ?>

</main><!-- #main -->

<?php get_footer();
