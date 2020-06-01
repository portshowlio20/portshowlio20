<?php
$title = get_sub_field("text")["title"];
$content = get_sub_field("text")["content"];
$image = get_sub_field("image")["image"];
$image_caption = get_sub_field("image")["image_caption"];
$image_side = get_sub_field("image")["image_side"];
?>

<section class="flexible-section">
  <div class="container">

    <div class="row <?= $gallery_side == "right" ? "flip-order" : "" ?>">

      <div class="column">
        <div class="text">
          <div class="text-wrap">
            <?php if ($title): ?>
              <h3 class="subhead"><?php echo $title; ?></h3>
            <?php endif; ?>
            <p><?php echo $content; ?></p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="image">
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

  </div>
</section>
