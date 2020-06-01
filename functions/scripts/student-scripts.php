<?php

add_action('wp_enqueue_scripts', 'add_mask_swap_script');
function add_mask_swap_script()
{
  wp_enqueue_script(
    'mask_swap', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/student/maskSwap.js', // this is the location of your script file
    ['jquery'], // this array lists the scripts upon which your script depends
    null,
    true
  );
}
