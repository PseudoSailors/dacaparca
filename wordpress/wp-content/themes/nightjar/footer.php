<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nightjar
 */

?>

	</div><!-- #content -->
	
	<div class="backstretch">
		<?php
		if ( is_front_page() && nightjar_has_featured_posts() ) :
			$featured_posts = nightjar_get_featured_posts();
			?>
			<ul class="rslides">
				<?php foreach( $featured_posts as $post ) : ?>
			 		<li>
			 			<?php
			 			setup_postdata( $post );
			 			get_template_part( 'template-parts/content', 'featured' );
			 			?>
			 		</li>
			 	<?php
			 	endforeach;
			 	
			 	wp_reset_postdata(); 
			 	?>
			</ul><!-- .rslides -->
			<ul class="featured-nav content"></ul>
		<?php endif; ?>
	</div><!-- .backstretch -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
