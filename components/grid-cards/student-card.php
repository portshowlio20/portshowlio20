<?php
$student_id = $student->ID;
$link = esc_url(get_author_posts_url($student_id));
$aof_list = get_field('focus', 'user_' . $student_id);
?>

<div>

  <a href="<?php echo $link; ?>">
  <?php echo $student->display_name; ?>
  </a>
  <ul>
    <?php foreach ($aof_list as $aof) {
      echo '<li>' . $area->name . '</li>';
    } ?>
  </ul>
</div>
