<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portshowlio20
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php get_template_part('components/project-page/project', 'header'); ?>

  <?php get_template_part('components/project-page/project', 'content'); ?>

  <?php get_template_part('components/project-page/project', 'footer'); ?>

</article><!-- #post-<?php the_ID(); ?> -->
