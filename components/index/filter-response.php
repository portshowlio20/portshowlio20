<section>
  <div class="container" id="loading-container">
    <div id="loading">
      <span>Hang tight, we're recieving transmissions...</span>
    </div>
    <div id="response" class="grid works-grid" data-active="works">
      <?php
      $loop = new WP_Query([
        'post_type' => 'projects',
        'category__not_in' => 1,
        'orderby' => 'rand',
        'post_status' => 'publish',
        'posts_per_page' => 10,
      ]);
      if ($loop->have_posts()):
        while ($loop->have_posts()):
          $loop->the_post();
          get_template_part('components/grid-cards/project', 'card');
        endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>