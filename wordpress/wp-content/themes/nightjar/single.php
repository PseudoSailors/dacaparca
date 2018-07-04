<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nightjar
 */

get_header(); ?>

<main id="primary" class="site-main" role="main">

	<div class="wrapper">
	
		<?php
		while ( have_posts() ) : the_post();
	
			get_template_part( 'template-parts/content', get_post_format() );
	
			the_post_navigation( array(
				'prev_text' => sprintf( '<span class="screen-reader-text">%1$s</span>&laquo; %%title', esc_html__( 'Previous post', 'nightjar' ) ),
				'next_text' => sprintf( '<span class="screen-reader-text">%1$s</span>%%title &raquo;', esc_html__( 'Next post', 'nightjar' ) )
			) );
	
			comments_template();
	
		endwhile; // End of the loop.
		?>
	
	</div><!-- .wrapper -->
	
</main><!-- #primary -->

<?php
get_footer();
