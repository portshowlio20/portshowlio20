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
    margin-right: 1rem;
  }

  .pp {
    max-width: 50px;
  }
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    <div class="container">
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <div>
        <span class="section-info-title">Tagline</span>
        <span><?php the_field('tagline'); ?></span>
      </div>
      <div style="display: flex;">
        <span class="section-info-title">Project tags</span>
        <ul class="areas-of-focus">
          <?php
          $tags = get_field('project_tags');
          foreach ($tags as $tag) {
            echo '<li>' . $tag->name . '</li>';
          }
          ?>
        </ul>
      </div>

      <div style="display: flex;">

     <?php
     $author = get_user_meta($post->post_author);
     $author_headshot_without_mask = $author['headshots_without_mask'];
     ?>
        <span class="section-info-title">Your roles</span>
        <!-- TODO: get user/author info... have fun! -->
        <a href="#" alt="a link to your student page">
          <h2><?php the_author(); ?></h2>
          <img class="pp" <?php responsive_image(
            $author_headshot_without_mask[0],
            'thumb-640',
            '640px'
          ); ?> alt="your headshot goes here">
          <ul class="your-roles list-reset areas-of-focus">
            <?php
            $tags = get_field('your_roles');
            if ($tags) {
              foreach ($tags as $tag) {
                echo '<li>' . $tag->name . '</li>';
              }
            }
            ?>
          </ul>
        </a>
      <?php if (get_field('group_project') == 'yes') {

        $author = get_user_meta($post->post_author);
        $author_headshot_without_mask = $author['headshots_without_mask'];
        ?>
        <span class="section-info-title">Collaborators</span>
        <!-- TODO: get user/author info... have fun! -->
        <ul class="list-reset">

          <?php if (have_rows('collaborators')): ?>
            <?php while (have_rows('collaborators')):

              the_row();

              $collaborator = get_sub_field('collaborator');
              $name = $collaborator['name']['display_name'];
              $roles = $collaborator['roles'];
              $user = get_user_meta($collaborator['name']['ID']);
              $headshot_without_mask = $user['headshots_without_mask'];
              ?>

                <li>

                  <a href="">
                    <h2><?= $name ?></h2>
                    <img class="pp" <?php responsive_image(
                      $headshot_without_mask[0],
                      'thumb-640',
                      '640px'
                    ); ?> alt="thier headshot goes here">
                    <h4>Roles</h4>
                    <ul class="your-roles list-reset areas-of-focus">
                      <?php foreach ($roles as $role) {
                        echo '<li>' . $role->name . '</li>';
                      } ?>
                    </ul>
                  </a>
                </li>


            <?php
            endwhile; ?>


          <?php endif; ?>

        </ul>
      <?php
      } ?>


      </div>
    </div>
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
