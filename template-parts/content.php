<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portshowlio20
 */
?>

<style>
  .flexible-section:first-of-type {
    border-top: 1px dotted green;
    margin-top: 4rem;
  }
  .flexible-section {
    border-bottom: 1px dotted green;
    padding: 4rem 0;
  }

  .section-info-title {
    color: red;
    margin-right: 1rem;
  }

  .pp {
    max-width: 50px;
  }
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php get_template_part('components/project-page/project', 'header'); ?>

  <?php get_template_part('components/project-page/project', 'content'); ?>

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
