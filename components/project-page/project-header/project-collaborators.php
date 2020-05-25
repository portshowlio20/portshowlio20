<div class="project-collaborators">
  <span class="section-info-title">Collaborators</span>
  <ul class="list-reset">
  <?php if (have_rows('collaborators')): ?>
  <?php while (have_rows('collaborators')):

    the_row();

    $collaborator = get_sub_field('collaborator');
    $name = $collaborator['name']['display_name'];
    $roles = $collaborator['roles'];
    $student = get_user_meta($collaborator['name']['ID']);
    $student_headshot = $student['headshots_without_mask'];
    $student_link = get_author_posts_url($collaborator['name']['ID']);
    ?>

    <li>
      <a href="<?php echo esc_url(
        $student_link
      ); ?>" title="<?php echo $name; ?>'s Student Page">
        <h2><?php echo $name; ?></h2>

        <img class="collaborator-headshot"
          <?php responsive_image($student_headshot[0], 'thumb-640', '640px'); ?>
          alt="thier headshot goes here"
        />

        <h4>Roles</h4>
        <ul class="collaborator-roles list-reset areas-of-focus">
          <?php foreach ($roles as $role) {
            echo '<li>' . $role->name . '</li>';
          } ?>
        </ul>
      </a>
    </li>

  <?php
  endwhile; ?>
  <?php endif; ?>
  </ul>
</div>