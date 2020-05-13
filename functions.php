<?php
/**
 * portshowlio20 functions and definitions
 *
 * 🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳
 * 🚨🚨 NOTE: everything is default execpt for stuff on line 159 and on! 🚨🚨
 * 🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠🤠
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package portshowlio20
 */

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

if (!function_exists('portshowlio20_setup')):
  function portshowlio20_setup()
  {
    load_theme_textdomain(
      'portshowlio20',
      get_template_directory() . '/languages'
    );
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus([
      'menu-1' => esc_html__('Primary', 'portshowlio20'),
    ]);

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', [
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    ]);

    // Set up the WordPress core custom background feature.
    add_theme_support(
      'custom-background',
      apply_filters('portshowlio20_custom_background_args', [
        'default-color' => 'ffffff',
        'default-image' => '',
      ])
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support('custom-logo', [
      'height' => 250,
      'width' => 250,
      'flex-width' => true,
      'flex-height' => true,
    ]);
  }
endif;
add_action('after_setup_theme', 'portshowlio20_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function portshowlio20_content_width()
{
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters('portshowlio20_content_width', 640);
}
add_action('after_setup_theme', 'portshowlio20_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function portshowlio20_widgets_init()
{
  register_sidebar([
    'name' => esc_html__('Sidebar', 'portshowlio20'),
    'id' => 'sidebar-1',
    'description' => esc_html__('Add widgets here.', 'portshowlio20'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ]);
}
add_action('widgets_init', 'portshowlio20_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function portshowlio20_scripts()
{
  wp_enqueue_style('portshowlio20-style', get_stylesheet_uri(), [], _S_VERSION);
  wp_style_add_data('portshowlio20-style', 'rtl', 'replace');
  wp_enqueue_script(
    'portshowlio20-navigation',
    get_template_directory_uri() . '/js/navigation.js',
    [],
    _S_VERSION,
    true
  );
  wp_enqueue_script(
    'portshowlio20-skip-link-focus-fix',
    get_template_directory_uri() . '/js/skip-link-focus-fix.js',
    [],
    _S_VERSION,
    true
  );
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'portshowlio20_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

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
    <?php
  }
}

/**
 * Add jQuery script to "projects" custom post type page in order to:
 * 1. limit the number of categories users can add
 */
add_action('admin_enqueue_scripts', 'my_acf_extension_enqueue');
function my_acf_extension_enqueue($hook)
{
  # Not our screen, bail out
  if ('post-new.php' !== $hook) {
    return;
  }

  # Not our post type, bail out
  global $typenow;
  if ('projects' !== $typenow) {
    return;
  }

  // 1.
  $handle = 'acfMultiSelectLimit';
  $src = get_stylesheet_directory_uri() . '/js/acfMultiSelectLimit.js';
  $deps = ['jquery', 'acf-input'];

  wp_register_script($handle, $src, $deps, false, true);
  wp_enqueue_script($handle, $src, $deps, false, true);
}

/**
 * Validate the categories input incase they add a custom category at the end!
 */
add_filter(
  'acf/validate_value/name=project_type',
  'my_acf_validate_value',
  10,
  4
);
function my_acf_validate_value($valid, $value, $field, $input_name)
{
  // Bail early if value is already invalid.
  if ($valid !== true) {
    return $valid;
  }
  // Prevent value from saving if it contains the companies old name.
  if (is_array($value) && count($value) > 4 !== false) {
    return __("You may only pick up to 4 types.");
  }
  return $valid;
}

/**
 * Give authors power to create categories
 * (this is so that students can add their own areas of focus)
 */
add_action('admin_init', 'add_manage_cat_to_author_role', 10, 0);
function add_manage_cat_to_author_role()
{
  if (!current_user_can('author')) {
    return;
  }

  // here you should check if the role already has_cap already and if so, abort/return;
  if (current_user_can('author')) {
    $GLOBALS['wp_roles']->add_cap('author', 'manage_categories');
  }
}

/**
 * Rename "author/" slug to "student/"
 */
add_action('init', 'cng_author_base');
function cng_author_base()
{
  global $wp_rewrite;
  $author_slug = 'student'; // change slug name
  $wp_rewrite->author_base = $author_slug;
}

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

/**
 * AJAX filter script
 */
add_action('wp_enqueue_scripts', 'add_filter_script');
function add_filter_script()
{
  wp_enqueue_script(
    'filter', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/filter.js', // this is the location of your script file
    ['jquery'], // this array lists the scripts upon which your script depends
    null,
    true
  );

  wp_localize_script('filter', 'wp_ajax', [
    'ajax_url' => admin_url('admin-ajax.php'),
    'security' => wp_create_nonce('wp-ajax-nonce'),
  ]);
}

add_action('wp_ajax_nopriv_filter', 'filter_ajax');
add_action('wp_ajax_filter', 'filter_ajax');

function filter_ajax()
{
  if (!check_ajax_referer('wp-ajax-nonce', 'security', false)) {
    wp_send_json_error('Invalid security token sent.');
    wp_die();
  }

  $categories = $_POST['categories'];
  echo '<pre>';
  var_dump($categories);
  echo '</pre>';

  $args = [
    'post_type' => 'projects',
  ];

  if (isset($categories)) {
    $categories = array_map('intval', $categories);
    $args['category__in'] = $categories;
  }

  echo '<pre>';
  var_dump($args['category__in']);
  echo '</pre>';

  // 🤔 how to handle "NULL" response 🤷‍♂️

  $loop = new WP_Query($args);
  if ($loop->have_posts()):
    while ($loop->have_posts()):
      $loop->the_post(); ?>

            <a href="<?php the_permalink(); ?>">
              <div class="image">
                <div class="featured-image">
                  <img class="my_class" <?php responsive_image(
                    get_field('featured_image'),
                    'thumb-640',
                    '640px'
                  ); ?>  alt="text" />
                </div>
              </div>
              <div class="project-meta">
                <h2><?php echo get_the_title(); ?></h2>
                <ul><?php
                $terms = get_the_terms($post->ID, 'category');
                $categories = [];
                if ($terms) {
                  foreach ($terms as $category) {
                    $categories[] = $category->name;
                  }
                }

                if ($categories) {
                  foreach ($categories as $category) {
                    echo '<li>' . $category . '</li>';
                  }
                }
                ?></ul>
              </div>
            </a>

        <?php
    endwhile;
  endif;
  wp_reset_postdata();

  die();
}
