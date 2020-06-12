<?php
$current_user = get_user_by('slug', get_query_var('author_name'));
$args = [
  'author' => $current_user->ID,
  'post_type' => 'projects',
  'meta_key' => 'project_priority',
  'orderby' => 'meta_value', // acf that we want
  'order' => 'ASC',
  'posts_per_page' => '3',
]; // get his posts 'ASC'
$current_user_posts = get_posts($args);
?>

<div class="student-projects">
  <div class="container">

    <?php if ($current_user_posts): ?>
    <div class="student-projects-grid">

      <?php foreach ($current_user_posts as $post):
        setup_postdata($post); ?>
          <a href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>" class="student-project">

              <div class="featured-image">
                <?php $featured_image = get_field('featured_image'); ?>
                <img
                class="two-by-one"
                <?php responsive_image(
                  $featured_image['two-to-one'],
                  'thumb-640',
                  '1200px'
                ); ?>
                alt="<?php echo the_title(); ?>"
                />
                <img
                class="rectangle"
                <?php responsive_image(
                  $featured_image['rectangle'],
                  'thumb-640',
                  '640px'
                ); ?>
                alt="<?php echo the_title(); ?>"
                />
              </div>

              <div class="project-overview">
                <div class="project-meta">
                  <div class="project-info">
                    <h2 class="headline"><?php the_title(); ?></h2>
                    <div class="areas-of-focus">
                      <span class="subhead">
                      <?php
                      $tags = get_field('project_tags');
                      $lastKey = array_key_last($tags);
                      foreach ($tags as $i => $tag) {
                        echo $tag->name;
                        if ($i !== $lastKey) {
                          echo ', ';
                        }
                      }
                      ?>
                      </span>
                    </div>
                  </div>

                  <?php if (get_field('tagline')): ?>
                    <div class="project-tagline">
                      <?php the_field('tagline'); ?>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="project-glyph">
                </div>
              </div>

          </a>

      <?php
      endforeach; ?>
    </div>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
</div>