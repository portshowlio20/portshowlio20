<div class="fifty-results">

  <span>These projects are randomly populated. Can't find what you're looking for?</span>

  <form class="search" action="<?php echo home_url('/'); ?>" title="Search">
    <input type="search" name="s" placeholder="Search the cosmos&hellip;">
    <button type="submit" value="Search" class="button-reset fifty-search">
      <div class="search-icon" >
        <?php get_template_part('components/glyphs/glyph', 'search'); ?>
      </div>
    </button>
  </form>

</div>