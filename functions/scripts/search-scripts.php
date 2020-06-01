<?php

add_action('wp_enqueue_scripts', 'add_search_toggles_script');
function add_search_toggles_script()
{
  wp_enqueue_script(
    'search_toggles', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/search/collapseSections.js', // this is the location of your script file
    ['jquery'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}
