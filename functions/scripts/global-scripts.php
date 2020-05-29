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
