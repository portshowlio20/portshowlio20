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
            <div class="sub-filters">
              <h3 class="subhead">Visual Media</h3>
              <div class="the-filters">
                <?php
                // TODO: update to just parent categories!
                // https://wordpress.stackexchange.com/questions/127872/get-only-the-top-level-categories-using-get-categories-without-foreach-loop
                $photo_args = [
                  'exclude' => 1,
                  'parent' => 77,
                  'hide_empty' => 0,
                ];
                $photo_categories = get_categories($photo_args);
                foreach ($photo_categories as $cat): ?>
                  <div class="filter-item">
                    <input
                      type="checkbox"
                      id="<?php echo $cat->slug; ?>"
                      value="<?php echo $cat->term_id; ?>"
                      data-name="<?php echo $cat->name; ?>"
                      checked
                    >
                    <label for="<?php echo $cat->slug; ?>">
                      <?php
                      get_template_part('components/glyphs/glyph', $cat->slug);
                      echo $cat->name;
                      ?>
                    </label>
                  </div>
                <?php endforeach;
                ?>
              </div>
            </div>
            <div class="sub-filters">
              <h3 class="subhead">Graphic Design</h3>
              <div class="the-filters">
                <?php
                // TODO: update to just parent categories!
                // https://wordpress.stackexchange.com/questions/127872/get-only-the-top-level-categories-using-get-categories-without-foreach-loop
                $graphic_design_args = [
                  'exclude' => 1,
                  'parent' => 78,
                  'hide_empty' => 0,
                ];
                $graphic_design_categories = get_categories(
                  $graphic_design_args
                );
                foreach ($graphic_design_categories as $cat): ?>
                  <div class="filter-item">
                    <input
                      type="checkbox"
                      id="<?php echo $cat->slug; ?>"
                      value="<?php echo $cat->term_id; ?>"
                      data-name="<?php echo $cat->name; ?>"
                      checked
                    >
                    <label for="<?php echo $cat->slug; ?>">
                      <?php
                      get_template_part('components/glyphs/glyph', $cat->slug);
                      echo $cat->name;
                      ?>
                    </label>
                  </div>
                <?php endforeach;
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>