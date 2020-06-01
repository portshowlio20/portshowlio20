<?php

add_action('wp_enqueue_scripts', 'add_fancybox_script');
function add_fancybox_script()
{
  wp_enqueue_style(
    'fancybox_style',
    get_template_directory_uri() . '/sass/fancybox/jquery.fancybox.min.css'
  );
  wp_enqueue_script(
    'fancybox', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/project/fancybox.js', // this is the location of your script file
    ['jquery'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}
