<?php

add_action('wp_enqueue_scripts', 'add_interactive_gradients_script');
function add_interactive_gradients_script()
{
  wp_enqueue_script(
    'interactive_gradients', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/global/interactiveGradients.js', // this is the location of your script file
    ['jquery'],
    // ['splash_countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}

add_action('wp_enqueue_scripts', 'add_canvas_noise_script');
function add_canvas_noise_script()
{
  wp_enqueue_script(
    'canvas_noise', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/global/canvasNoise.js', // this is the location of your script file
    ['jquery'],
    // ['countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}

add_action('wp_enqueue_scripts', 'add_animation_delay_script');
function add_animation_delay_script()
{
  wp_enqueue_script(
    'animation_delay', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/global/randomAnimationDelay.js', // this is the location of your script file
    ['jquery'],
    // ['countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}

add_action('wp_enqueue_scripts', 'add_asteroids_script');
function add_asteroids_script()
{
  wp_enqueue_script(
    'asteroids', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/global/asteroids.min.js', // this is the location of your script file
    ['jquery'],
    // ['countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}

add_action('wp_enqueue_scripts', 'add_secret_code_script');
function add_secret_code_script()
{
  wp_enqueue_script(
    'secret_code', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/global/secretCode.js', // this is the location of your script file
    ['jquery', 'asteroids'],
    // ['countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}

add_action('wp_enqueue_scripts', 'add_header_script');
function add_header_script()
{
  if (!is_front_page()) {
    wp_enqueue_script(
      'header', // name your script so that you can attach other scripts and de-register, etc.
      get_template_directory_uri() . '/js/global/header.js', // this is the location of your script file
      ['jquery'],
      // ['countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
      null,
      true
    );
  }
}

add_action('wp_enqueue_scripts', 'add_smooth_scroll_script');
function add_smooth_scroll_script()
{
  wp_enqueue_script(
    'smooth_scroll', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/global/smoothScroll.js', // this is the location of your script file
    ['jquery'],
    // ['countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}

add_action('wp_enqueue_scripts', 'add_localStorage_stats_script');
function add_localStorage_stats_script()
{
  wp_enqueue_script(
    'localStorage_stats', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/global/localStorageStats.js', // this is the location of your script file
    ['jquery'],
    // ['countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}
