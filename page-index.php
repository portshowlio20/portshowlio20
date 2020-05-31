<?php
/**
 * The page-index template file
 *
 * This basically overwrites the "Index" page that is/was created in the WP dashboard.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portshowlio20
 */

get_header(); ?>

<body id="our-index">

  <main id="index" class="site-main">

  <?php get_template_part('components/index/filter', 'form'); ?>
  <?php get_template_part('components/index/filter', 'response'); ?>

	</main><!-- #main -->

</body>
<?php get_footer();
