<?php
$title = get_sub_field("text")["title"];
$content = get_sub_field("text")["content"];
$images = get_sub_field("gallery")["gallery"];
$gallery_side = get_sub_field("gallery")["gallery_side"];
$gallery_caption = get_sub_field("gallery")["gallery_caption"];
if ($images): ?>

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
        <div class="gallery">
          <ul>
            <?php foreach ($images as $image): ?>
              <li>
                <!-- tbd... i think we'll want ACF to retun an array.. but thats not working right now... -->
                <?php echo $image; ?>
              </li>
            <?php endforeach; ?>
          </ul>
          <span class="caption"><?php echo $gallery_caption; ?></span>
        </div>
      </div>

    </div>

  </div>
</section>

<?php endif;
?>
