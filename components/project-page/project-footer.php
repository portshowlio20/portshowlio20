<footer class="entry-footer">
  <div class="entry-footer-top">
    <div class="container">
      <div class="explore-more">
        <a
          href="<?php echo esc_url(
            get_author_posts_url(get_the_author_meta('ID'))
          ); ?>"
          title="<?php the_author(); ?>'s Student Page"
          rel="author"
          class="pull-quote"
        >
          Explore more projects by <?php the_author(); ?> →
        </a>
      </div>
    </div>
  </div>

  <div class="entry-footer-bottom">
    <div class="container">
      <div class="subhead">More projects to explore</div>
      <div class="similar-projects grid">
        <?php
        $tags = get_field('project_tags');
        $tag_list = [];
        foreach ($tags as $tag) {
          array_push($tag_list, $tag->term_id);
        }
        $the_query = new WP_Query([
          'post_type' => 'projects',
          'cat' => $tag_list,
          'orderby' => 'rand',
          'posts_per_page' => 5,
        ]);
        if ($the_query->have_posts()):
          while ($the_query->have_posts()):

            $the_query->the_post();
            $featured_images = get_field('featured_image');
            ?>

        <div class="project-card-wrap square-small">
          <a href="<?php the_permalink(); ?>" class="project-card-link square-small">
            <div class="project-image">

                  <img <?php responsive_image(
                    $featured_images['square'],
                    'thumb-640',
                    '640px'
                  ); ?>  alt="<?php echo get_the_title(); ?>"
                    loading="lazy"
                  />
                </div>

            <div class="project-meta">

                <h3 class="project-name"><?php echo get_the_title(); ?></h3>

            </div>
          </a>
        </div>

        <?php
          endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php
        else:
           ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php
        endif;
        ?>
        <!-- get list of focus for this projecy -->
        <!-- WP query within those categories -->
      </div>
    </div>
  </div>
</footer>