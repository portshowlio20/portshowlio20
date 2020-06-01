<?php
$image = get_sub_field('image');
$image_caption = get_sub_field('image_caption');
?>
<section class="flexible-section">
  <div class="container">
    <div class="full-width-wrap">
      <div class="image-wrap">
        <a
          class="solo-image"
          href="<?php echo $image["url"]; ?>"
          data-fancybox="gallery-<?php echo get_row_index(); ?>"
        >
          <img
            <?php responsive_image($image["id"], 'thumb-640', '640px'); ?>
            alt="<?php echo $image["alt"]; ?>"
            data-caption="<?php echo $image["caption"]; ?>"
            />
        </a>
        <?php if ($image_caption): ?>
          <span class="caption"><?php echo $image_caption; ?></span>
        <?php endif; ?>
      </div>
    </div>
  </div>

</section>