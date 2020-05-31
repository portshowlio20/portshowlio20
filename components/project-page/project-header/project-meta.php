<div class="the-project-card">

  <div class="project-meta-wrap">
    <div class="project-meta">
      <h1 class="headline entry-title"><?php the_title(); ?></h1>

        <ul class="areas-of-focus">
          <?php
          $tags = get_field('project_tags');
          foreach ($tags as $tag) {
            echo '<li class="subhead">' . $tag->name . '</li>';
          }
          ?>
        </ul>

        <p><?php the_field('tagline'); ?></p>
    </div>

    <div class="project-overview">
      <h2 class="subhead">Project Overview</h2>
      <?php the_field('overview'); ?>
    </div>
  </div>

  <div class="project-roles">

    <?php get_template_part(
      'components/project-page/project-header/project',
      'owner'
    ); ?>

    <?php if (get_field('group_project') == 'yes') { ?>

        <?php get_template_part(
          'components/project-page/project-header/project',
          'collaborators'
        ); ?>

    <?php } ?>

  </div>
</div>