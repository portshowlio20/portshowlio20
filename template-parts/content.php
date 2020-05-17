<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portshowlio20
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				portshowlio20_posted_on();
				portshowlio20_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
    <pre><?php echo portshowlio20_posted_by();?></pre>

    <pre>
    <?php
      $all_meta_for_user = get_user_meta( get_the_author_meta( 'ID' ) );
      echo $all_meta_for_user['first_name'][0];
    ?>
    <?php
      $all_meta_for_user = get_user_meta( get_the_author_meta( 'ID' ) );
      echo $all_meta_for_user['social_media_instagram'][0];
    ?>
    <?php
      $all_meta_for_user = get_user_meta( get_the_author_meta( 'ID' ) );
      if ( $all_meta_for_user['social_media_youtube'][0] ) :
        ?>
        <div><?php echo $all_meta_for_user['social_media_youtube'][0]?></div>
        <?php else : ?>
        <div>no youtube</div>
    <?php endif; ?>
    <?php
      $all_meta_for_user = get_user_meta( get_the_author_meta( 'ID' ) );
      echo $all_meta_for_user['_instagram'][0];
    ?>

    </pre>

<pre>
    <?php
      $all_meta_for_user = get_user_meta( get_the_author_meta( 'ID' ) );
      print_r( $all_meta_for_user );
    ?>
</pre>

	</header><!-- .entry-header -->

	<?php portshowlio20_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'portshowlio20' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'portshowlio20' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php portshowlio20_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
