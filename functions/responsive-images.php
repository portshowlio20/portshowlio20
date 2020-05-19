<?php
/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute
 *
 * This is how you use it in your PHP files:
 * <img class="my_class" <?php responsive_image(get_field( 'image_1' ),'thumb-640','640px'); ?>  alt="text" />
 *                                                     name of ACF field^           ^size       ^elements max-width
 */
function responsive_image($image_id, $image_size, $max_width)
{
  // check the image ID is not blank
  if ($image_id != '') {
    // set the default src image size
    $image_src = wp_get_attachment_image_url($image_id, $image_size);
    // set the srcset with various image sizes
    $image_srcset = wp_get_attachment_image_srcset($image_id, $image_size);
    // generate the markup for the responsive image
    echo 'src="' .
      $image_src .
      '" srcset="' .
      $image_srcset .
      '" sizes="(max-width: ' .
      $max_width .
      ') 100vw, ' .
      $max_width .
      '"';
  }
}

/**
 * Responsive Image Helper Function
 */
add_action('after_setup_theme', 'addImageSizes');
function addImageSizes()
{
  add_image_size('thumb-640', 640); // 300 pixels wide (and unlimited height)
  // add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)
}
