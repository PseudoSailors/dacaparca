<?php
/**
 * Template part for displaying featured posts on the front page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nightjar
 */

$thumbnail_style = '';

if ( has_post_thumbnail() && ! get_theme_mod( 'always_show_background' ) ) {
	$thumbnail = wp_get_attachment_url( get_post_thumbnail_id() );
	$thumbnail_style = sprintf( 'background-image: url(%s); background-position: center center; background-size: cover;', esc_url( $thumbnail ) );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured' ); ?> style="<?php echo $thumbnail_style; ?>">
	<header class="entry-header entry-meta content">
		<?php
		printf( '<time class="entry-date" datetime="%1$s"><a href="%2$s">%3$s</a></time>',
			esc_attr( get_the_date( 'c' ) ),
			esc_url( get_permalink() ),
			esc_html( get_the_date() )
		);
		
		the_title( sprintf( '<h2 class="entry-title"><a href="%1$s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>
	</header><!-- .entry-header -->
	<div class="entry-content content">
		<?php the_excerpt(); ?>
	</div>
</article><!-- #post-## -->
