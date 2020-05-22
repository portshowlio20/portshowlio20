<?php
/**
 * Rename "author/" slug to "student/"
 */
add_action('init', 'rename_author_to_student');
function rename_author_to_student()
{
  global $wp_rewrite;
  $author_slug = 'student'; // change slug name
  $wp_rewrite->author_base = $author_slug;
}
