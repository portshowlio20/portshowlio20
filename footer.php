<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portshowlio20
 */

if (!is_front_page()): ?>
    <footer class="site-footer">
		<div class="container">
			footer
		</div>
	</footer>
<?php else:endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
