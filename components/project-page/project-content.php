<div class="entry-content">

<?php if (have_rows('content_blocks')): ?>
  <?php while (have_rows('content_blocks')):
    the_row(); ?>

      <?php if (get_row_layout() == 'full_width_text'): ?>

          <?php get_template_part(
            'components/project-page/flexible-layouts/section',
            'full-width-text'
          ); ?>

      <?php elseif (get_row_layout() == 'full_width_image'): ?>

          <?php get_template_part(
            'components/project-page/flexible-layouts/section',
            'full-width-image'
          ); ?>

      <?php elseif (get_row_layout() == 'full_width_pull_quote'): ?>

          <?php get_template_part(
            'components/project-page/flexible-layouts/section',
            'full-width-pull-quote'
          ); ?>

      <?php elseif (get_row_layout() == 'full_width_gallery'): ?>
          <?php get_template_part(
            'components/project-page/flexible-layouts/section',
            'full-width-gallery'
          ); ?>

      <?php elseif (get_row_layout() == 'full_width_video'): ?>

        <?php get_template_part(
          'components/project-page/flexible-layouts/section',
          'full-width-video'
        ); ?>

      <?php elseif (get_row_layout() == 'text_and_image'): ?>

        <?php get_template_part(
          'components/project-page/flexible-layouts/section',
          'text-and-image'
        ); ?>


      <?php elseif (get_row_layout() == 'text_and_gallery'): ?>

        <?php get_template_part(
          'components/project-page/flexible-layouts/section',
          'text-and-gallery'
        ); ?>


      <?php elseif (get_row_layout() == 'text_and_video'): ?>

        <?php get_template_part(
          'components/project-page/flexible-layouts/section',
          'text-and-video'
        ); ?>

      <?php endif; ?>

  <?php
  endwhile; ?>
<?php endif; ?>

</div>