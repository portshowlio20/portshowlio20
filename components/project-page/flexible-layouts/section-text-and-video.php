<?php
$title = get_sub_field("text")["title"];
$content = get_sub_field("text")["content"];
$video = get_sub_field("video")["video"];
$video_caption = get_sub_field("video")["video_caption"];
$video_side = get_sub_field("video")["video_side"];
?>

<section class="flexible-section">
  <div class="container">
    <span class="section-info-title">text and video</span>

    <?php if ($video_side == "right"): ?>
    <div class="text">
      <h3><?php echo $title; ?></h3>
      <p><?php echo $content; ?></p>
    </div>
    <div class="video">
      <div>
        <div class="embed-container"><?php echo $video; ?></div>
        <span><?php echo $video_caption; ?></span>
      </div>
    </div>
    <?php else: ?>
    <div class="video">
      <div>
        <div class="embed-container"><?php echo $video; ?></div>
        <span><?php echo $video_caption; ?></span>
      </div>
    </div>
      <div class="text">
      <h3><?php echo $title; ?></h3>
      <p><?php echo $content; ?></p>
    </div>


    <?php endif; ?>
  </div>
</section>
