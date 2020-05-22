<div class="filter">
  <div class="container">
    <form method="POST" id="filter" action="">
      <div class="filter-header">
        <div id="works-students-toggle">
          <div class="toggle-option">
            <input type="radio" id="works-toggle" name="mainToggle" value="works" checked>
            <label for="works-toggle">Works</label>
          </div>
          <div class="toggle-option">
            <input type="radio" id="students-toggle" name="mainToggle" value="students">
            <label for="students-toggle">Students</label>
          </div>
        </div>
        <div id="filter-dropdown-toggle">
          <div id="filter-active-glyph"></div>
          <span id="filter-state">
            Filter by area of focus
          </span>
          <div class="chevron">\/</div>
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
            $categories = get_categories();
            foreach ($categories as $cat): ?>
              <div >
                <input
                  type="checkbox"
                  id="<?php echo $cat->slug; ?>"
                  value="<?php echo $cat->term_id; ?>"
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