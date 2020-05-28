<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portshowlio20
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

  <?php if (is_front_page()): ?>
  <title>Portshowlio 2020 / SCCA</title>
  <?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">

<?php if (!is_front_page()): ?>
  <header id="masthead" class="site-header">
    <div class="container">
      <div>
        <?php if (is_front_page() && is_home()): ?>
          <h1 class="site-title">
            <a href="<?php echo esc_url(home_url('/index')); ?>" rel="home">
              <?php bloginfo('name'); ?>
            </a>
          </h1>
        <?php else: ?>
          <p class="site-title">
            <a href="<?php echo esc_url(home_url('/index')); ?>" rel="home">
              <?php bloginfo('name'); ?>
            </a>
          </p>
        <?php endif; ?>
      </div>
      <form class="search" action="<?php echo home_url('/'); ?>">
        <input type="search" name="s" placeholder="Search&hellip;">
        <input type="submit" value="Search">
      </form>
    </div>
  </header>
<?php else:endif; ?>



