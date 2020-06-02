<?php
$project_card_classes = [
  'square-small',
  'square-medium',
  'square-large',
  'rectangle-medium',
  'rectangle-large',
];
$random_card_class = $project_card_classes[rand(0, 4)];
// $random_card_class = "rectangle-large";
$featured_images = get_field('featured_image');
$min_spacers = 2;
$max_spacers = 4;
$rand_before = rand($min_spacers, $max_spacers);
$rand_after = rand($min_spacers, $max_spacers);
?>
<?php for ($i = 1; $i <= $rand_before; $i++) { ?>
<div class="spacer"></div>
<?php } ?>
<div class="project-card-wrap <?php echo $random_card_class; ?>">
  <a href="<?php the_permalink(); ?>" class="project-card-link <?php echo $random_card_class; ?>">
    <div class="project-image">

        <div class="placeholder">
          <div class="gradient gradient-<?php echo sprintf(
            '%02d',
            rand(1, 59)
          ); ?>"></div>
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

    <div class="project-meta">

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

    </div>
  </a>
</div>
<?php for ($i = 1; $i <= $rand_after; $i++) { ?>
<div class="spacer"></div>
<?php } ?>
