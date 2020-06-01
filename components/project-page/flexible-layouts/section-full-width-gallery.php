<?php
$images = get_sub_field('gallery');
$gallery_caption = get_sub_field('gallery_caption');
if ($images): ?>
<section class="flexible-section">
  <div class="container">
    <div class="full-width-wrap">
      <div class="gallery-wrap">
        <div class="gallery-list">
          <?php foreach ($images as $image): ?>

              <a
                class="gallery-image"
                href="<?php echo $image["url"]; ?>"
                data-fancybox="gallery-<?php echo get_row_index(); ?>"
              >
                <img
                  <?php responsive_image($image["id"], 'thumb-640', '640px'); ?>
                  alt="<?php echo $image["alt"]; ?>"
                  data-caption="<?php echo $image["caption"]; ?>"
                  />
              </a>

          <?php endforeach; ?>
        </div>
        <?php if ($gallery_caption): ?>
          <span class="caption"><?php echo $gallery_caption; ?></span>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
