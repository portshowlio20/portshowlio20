<?php

add_action('wp_enqueue_scripts', 'add_animejs_script');
function add_animejs_script()
{
  wp_enqueue_script(
    'animejs', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/global/anime.min.js', // this is the location of your script file
    ['jquery'],
    // ['countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}

add_action('wp_enqueue_scripts', 'add_splittingjs_script');
function add_splittingjs_script()
{
  wp_enqueue_script(
    'splittingjs', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/global/splitting.min.js', // this is the location of your script file
    ['jquery'],
    // ['countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}

add_action('wp_enqueue_scripts', 'add_get_scroll_percent_script');
function add_get_scroll_percent_script()
{
  if (is_front_page()) {
    wp_enqueue_script(
      'get_scroll_percent', // name your script so that you can attach other scripts and de-register, etc.
      get_template_directory_uri() . '/js/narrative/getScrollPercent.js', // this is the location of your script file
      ['jquery'],
      // ['countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
      null,
      true
    );
  }
}

add_action('wp_enqueue_scripts', 'add_disable_enable_scroll_script');
function add_disable_enable_scroll_script()
{
  if (is_front_page()) {
    wp_enqueue_script(
      'disable_enable_scroll', // name your script so that you can attach other scripts and de-register, etc.
      get_template_directory_uri() . '/js/narrative/disableEnableScroll.js', // this is the location of your script file
      ['jquery'],
      // ['countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
      null,
      true
    );
  }
}

add_action('wp_enqueue_scripts', 'add_rellax_script');
function add_rellax_script()
{
  if (is_front_page()) {
    wp_enqueue_script(
      'rellax', // name your script so that you can attach other scripts and de-register, etc.
      get_template_directory_uri() . '/js/narrative/rellax.min.js', // this is the location of your script file
      ['jquery'],
      // ['countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
      null,
      true
    );
  }
}

add_action('wp_enqueue_scripts', 'add_narrative_anime_script');
function add_narrative_anime_script()
{
  if (is_front_page()) {
    wp_enqueue_script(
      'narrative_anime', // name your script so that you can attach other scripts and de-register, etc.
      get_template_directory_uri() . '/js/narrative/narrativeAnime.js', // this is the location of your script file
      [
        'jquery',
        'rellax',
        'animejs',
        'splittingjs',
        'get_scroll_percent',
        'disable_enable_scroll',
      ],
      // ['countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
      null,
      true
    );
  }
}
