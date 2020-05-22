<section>
  <div class="container">
    <div id="response" class="grid">
      <?php
      $loop = new WP_Query(['post_type' => 'projects']);
      if ($loop->have_posts()):
        while ($loop->have_posts()):
          $loop->the_post();
          // TODO: randomly add .spacer divs here! (instead of with js!)
          get_template_part('components/grid-cards/project', 'card');
        endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>