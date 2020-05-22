<section>
  <div class="container">
    <div id="response" class="grid">
      <?php
      $loop = new WP_Query(['post_type' => 'projects']);
      if ($loop->have_posts()):
        while ($loop->have_posts()):
          $loop->the_post(); ?>

              <?php get_template_part(
                'components/grid-cards/project',
                'card'
              ); ?>

            <?php
        endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>