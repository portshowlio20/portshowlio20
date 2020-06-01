
<section class="flexible-section">
  <div class="container">
    <div class="full-width-wrap">
      <div class="text-wrap">
        <?php if (get_sub_field('title')): ?>
          <h3 class="subhead"><?php the_sub_field('title'); ?></h3>
        <?php endif; ?>
        <?php the_sub_field('content'); ?>
      </div>
    </div>
  </div>
</section>
