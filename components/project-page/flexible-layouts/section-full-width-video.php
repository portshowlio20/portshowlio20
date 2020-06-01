<section class="flexible-section">
  <div class="container">
    <div class="full-width-wrap">
      <div class="video-wrap">
        <div class="embed-container"><?php echo get_sub_field("video"); ?></div>
        <?php if (get_sub_field('video_caption')): ?>
          <span class="caption">
            <?php echo get_sub_field('video_caption'); ?>
          </span>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
