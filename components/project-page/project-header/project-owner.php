<?php
$student = get_user_meta($post->post_author);
$student_name = get_the_author();
$student_headshot = $student['headshots_without_mask'];
$student_link = get_author_posts_url(get_the_author_meta('ID'));
?>
<address class="project-owner">
  <a
    href="<?php echo esc_url($student_link); ?>"
    title="<?php echo $student_name; ?>'s Student Page"
    rel="author"
  >

    <img class="headshot"
      <?php responsive_image($student_headshot[0], 'thumb-640', '640px'); ?>
      alt="your headshot goes here"
    />

    <h2 class="subhead"><?php echo $student_name; ?></h2>

    <ul class="your-roles list-reset areas-of-focus">
      <?php
      $roles = get_field('your_roles');
      if ($roles) {
        foreach ($roles as $role) {
          echo '<li>' . $role->name . '</li>';
        }
      }
      ?>
    </ul>
  </a>
</address>