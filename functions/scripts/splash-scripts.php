<?php

add_action('wp_enqueue_scripts', 'add_splash_countdown_timer_script');
function add_splash_countdown_timer_script()
{
  wp_enqueue_script(
    'splash_countdown_timer', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/splash/countdownTimer.js', // this is the location of your script file
    ['jquery'],
    // ['countdown_timer', 'interactive_gradients', 'canvas_noise'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}
