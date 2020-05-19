<?php
$images = get_sub_field('gallery');
$gallery_caption = get_sub_field('gallery_caption');
if ($images): ?>
<section class="flexible-section">
  <span class="section-info-title">fullwidthgallery</span>
  <ul>
      <?php foreach ($images as $image): ?>
          <li>
              <?php echo $image["url"]; ?>
          </li>
      <?php endforeach; ?>
  </ul>
  <span><?php echo $gallery_caption; ?></span>
</section>
<?php endif; ?>
