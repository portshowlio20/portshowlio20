
  <div id="response" style="">
  <?php
  $loop = new WP_Query(['post_type' => 'projects']);
  if ($loop->have_posts()):
    while ($loop->have_posts()):
      $loop->the_post(); ?>

            <a href="<?php the_permalink(); ?>">
              <div class="image">
                <div class="featured-image">
                  <img class="my_class" <?php responsive_image(
                    get_field('featured_image'),
                    'thumb-640',
                    '640px'
                  ); ?>  alt="text" />
                </div>
              </div>
              <div class="project-meta">
                <h2><?php echo get_the_title(); ?></h2>
                <ul><?php
                $terms = get_the_terms($post->ID, 'category');
                $categories = [];
                if ($terms) {
                  foreach ($terms as $category) {
                    $categories[] = $category->name;
                  }
                }

                if ($categories) {
                  foreach ($categories as $category) {
                    echo '<li>' . $category . '</li>';
                  }
                }
                ?></ul>
              </div>
            </a>

        <?php
    endwhile;
  endif;
  wp_reset_postdata();
  ?>
  </div>