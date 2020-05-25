<?php
$image = get_sub_field('image');
$image_caption = get_sub_field('image_caption');
?>
<section class="flexible-section">
  <div class="container">
    <span class="section-info-title">full width image</span>

    <img src="<?php echo $image["url"]; ?>" alt="">
    <span class="caption"><span class="section-info-title">full width image caption</span><?php echo $image_caption; ?></span>

  </div>

</section>