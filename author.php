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

<section id="temp-student">
  <div>

  <?php
  $current_student = $curauth = isset($_GET['author_name'])
    ? get_user_by('slug', $author_name)
    : get_userdata(intval($author));

  $id = $current_student->id;
  $name = $current_student->display_name;
  ?>

  <p><?php echo $name; ?></p>

  </div>

  <div class="container">

  <div>
  <span class="section-info-title">Program</span>
  <?php
  $field = get_field_object('program');
  $value = $field['value'];
  $label = $field['choices'][$value];
  ?>
  <p><?php echo esc_html($label); ?></span></p>
  </div>

  <div>
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

<div>
<span class="section-info-title">Headshots</span>

<?php if (have_rows('headshots')): ?>
    <?php while (have_rows('headshots')):

      the_row();

      // Get sub field values.
      $image = get_sub_field('without_mask');
      ?>
        <div>
            <img src="<?php echo wp_get_attachment_image(
              $image,
              $size
            ); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
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
            <img src="<?php echo wp_get_attachment_image(
              $image,
              $size
            ); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        </div>

    <?php
    endwhile; ?>
<?php endif; ?>

</div>

<div>
  <span class="section-info-title">Bio</span>
  <p><?php the_field('bio'); ?></p>
</div>

<div>
  <span class="section-info-title">Portfolio Website</span>
  <p><?php the_field('portfolio_website'); ?></p>
</div>


<div>
<?php if (have_rows('social_media')): ?>
      <?php while (have_rows('social_media')):
        the_row(); ?>

      <?php if (get_sub_field('instagram')): ?>
            <span class="section-info-title">Instagram</span>
          <?php echo the_sub_field('instagram'); ?>
      <?php endif; ?>

      <?php if (get_sub_field('youtube')): ?>
        <span class="section-info-title">youtube</span>
          <?php echo the_sub_field('youtube'); ?>
      <?php endif; ?>

      <?php if (get_sub_field('dribbble')): ?>
        <span class="section-info-title">Dribbble</span>
          <?php echo the_sub_field('dribbble'); ?>
      <?php endif; ?>

            <?php
      endwhile; ?>
          <?php endif; ?>
</div>



  </div>
</section>
<?php get_footer(); ?>
