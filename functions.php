<?php
/**
 * portshowlio20 functions and definitions
 *
 * 🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳🥳
 * 🚨🚨 NOTE: everything is default execpt for stuff on line 165 and on! 🚨🚨
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
    get_template_directory_uri() . '/js/underscores/navigation.js',
    [],
    _S_VERSION,
    true
  );
  wp_enqueue_script(
    'portshowlio20-skip-link-focus-fix',
    get_template_directory_uri() . '/js/underscores/skip-link-focus-fix.js',
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

require_once get_template_directory() . '/functions/wp-admin/limit-authors.php';
require_once get_template_directory() . '/functions/wp-admin/limit-focus.php';
require_once get_template_directory() .
  '/functions/wp-admin/author-to-student.php';
require_once get_template_directory() . '/functions/responsive-images.php';
require_once get_template_directory() . '/functions/redirect-to-splash.php';
require_once get_template_directory() .
  '/functions/scripts/google-analytics.php';
require_once get_template_directory() . '/functions/scripts/filter.php';
require_once get_template_directory() . '/functions/scripts/global-scripts.php';
require_once get_template_directory() . '/functions/scripts/splash-scripts.php';
require_once get_template_directory() .
  '/functions/scripts/narrative-scripts.php';
require_once get_template_directory() . '/functions/scripts/index-scripts.php';
// load scripts based on template page
// https://mekshq.com/include-javascriptonly-on-specific-wordpress-page-templates/
