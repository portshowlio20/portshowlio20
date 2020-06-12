<?php
$title = get_sub_field("text")["title"];
$content = get_sub_field("text")["content"];
$video = get_sub_field("video")["video"];
$video_caption = get_sub_field("video")["video_caption"];
$video_side = get_sub_field("video")["video_side"];
?>


<section class="flexible-section">
  <div class="container">

    <div class="row <?= $video_side == "right" ? "flip-order" : "" ?>">

      <div class="column">
        <div class="text">
          <div class="text-wrap">
            <?php if ($title): ?>
              <h3 class="subhead"><?php echo $title; ?></h3>
            <?php endif; ?>
            <?php echo $content; ?>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="video">
          <div>
            <div class="embed-container"><?php echo $video; ?></div>
            <?php if ($video_caption): ?>
              <span class="caption"><?php echo $video_caption; ?></span>
            <?php endif; ?>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>