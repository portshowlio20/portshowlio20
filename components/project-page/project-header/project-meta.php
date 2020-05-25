<div class="project-card">

  <div class="project-meta-wrap">
    <div class="project-meta">
      <span class="section-info-title">Project title</span>
      <h1 class="headline entry-title"><?php the_title(); ?></h1>

      <div>
        <span class="section-info-title">Project tagline</span>
        <span><?php the_field('tagline'); ?></span>
      </div>

      <div class="project-tags" style="display: flex;">
        <span class="section-info-title">Project tags</span>
        <ul class="areas-of-focus">
          <?php
          $tags = get_field('project_tags');
          foreach ($tags as $tag) {
            echo '<li>' . $tag->name . '</li>';
          }
          ?>
        </ul>
      </div>
    </div>

    <div class="project-overview">
      <span class="section-info-title">Project overview</span>
      <h2><?php the_field('headline'); ?></h2>
      <div><?php the_field('overview'); ?></div>
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