<?php
$data = get_userdata($student_id);
$name = $data->display_name;
$link = esc_url(get_author_posts_url($student_id));
$aof_list = get_field('focus', 'user_' . $student_id);
$program = get_field('program', 'user_' . $student_id);
$headshots = get_field('headshots', 'user_' . $student_id);
?>
<div class="student-card">
  <a href="<?php echo $link; ?>">
    <div class="student-wrap">
      <div class="student student-planet">
        <div class="gradient gradient-<?php echo sprintf(
          '%02d',
          rand(1, 59)
        ); ?> spin"></div>
        <div class="headshot">
          <img <?php responsive_image(
            $headshots['without_mask'],
            'thumb-640',
            '640px'
          ); ?>  alt="<?php echo $name; ?>"
              loading="lazy"
            />
        </div>
      </div>
      <div class="student-info">
        <div class="general">
          <div class="student-name"><strong class=""><?php echo $name; ?></strong></div>
          <div class="student-program" title="<?php echo $program; ?>" >
            <?php get_template_part('components/glyphs/glyph', $program); ?>
          </div>
        </div>
        <ul class="areas-of-focus">
          <?php foreach ($aof_list as $aof) {
            echo '<li>' . $aof->name . '</li>';
          } ?>
        </ul>
      </div>
    </div>
  </a>
</div>


