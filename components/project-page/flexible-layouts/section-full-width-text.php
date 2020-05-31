
<section class="flexible-section">
  <div class="container">
    <div class="full-width-wrap">
      <div class="text-wrap">
        <?php if (get_sub_field('title')): ?>
          <h3 class="subhead"><?php the_sub_field('title'); ?></h3>
        <?php endif; ?>
        <p><?php the_sub_field('content'); ?></p>
      </div>
    </div>
  </div>
</section>
