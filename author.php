<?php
/**
 * The template for displaying Author Archive pages.
 */

get_header();

$current_student = $curauth = isset($_GET['author_name'])
  ? get_user_by('slug', $author_name)
  : get_userdata(intval($author));

$id = $current_student->id;
$program_field = get_field_object('program');
$program_value = $program_field['value'];
$program_label = $program_field['choices'][$program_value];
?>

<main id="student-profile">
  <?php
  set_query_var('name', $current_student->display_name);
  set_query_var('program', $program_label);
  set_query_var('tags', get_field('focus'));
  set_query_var('email', $current_student->user_email);
  set_query_var('portfolio_website', get_field('portfolio_website'));

  get_template_part('components/student-page/student', 'bio');

  get_template_part('components/student-page/student', 'projects');
  ?>


</main>
<?php get_footer(); ?>
