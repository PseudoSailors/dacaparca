<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Nightjar
 */

get_header(); ?>

<main id="primary" class="site-main" role="main">

	<div class="wrapper">
	
		<?php
		if ( have_posts() ) : ?>
		
			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html_x( 'Searched for &ldquo;%s&rdquo;', '%s: search query', 'nightjar' ), get_search_query() ); ?></h1>
				<p class="subtitle"><?php printf( esc_html( _nx( '1 result', '%s results', $wp_query->found_posts, 'Number of search results', 'nightjar' ) ), $wp_query->found_posts ); ?></p>
			</header><!-- .page-header -->
		
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
		
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
		
			endwhile;
		
			the_posts_pagination( array(
				'prev_text'          => sprintf( '<span class="screen-reader-text">%s</span>', 
					esc_html__( 'Previous page', 'nightjar' )
				),
				'next_text'          => sprintf( '<span class="screen-reader-text">%s</span>',
					esc_html__( 'Next Page', 'nightjar' )
				),
				'before_page_number' => sprintf( '<span class="meta-nav screen-reader-text">%s</span>',
					esc_html__( 'Page', 'nightjar' )
				)
			) );
		
		else :
		
			get_template_part( 'template-parts/content', 'none' );
		
		endif; ?>
		
	</div><!-- .wrapper -->
	
</main><!-- #primary -->

<?php
get_footer();
