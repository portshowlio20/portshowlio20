<?php
$title = get_sub_field("text")["title"];
$content = get_sub_field("text")["content"];
$images = get_sub_field("gallery")["gallery"];
$gallery_side = get_sub_field("gallery")["gallery_side"];
$gallery_caption = get_sub_field("gallery")["gallery_caption"];
if ($images): ?>

<section class="flexible-section">
  <span class="section-info-title">text and gallery</span>

  <?php if ($gallery_side == "right"): ?>
  <div class="text">
    <h3><?php echo $title; ?></h3>
    <p><?php echo $content; ?></p>
  </div>
  <div class="gallery">
    <ul>
      <?php foreach ($images as $image): ?>
        <li>
          <!-- tbd... i think we'll want ACF to retun an array.. but thats not working right now... -->
          <?php echo $image; ?>
        </li>
      <?php endforeach; ?>
    </ul>
    <span><?php echo $gallery_caption; ?></span>
  </div>
  <?php else: ?>

  <div class="gallery">
    <ul>
      <?php foreach ($images as $image): ?>
        <li>
          <!-- tbd... i think we'll want ACF to retun an array.. but thats not working right now... -->
          <?php echo $image; ?>
        </li>
      <?php endforeach; ?>
    </ul>
    <span><?php echo $gallery_caption; ?></span>
  </div>
  <div class="text">
    <h3><?php echo $title; ?></h3>
    <p><?php echo $content; ?></p>
  </div>

  <?php endif; ?>
</section>

<?php endif;
?>
