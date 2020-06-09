
<!--Bio Section Below-->
<div class="stewdent-bio">
  <div class="container">
    <div class="bio-grid">

      <div
        class="gradient
        gradient-<?php echo sprintf('%02d', rand(1, 59)); ?>">
      </div>

      <div class="headshot">
        <?php if (have_rows('headshots')): ?>
          <?php while (have_rows('headshots')):

            the_row();
            $headshot_without_mask = get_sub_field('without_mask');
            $headshot_with_mask = get_sub_field('with_mask');
            ?>

              <img
                class="without-mask"
                <?php responsive_image(
                  $headshot_without_mask,
                  'thumb-640',
                  '640px'
                ); ?>
                alt="<?php echo "$name"; ?>"
              />

              <img
                class="with-mask"
                <?php responsive_image(
                  $headshot_with_mask,
                  'thumb-640',
                  '640px'
                ); ?>
                alt="<?php echo "$name"; ?>"
              />

            <?php
          endwhile; ?>
        <?php endif; ?>
      </div>

      <a href="mailto:<?php echo $email; ?>" class="email">
        <div class="subhead">
          <?php echo $email; ?>
        </div>
      </a>

      <a href="https://<?php echo $portfolio_website; ?>" class="website" target="_blank" rel="noopener noreferrer">
        <div class="subhead">
          <?php echo $portfolio_website; ?>
        </div>
      </a>

      <div class="bio">
        <div class="student-name">
          <h1 class="headline"><?php echo $name; ?></h1>
          <!-- PHP for AOF glyphs here -->
        </div>
        <div class="field">
          <div class="areas-of-focus">
            <span class="subhead">
            <?php
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
        <div class="bio-copy">
          <p><?php the_field('bio'); ?></p>
        </div>
      </div>
      <div class="across-the-net">
        <ul class="across-the-net-links list-reset">
          <?php get_template_part(
            'components/student-page/student',
            'social'
          ); ?>
        </ul>
      </div>
    </div>
  </div>
</div>