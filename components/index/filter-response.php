<section>
  <div class="container">
    <div id="response" class="grid works-grid">
      <?php
      $loop = new WP_Query(['post_type' => 'projects', 'orderby' => 'rand']);
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