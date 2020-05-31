<?php

add_action('wp_enqueue_scripts', 'add_placeholder_observer_script');
function add_placeholder_observer_script()
{
  wp_enqueue_script(
    'placeholder_observer', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/index/placeholderObserver.js', // this is the location of your script file
    ['jquery'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}
