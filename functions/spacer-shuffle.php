<?php

/**
 * Handle filter AJAX request
 */

add_action('wp_enqueue_scripts', 'add_shuffle_script');
function add_shuffle_script()
{
  wp_enqueue_script(
    'shuffle', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/shuffle.js', // this is the location of your script file
    ['jquery'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}

add_action('wp_enqueue_scripts', 'add_spacer_script');
function add_spacer_script()
{
  wp_enqueue_script(
    'spacer', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/spacer.js', // this is the location of your script file
    ['jquery'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}
