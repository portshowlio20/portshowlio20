<?php
$images = get_sub_field('gallery');
$gallery_caption = get_sub_field('gallery_caption');
if ($images): ?>
<section class="flexible-section">
  <div class="container">
    <div class="full-width-wrap gallery-wrap">
      <ul>
          <?php foreach ($images as $image): ?>
              <li>
                  <?php echo $image["url"]; ?>
              </li>
          <?php endforeach; ?>
      </ul>
      <span class="caption"><?php echo $gallery_caption; ?></span>
    </div>
  </div>
</section>
<?php endif; ?>
