<?php

/**
 * Limit options for users with "author" role:
 * 1. Redirect most admin pages to Projects admin page
 * 2. Remove admin panel menu items (on the left)
 * 3. Remove admin bar menu items (on the top)
 * 4. Remove unecessary input fields on Profile page
 */
$user = wp_get_current_user();
if (in_array('author', (array) $user->roles)) {
  // 1.
  add_action('admin_init', 'portshowlio20_admin_pages_redirect');
  function portshowlio20_admin_pages_redirect()
  {
    global $pagenow;
    $admin_pages = [
      'about.php',
      'index.php',
      'upload.php',
      // 'edit.php', this breaks things
      'edit.php?post_type=page',
      'edit-tags.php',
      'edit-tags.php',
      'edit-comments.php',
      'link-manager.php',
      'tools.php',
      'options-writing.php',
      'options-reading.php',
      'options-discussion.php',
      'options-media.php',
      'options-privacy.php',
      'options-permalink.php',
    ];

    if (in_array($pagenow, $admin_pages)) {
      wp_redirect('edit.php?post_type=projects');
      exit();
    }
  }

  // 2.
  add_action('admin_menu', 'portshowlio20_remove_menu_items', 99);
  function portshowlio20_remove_menu_items()
  {
    remove_menu_page('index.php'); // Dashboard
    remove_menu_page('upload.php'); // Dashboard
    remove_menu_page('edit.php'); // Posts
    remove_menu_page('link-manager.php'); // Links
    remove_menu_page('edit-comments.php'); // Comments
    remove_menu_page('edit.php?post_type=page'); // Pages
    remove_menu_page('tools.php'); // Tools
  }

  // 3.
  add_action('admin_bar_menu', 'portshowlio20_remove_from_admin_bar', 999);
  function portshowlio20_remove_from_admin_bar($wp_admin_bar)
  {
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('new-content');
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_node('customize');
  }

  // 4.
  add_action('admin_footer', 'portshowlio20_remove_profile_fields');
  function portshowlio20_remove_profile_fields()
  {
    ?>
    <script>
      jQuery(document).ready( function($) {
        $('#your-profile').children('h2').remove(); // All headers
        $('input#rich_editing').closest('table').remove() // Personal Options content
        $('input#user_login').closest('tr').remove(); // Username
        // $('input#nickname').closest('tr').remove(); // Nickname (required)
        $('input#nickname').closest('tr').css("display", "none"); // Nickname (required)
        $('select#display_name').closest('tr').remove(); // Display my name as...
        $('input#url').closest('tr').remove(); // Website (will handle with ACF)
        $('textarea#description').closest('table').remove(); // About

        // INSERT header for ACF section
        $('<h2>Student Info</h2>').insertBefore( $('.acf-field').closest('table') );

        // Wrap sections TBD...
        $('#your-profile').children('table:lt(3)').wrapAll( "<div class='new'></div>" );;

      });
    </script>

    <style>
      /* disable draggable "WP Metaboxes" */
      .acf-postbox .ui-sortable-handle {
        pointer-events: none;
      }
    </style>
    <?php
  }
}
