<?php

/**
 * Limit options for users with "author" role:
 * 1. Redirect most admin pages to Projects admin page
 * 2. Remove admin panel menu items (on the left)
 * 3. Remove admin bar menu items (on the top)
 * 4. Remove unecessary input fields on Profile page
 * 5. Disable dragging of ACF groups (need to edit to include flexible content sections)
 * 6. Limit published posts to 3
 * 7. Remove quick edit feature
 * 8. Limit media library access
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

  // 4. & 5.
  add_action('admin_footer', 'portshowlio20_remove_profile_fields');
  function portshowlio20_remove_profile_fields()
  {
    ?>
    <script>
      jQuery(document).ready( function($) {
        $('#your-profile').children('h2').remove(); // All headers
        $('input#rich_editing').closest('table').remove() // Personal Options content
        $('input#user_login').closest('tr').remove(); // Username
        $('input#nickname').closest('tr').css("display", "none"); // Nickname (required)
        $('select#display_name').closest('tr').remove(); // Display my name as...
        $('input#url').closest('tr').remove(); // Website (will handle with ACF)
        $('textarea#description').closest('table').remove(); // About

        // INSERT header for ACF section
        $('<h1>Student Info</h1>').insertBefore( $('.acf-field').closest('table') );

        // Wrap sections TBD...
        $('#your-profile').children('table:lt(3)').wrapAll( "<div id='wordpress-prof-info'></div>" );;

      });
    </script>

    <style>
      /* disable draggable "WP Metaboxes" */
      .acf-postbox .ui-sortable-handle {
        pointer-events: none;
      }

      /* remove h2s with "student info" */
      #profile-page .acf-input h1,
      .acf-input h2 {
        display: none;
      }

      #wordpress-prof-info {
        padding: 2rem;
        border: 3px solid gray;
        border-radius: 5px;
        margin-bottom: 2rem;
      }
    </style>
    <?php
  }

  // 6.(THERE'S A HOLE HERE: IF A USER HAS 3 PROJECTS, SETS ONE TO DRAFT, THEN MAKES AND PUBLISHES A NEW PROJECT, THEN RETURNS TO THE DRAFT PROJECT, THEY CAN SET THAT TO PUBLISH AND GET 4 PUBLISHED PROJECTS 🙀)
  add_action('load-post-new.php', 'limit_add_new_post');
  function limit_add_new_post()
  {
    global $typenow;

    # Not our post type, bail out
    if ('projects' !== $typenow) {
      return;
    }

    $current_user = wp_get_current_user();
    $user_id = $current_user->ID;

    # Grab all our CPT, adjust the status as needed
    $total = get_posts([
      'author' => $user_id,
      'post_type' => 'projects',
      'post_status' => 'publish',
    ]);

    # Condition match, block new post
    if ($total && count($total) >= 3) {
      wp_die(
        "Sorry, maximum number of published projects reached!",
        'Maximum reached',
        [
          'response' => 500,
          'back_link' => true,
        ]
      );
    }
  }

  // 7.
  add_filter('post_row_actions', 'remove_quick_edit', 10, 1);
  function remove_quick_edit($actions)
  {
    unset($actions['inline hide-if-no-js']);
    return $actions;
  }

  // 8.
  // Limit media library access... questionable..
  add_filter(
    'ajax_query_attachments_args',
    'wpb_show_current_user_attachments'
  );

  function wpb_show_current_user_attachments($query)
  {
    $user_id = get_current_user_id();
    if (
      $user_id &&
      !current_user_can('activate_plugins') &&
      !current_user_can('edit_others_posts')
    ) {
      $query['author'] = $user_id;
    }
    return $query;
  }
}
