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
          <img src="<?php echo $image["url"]; ?>" alt="">
          <span class="caption"><?php echo $image_caption; ?></span>
        </div>
      </div>

    </div>

  </div>
</section>
