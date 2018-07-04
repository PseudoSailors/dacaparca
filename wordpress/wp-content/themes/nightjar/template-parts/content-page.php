<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nightjar
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before'      => sprintf( '<div class="page-links">%s', esc_html__( 'Pages:', 'nightjar' ) ),
			'after'       => '</div>',
			'link_before' => sprintf( '<span class="page-number"><span class="screen-reader-text">%s</span>', esc_html_x( 'Page', 'used in multipage posts', 'nightjar' ) ),
			'link_after'  => '</span></span>'
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'nightjar' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
