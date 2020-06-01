<?php
$title = get_sub_field("text")["title"];
$content = get_sub_field("text")["content"];
$images = get_sub_field("gallery")["gallery"];
$gallery_side = get_sub_field("gallery")["gallery_side"];
$gallery_caption = get_sub_field("gallery")["gallery_caption"];
if ($images): ?>

<section class="flexible-section">
  <div class="container">

    <div class="row <?= $gallery_side == "right" ? "flip-order" : "" ?>">

      <div class="column">
        <div class="text">
          <div class="text-wrap">
            <?php if ($title): ?>
              <h3 class="subhead"><?php echo $title; ?></h3>
            <?php endif; ?>
            <?php echo $content; ?>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="gallery">
          <div class="gallery-list">
            <?php foreach ($images as $image): ?>

                <a
                  class="gallery-image"
                  href="<?php echo $image["url"]; ?>"
                  data-fancybox="gallery-<?php echo get_row_index(); ?>"
                >
                  <img
                    <?php responsive_image(
                      $image["id"],
                      'thumb-640',
                      '640px'
                    ); ?>
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

  </div>
</section>

<?php endif;
?>
