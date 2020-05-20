<?php
/**
 * The template for displaying Author Archive pages.
 */

get_header(); ?>

<section>
  <div>

  <?php
  $current_student = $curauth = isset($_GET['author_name'])
    ? get_user_by('slug', $author_name)
    : get_userdata(intval($author));

  $id = $current_student->id;
  $name = $current_student->display_name;
  ?>

  Hello from author.php

  <p><?php echo $name; ?></p>
  <p><?php echo $id; ?></p>
  <pre><?php var_dump($current_student); ?></pre>

  </div>
</section>
<?php get_footer(); ?>
