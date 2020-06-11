<header class="entry-header">
  <div class="container">
    <div class="featured-image">
      <?php
      $featured_image = get_field('featured_image');
      if ($featured_image): ?>
        <img
          class="two-to-one"
          <?php responsive_image(
            $featured_image['two-to-one'],
            'thumb-640',
            '640px'
          ); ?>
          alt="<?php the_title(); ?>"
        />
        <img
          class="square-for-mobile"
          <?php responsive_image(
            $featured_image['square'],
            'thumb-640',
            '640px'
          ); ?>
          alt="<?php the_title(); ?>"
        />
      <?php endif;
      ?>
    </div>

    <?php get_template_part(
      'components/project-page/project-header/project',
      'meta'
    ); ?>

  </div>
</header>