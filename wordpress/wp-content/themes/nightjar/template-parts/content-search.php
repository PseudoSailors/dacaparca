<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nightjar
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry-thumbnail">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				<?php the_post_thumbnail(); ?>
			</a>
		</figure><!-- .entry-thumbnail -->
	<?php endif; ?>
	
	<header class="entry-header">
		<?php
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php nightjar_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_excerpt();
		
		wp_link_pages( array(
			'before'      => sprintf( '<div class="page-links">%s', esc_html__( 'Pages:', 'nightjar' ) ),
			'after'       => '</div>',
			'link_before' => sprintf( '<span class="page-number"><span class="screen-reader-text">%s</span>', esc_html_x( 'Page', 'used in multipage posts', 'nightjar' ) ),
			'link_after'  => '</span></span>'
		) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
