<?php
$image = get_sub_field('image');
$image_caption = get_sub_field('image_caption');
?>
<section class="flexible-section">
  <div class="container">
    <div class="full-width-wrap image-wrap">
      <img src="<?php echo $image["url"]; ?>" alt="">
      <span class="caption"><?php echo $image_caption; ?></span>
    </div>
  </div>

</section>