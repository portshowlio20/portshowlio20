<?php
$title = get_sub_field("text")["title"];
$content = get_sub_field("text")["content"];
$image = get_sub_field("image")["image"];
$image_caption = get_sub_field("image")["image_caption"];
$image_side = get_sub_field("image")["image_side"];
?>
<section class="flexible-section">
  <div class="container">
    <span class="section-info-title">text and image</span>

    <?php if ($image_side == "right"): ?>
    <div class="text">
      <h3><?php echo $title; ?></h3>
      <p><?php echo $content; ?></p>
    </div>
    <div class="image">
      <img src="<?php echo $image["url"]; ?>" alt="">
      <span><?php echo $image_caption; ?></span>
    </div>
    <?php else: ?>
      <div class="image">
      <img src="<?php echo $image["url"]; ?>" alt="">
      <span><?php echo $image_caption; ?></span>
    </div>
      <div class="content">
      <h3><?php echo $title; ?></h3>
      <p><?php echo $content; ?></p>
    </div>

    <?php endif; ?>
  </div>
</section>
