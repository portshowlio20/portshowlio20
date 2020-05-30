<?php
/**
 * The template for displaying Author Archive pages.
 */

get_header(); ?>

<style>
 .section-info-title {
    color: red;
  }
</style>

<main id="temp-student">
<div class="container">

<div class="student-info">
  <div class="student-name">
  <?php
  $current_student = $curauth = isset($_GET['author_name'])
    ? get_user_by('slug', $author_name)
    : get_userdata(intval($author));

  $id = $current_student->id;
  $name = $current_student->display_name;
  ?>

  <h1 class="headline"><?php echo $name; ?></h1>

  </div>

  <div class="program">
  <span class="section-info-title">Program</span>
  <?php
  $field = get_field_object('program');
  $value = $field['value'];
  $label = $field['choices'][$value];
  ?>
  <p><?php echo esc_html($label); ?></span></p>
  </div>

  <div class="student-focus">
  <span class="section-info-title">Focus</span>
        <ul class="areas-of-focus">
          <?php
          $tags = get_field('focus');
          foreach ($tags as $tag) {
            echo '<li>' . $tag->name . '</li>';
          }
          ?>
        </ul>
  </div>


  <span class="section-info-title">Headshots</span>
<div class="headshots">
<?php if (have_rows('headshots')): ?>
    <?php while (have_rows('headshots')):

      the_row();

      // Get sub field values.
      $image = get_sub_field('without_mask');
      ?>
        <div>
        <img class="headshot"
        <?php responsive_image($image, 'thumb-640', '640px'); ?>
        alt="<?php echo $name; ?>"
        />
        </div>
    <?php
    endwhile; ?>
<?php endif; ?>

<?php if (have_rows('headshots')): ?>
    <?php while (have_rows('headshots')):

      the_row();
      // Get sub field values.
      $image = get_sub_field('with_mask');
      ?>
        <div>
          <img class="headshot"
          <?php responsive_image($image, 'thumb-640', '640px'); ?>
          alt="<?php echo $name; ?>"
          />
        </div>

    <?php
    endwhile; ?>
<?php endif; ?>

</div>

<div class="student-bio">
  <span class="section-info-title">Bio</span>
  <p><?php the_field('bio'); ?></p>
</div>

<div class="website">
  <span class="section-info-title">Portfolio Website</span>
  <p><?php the_field('portfolio_website'); ?></p>
</div>


<div class="across-the-net">
<?php if (have_rows('social_media')): ?>
      <?php while (have_rows('social_media')):
        the_row(); ?>

    <div class="social-network">
      <?php if (get_sub_field('instagram')): ?>
            <span class="section-info-title">Instagram</span>
          <?php echo the_sub_field('instagram'); ?>
      <?php endif; ?>
      </div>

      <div class="social-network">
      <?php if (get_sub_field('facebook')): ?>
        <span class="section-info-title">Facebook</span>
          <?php echo the_sub_field('facebooko'); ?>
      <?php endif; ?>
      </div>

      <div class="social-network">
      <?php if (get_sub_field('youtube')): ?>
        <span class="section-info-title">youtube</span>
          <?php echo the_sub_field('youtube'); ?>
      <?php endif; ?>
      </div>

      <div class="social-network">
      <?php if (get_sub_field('dribbble')): ?>
        <span class="section-info-title">Dribbble</span>
          <?php echo the_sub_field('dribbble'); ?>
      <?php endif; ?>
      </div>

      <div class="social-network">
      <?php if (get_sub_field('linkedin')): ?>
        <span class="section-info-title">LinkedIn</span>
          <?php echo the_sub_field('linkedin'); ?>
      <?php endif; ?>
      </div>

      <div class="social-network">
      <?php if (get_sub_field('twitter')): ?>
        <span class="section-info-title">Twitter</span>
          <?php echo the_sub_field('twitter'); ?>
      <?php endif; ?>
      </div>

      <div class="social-network">
      <?php if (get_sub_field('behance')): ?>
        <span class="section-info-title">Behance</span>
          <?php echo the_sub_field('behance'); ?>
      <?php endif; ?>
      </div>

      <div class="social-network">
      <?php if (get_sub_field('vimeo')): ?>
        <span class="section-info-title">Vimeo</span>
          <?php echo the_sub_field('vimeo'); ?>
      <?php endif; ?>
      </div>

      <div class="social-network">
      <?php if (get_sub_field('flickr')): ?>
        <span class="section-info-title">Flickr</span>
          <?php echo the_sub_field('flickr'); ?>
      <?php endif; ?>
      </div>

            <?php
      endwhile; ?>
          <?php endif; ?>
</div>
    </div>


<div class="project-grid">
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

<?php if ($current_user_posts): ?>

	<ul>

	<?php foreach ($current_user_posts as $post):
   setup_postdata($post); ?>
		<li>
      <div class="project">

       <div class="featured-image">
          <?php if (have_rows('featured_image')): ?>
          <?php while (have_rows('featured_image')):

            the_row(); // Get sub field values.
            $image = get_sub_field('rectangle');
            ?>
            <div>
            <img class="rectangle"
            <?php responsive_image($image, 'thumb-640', '640px'); ?>
            alt="<?php echo $name; ?>"
            />
            </div>
        <?php
          endwhile; ?>
        <?php endif; ?>

      <?php if (have_rows('featured_image')): ?>
      <?php while (have_rows('featured_image')):

        the_row(); // Get sub field values.
        $image = get_sub_field('square');
        ?>
          <div>
            <img class="square"
            <?php responsive_image($image, 'thumb-640', '640px'); ?>
            alt="<?php echo $name; ?>"
            />
          </div>

        <?php
      endwhile; ?>
        <?php endif; ?>
      </div>

      <div class="project-title">
      <h3 class="subhead"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>
      </div>

      <div class="project-tags">
      <span class="section-info-title">Project Tags</span>
      <ul class="areas-of-focus">
          <?php
          $tags = get_field('project_tags');
          foreach ($tags as $tag) {
            echo '<li>' . $tag->name . '</li>';
          }
          ?>
      </ul>
      </div>

      <div class="tagline">
      <span class="section-info-title">Project Tagline</span>
      <?php the_field('tagline'); ?>
      </div>
      </div>
		</li>

	<?php
 endforeach; ?>
	</ul>

	<?php wp_reset_postdata(); ?>

<?php endif; ?>
</div>


  </div>
</section>
<?php get_footer(); ?>
