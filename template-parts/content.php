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
      <div>
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

      <div>

      <?php if (get_field('group_project') == 'no') { ?>
        <span class="section-info-title">Your roles</span>
        <!-- TODO: get user/author info... have fun! -->
        <a href="#" alt="a link to your student page">
          <h2><?php echo get_the_author(); ?></h2>
          <img src="" alt="your headshot goes here">
          <ul class="your-roles">
            <?php
            $tags = get_field('your_roles');
            foreach ($tags as $tag) {
              echo '<li>' . $tag->name . '</li>';
            }
            ?>
          </ul>
        </a>
      <?php } elseif (get_field('group_project') == 'yes') { ?>
        <span class="section-info-title">Collaborators</span>
        <!-- TODO: get user/author info... have fun! -->
        <ul>
          <li>
            <a href="#" alt="a link to your student page">
              <h2><?php echo get_the_author(); ?></h2>
              <img src="" alt="your headshot goes here">
              <ul class="your-roles">
                <?php
                $tags = get_field('your_roles');
                foreach ($tags as $tag) {
                  echo '<li>' . $tag->name . '</li>';
                }
                ?>
              </ul>
            </a>
          </li>

<pre><?php var_dump(get_field('collaborators')); ?></pre>
<?php
$collabs = get_field('collaborators');

foreach ($collabs as $collab) { ?>
  <li><pre><?php var_dump($collab); ?></pre></li>
<?php }
?>



        </ul>
      <?php } ?>


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
