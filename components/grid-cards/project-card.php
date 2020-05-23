<?php
$project_card_classes = [
  'square-small',
  'square-medium',
  'square-large',
  'rectangle-medium',
  'rectangle-large',
];
$random_card_class = $project_card_classes[rand(0, 4)];
$featured_images = get_field('featured_image');
?>
<div class="project-card <?php echo $random_card_class; ?>">
  <div class="project-image">
    <a href="<?php the_permalink(); ?>">
      <div class="placeholder">
        <div class="gradient gradient-10"></div>
      </div>
      <?php if (strpos($random_card_class, 'square') === false) { ?>
      <img <?php responsive_image(
        $featured_images['rectangle'],
        'thumb-640',
        '640px'
      ); ?>  alt="<?php echo get_the_title(); ?>"
        loading="lazy"
       />
      <?php } else { ?>
        <img <?php responsive_image(
          $featured_images['square'],
          'thumb-640',
          '640px'
        ); ?>  alt="<?php echo get_the_title(); ?>"
          loading="lazy"
        />
      <?php } ?>
      </div>
    </a>
  <div class="project-meta">
    <a href="<?php the_permalink(); ?>">
      <h3 class="project-name"><?php echo get_the_title(); ?></h3>
      <ul class="areas-of-focus">
        <?php
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
        ?>
      </ul>
    </a>
  </div>
</div>