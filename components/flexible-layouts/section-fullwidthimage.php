<?php
$image = get_sub_field('image');
$image_caption = get_sub_field('image_caption');
?>
<section class="flexible-section">
  <span class="section-info-title">fullwidthimage</span>

  <img src="<?php echo $image["url"]; ?>" alt="">
  <span><?php echo $image_caption; ?></span>


</section>