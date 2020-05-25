<?php
$images = get_sub_field('gallery');
$gallery_caption = get_sub_field('gallery_caption');
if ($images): ?>
<section class="flexible-section">
  <div class="container">
    <span class="section-info-title">full width gallery</span>
    <ul>
        <?php foreach ($images as $image): ?>
            <li>
                <?php echo $image["url"]; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <span class="caption"><span class="section-info-title">full width image caption</span><?php echo $gallery_caption; ?></span>
  </div>
</section>
<?php endif; ?>
