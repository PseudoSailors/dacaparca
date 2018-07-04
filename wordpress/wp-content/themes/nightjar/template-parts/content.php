<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nightjar
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( has_post_thumbnail() ) :
		if ( is_single() ) {
			$destination = esc_url( get_attachment_link( get_post_thumbnail_id() ) );
		} else {
			$destination = esc_url( get_permalink() );
		}
		?>
		<figure class="entry-thumbnail">
			<a href="<?php echo $destination; ?>" rel="bookmark">
				<?php the_post_thumbnail(); ?>
			</a>
		</figure><!-- .entry-thumbnail -->
	<?php endif; ?>
	
	<div class="entry-wrap">
		<header class="entry-header">
			<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			}
		
			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php nightjar_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		
		<div class="entry-content">
			<?php
			if ( is_single() ) {
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nightjar' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );
			} else {
				the_excerpt();
			}
			
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
			if ( ! is_single() ) {
				$byline = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_html( get_the_author() )
				);
	
				printf( esc_html_x( 'by %s', 'post author', 'nightjar' ), $byline );
				
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'nightjar' ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			} else {
				nightjar_entry_footer();
			}
			?>
		</footer><!-- .entry-footer -->
	</div><!-- .entry-wrap -->
</article><!-- #post-## -->
