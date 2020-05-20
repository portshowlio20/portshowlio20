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
  .flexible-section {
    max-width: 1200px;
    margin: 0 auto;
    border-bottom: 1px dotted green;
    margin-bottom: 4rem;
  }

  .section-info-title {
    color: red;
  }
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    <?php
    if (is_singular()):
      the_title('<h1 class="entry-title">', '</h1>');
    else:
      the_title(
        '<h2 class="entry-title"><a href="' .
          esc_url(get_permalink()) .
          '" rel="bookmark">',
        '</a></h2>'
      );
    endif;

    if ('post' === get_post_type()): ?>
            <div class="entry-meta">
              <?php
              portshowlio20_posted_on();
              portshowlio20_posted_by();
              ?>
            </div><!-- .entry-meta -->
          <?php endif;
    ?>
    <?php echo portshowlio20_posted_by(); ?></pre>
	</header><!-- .entry-header -->

	<?php portshowlio20_post_thumbnail(); ?>

	<div class="entry-content">

    <div class="test">

      <?php if (have_rows('content_blocks')): ?>
        <?php while (have_rows('content_blocks')):
          the_row(); ?>

            <?php if (get_row_layout() == 'full_width_text'): ?>

                <?php get_template_part(
                  'components/flexible-layouts/section',
                  'full-width-text'
                ); ?>

            <?php elseif (get_row_layout() == 'full_width_image'): ?>

                <?php get_template_part(
                  'components/flexible-layouts/section',
                  'full-width-image'
                ); ?>

            <?php elseif (get_row_layout() == 'full_width_gallery'): ?>
                <?php get_template_part(
                  'components/flexible-layouts/section',
                  'full-width-gallery'
                ); ?>

            <?php elseif (get_row_layout() == 'full_width_video'): ?>

              <?php get_template_part(
                'components/flexible-layouts/section',
                'full-width-video'
              ); ?>

            <?php elseif (get_row_layout() == 'text_and_image'): ?>

              <?php get_template_part(
                'components/flexible-layouts/section',
                'text-and-image'
              ); ?>


            <?php elseif (get_row_layout() == 'text_and_gallery'): ?>

              <?php get_template_part(
                'components/flexible-layouts/section',
                'text-and-gallery'
              ); ?>


            <?php elseif (get_row_layout() == 'text_and_video'): ?>

              <?php get_template_part(
                'components/flexible-layouts/section',
                'text-and-video'
              ); ?>

            <?php endif; ?>
        <?php
        endwhile; ?>
      <?php endif; ?>
    </div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
