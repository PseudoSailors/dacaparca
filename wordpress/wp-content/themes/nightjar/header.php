<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nightjar
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'nightjar' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<span class="site-description"><?php echo $description; ?></span>
		<?php
		endif; 
		
		if ( is_active_sidebar( 'primary' ) || has_nav_menu( 'primary' ) || has_nav_menu( 'jetpack-social-menu' ) ) :
		?>
			<button class="panel-toggle" aria-expanded="false"><span class="screen-reader-text"><?php esc_html_e( 'Show', 'nightjar' ); ?></span></button>
		<?php endif; ?>
	</header><!-- #masthead -->
	
	<div class="panel closed">
		<?php
		the_custom_logo();
							
		if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php
		endif;
		
		if ( function_exists( 'jetpack_social_menu' ) && has_nav_menu( 'jetpack-social-menu' ) ) {
			jetpack_social_menu();
		}
		
		if ( has_nav_menu( 'primary' ) ) :
		?>
			<nav id="primary-menu" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
			</nav><!-- #primary-menu -->
		<?php
		endif;
		
		if ( is_active_sidebar( 'primary' ) ) {
			get_sidebar();
		}
		?>
		
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
			
				<?php
				$footer_text = get_theme_mod( 'footer_text' );
				
				if ( $footer_text ) :
					echo wp_kses( $footer_text,
						array( 'a' => array( 'href' => array() ),
							'strong' => array(),
							'em'     => array(),
							'span'   => array( 'class' => array() )
						)
					);
				else : 
				?>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'nightjar' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'nightjar' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php
					printf( esc_html__( 'Theme: %1$s by %2$s', 'nightjar' ), 'Nightjar', '<a href="http://stephencottontail.wordpress.com/" rel="designer">Stephen Dickinson</a>' );
				
				endif; ?>
				
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- .panel -->
	
	<div id="content" class="site-content">
		<div class="spacer"></div>
