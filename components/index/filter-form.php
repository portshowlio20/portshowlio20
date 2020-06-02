<div class="filter">
  <div class="container">
    <form method="POST" id="filter" action="">
      <div class="filter-header">
        <div id="works-students-toggle">
          <div class="toggle-option">
            <input type="radio" id="works-toggle" name="mainToggle" value="works" checked>
            <label for="works-toggle" class="subhead">Works</label>
          </div>
          <span class="toggle-divider">/</span>
          <div class="toggle-option">
            <input type="radio" id="students-toggle" name="mainToggle" value="students">
            <label for="students-toggle" class="subhead">Students</label>
          </div>
        </div>
        <div id="filter-dropdown-toggle">
          <div id="filter-active-glyph">
            <?php get_template_part('components/glyphs/glyph', 'all'); ?>
          </div>
          <span id="filter-state">
            Filter by area of focus
          </span>
          <div class="chevron">▼</div>
        </div>
      </div>
      <div class="filter-content">
        <div class="filter-content-header">
          <span id="filter-active"></span>
          <span id="filter-heading">Select a discipline to apply a filter</span>
        </div>
        <div class="filter-content-filters">
          <div id="aof-filters">
            <?php
            // TODO: update to just parent categories!
            // https://wordpress.stackexchange.com/questions/127872/get-only-the-top-level-categories-using-get-categories-without-foreach-loop
            $args = [
              'exclude' => 1,
              'parent' => 0,
              'hide_empty' => 0,
            ];
            $categories = get_categories($args);
            foreach ($categories as $cat): ?>
              <div >
                <input
                  type="checkbox"
                  id="<?php echo $cat->slug; ?>"
                  value="<?php echo $cat->term_id; ?>"
                  data-name="<?php echo $cat->name; ?>"
                  checked
                >
                <label for="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></label>
              </div>
            <?php endforeach;
            ?>
          </div>
        </div>
      </div>
  </div>
</section>