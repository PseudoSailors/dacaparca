<?php
/**
 * Nightjar functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nightjar
 */

if ( ! function_exists( 'nightjar_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nightjar_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Nightjar, use a find and replace
	 * to change 'nightjar' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'nightjar', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'nightjar' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nightjar_custom_background_args', array(
		'default-color'      => 'ffffff',
		'default-image'      => get_template_directory_uri() . '/inc/bird.jpg',
		'default-position-x' => 'center',
		'default-attachment' => 'fixed'
	) ) );
	
	/*
	 * Enable support for Jetpack features
	 */
	add_theme_support( 'featured-content', array(
		'filter'     => 'nightjar_get_featured_posts',
		'max_posts'  => 4,
		'post_types' => array( 'post', 'page' ),
	) );

	add_theme_support( 'custom-logo', array(
		'header-text' => array( 'site-title' ),
		'height'      => 256,
		'width'       => 256
	) );
	
	add_theme_support( 'jetpack-social-menu' );
	
	/*
	 * Add editor styling
	 */
	add_editor_style( array( get_template_directory_uri() . '/inc/css/editor-style.css', nightjar_fonts_url() ) );
}
endif;
add_action( 'after_setup_theme', 'nightjar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nightjar_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nightjar_content_width', 700 );
}
add_action( 'after_setup_theme', 'nightjar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nightjar_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nightjar' ),
		'id'            => 'primary',
		'description'   => esc_html__( 'Add widgets here.', 'nightjar' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'nightjar_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nightjar_scripts() {
	wp_enqueue_style( 'nightjar-google-fonts', nightjar_fonts_url() );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/inc/genericons/genericons/genericons.css' );
	wp_enqueue_style( 'nightjar-style', get_stylesheet_uri(), array( 'genericons', 'nightjar-google-fonts' ) );

	wp_enqueue_script( 'nightjar-functions', get_template_directory_uri() . '/js/nightjar.js', array( 'jquery' ), null, true );
	wp_localize_script( 'nightjar-functions', 'nightjarScreenReaderText', array(
		'expand'   => __( 'expand child menu', 'nightjar' ),
		'collapse' => __( 'collapse child menu', 'nightjar' )
	) );
	
	if ( is_front_page() && nightjar_has_featured_posts() ) {
		wp_enqueue_style( 'responsiveslides', get_template_directory_uri() . '/inc/rslides/responsiveslides.css' );
		wp_enqueue_script( 'responsiveslides', get_template_directory_uri() . '/inc/rslides/responsiveslides.js', array( 'jquery' ), null, true );
		wp_localize_script( 'responsiveslides', 'nightjarHasFeaturedPosts', array(
			'posts' => true,
			'prev'  => __( 'previous featured post', 'nightjar' ),
			'next'  => __( 'next featured post', 'nightjar' )
		) );
		wp_enqueue_script( 'nightjar-featured-functions', get_template_directory_uri() . '/js/featured.js', array( 'jquery' ), null, true );
	}
	
	wp_enqueue_script( 'nightjar-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nightjar_scripts', 200 );

/**
 * Allow users to dequeue Google fonts
 */
function nightjar_fonts_url() {
	$fonts = array();
	$fonts_url = '';
	
	/* translators: If there are characters in your language that are not supported by Alegreya, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Alegreya font: on or off', 'nightjar' ) ) {
		$fonts[] = 'Alegreya:400,400italic,700,700italic';
	}
	
	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'nightjar' ) ) {
		$fonts[] = 'Lato:400,400italic,700,700italic';
	}
	
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
		), '//fonts.googleapis.com/css' );
	}
	
	return $fonts_url;
}

/**
 * Set background image if we're not on the front page
 */
function nightjar_set_background() {
	if ( get_theme_mod( 'always_show_background' ) ) {
		return;
	}
	
	global $post;
	global $posts;
	$background_image_url = '';
	
	if ( is_home() && ! is_front_page() ) {
		if ( has_post_thumbnail( $posts[0]->ID ) ) {
			$background_image_url = wp_get_attachment_url( get_post_thumbnail_id( $posts[0]->ID ) );
		}
	}
	
	if ( get_background_image() ) {
		$background_image_url = get_background_image();
	}
	
	if ( is_single() && ! post_password_required() ) {
		if ( has_post_format( 'gallery' ) ) {
			$args = array(
				'post_parent'    => $post->ID,
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'orderby'        => 'rand',
				'posts_per_page' => 1
			);
			$attachments = get_children( $args );
		
			if ( $attachments ) {
				foreach ( $attachments as $attachment ) {
					$background_image_url = wp_get_attachment_url( $attachment->ID );
				}
			}
		} elseif ( has_post_thumbnail( $post->ID ) ) {
			$background_image_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
		}
	}
	
	if ( empty( $background_image_url ) ) {
		$background_image_url = get_template_directory_uri() . '/inc/bird.jpg';
	}
	
	$custom_css = sprintf( '.backstretch { background-image: url(%s); background-size: cover;', esc_url( $background_image_url ) );
	wp_add_inline_style( 'nightjar-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'nightjar_set_background', 200 );

/**
 * Set up Customizer options
 */
function nightjar_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'footer_text', array(
    'title'       => esc_html__( 'Footer Text', 'nightjar' ),
    'description' => esc_html__( 'Text entered in this form will appear in place of the default footer text. A limited amount of HTML may be used.', 'nightjar' ),
    'priority'    => 35
  ) );
  
  $wp_customize->add_setting( 'footer_text', array(
    'default'           => '',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'nightjar_sanitize_footer'
  ) );
  
  $wp_customize->add_control( 'footer_text', array(
    'label'    => esc_html__( 'Footer Text', 'nightjar' ),
    'section'  => 'footer_text',
    'settings' => 'footer_text',
    'type'     => 'text'
  ) );
  
  $wp_customize->add_setting( 'always_show_background', array(
	  'default'           => false,
	  'type'              => 'theme_mod',
	  'capability'        => 'edit_theme_options',
	  'sanitize_callback' => 'nightjar_sanitize_checkbox'
  ) );
  
  $wp_customize->add_control( 'always_show_background', array(
	  'label'       => esc_html__( 'Always Display Background Image', 'nightjar' ),
	  'description' => esc_html__( 'Select this option to always display the chosen image, even on the home page or when viewing an individual post', 'nightjar' ),
	  'section'     => 'background_image',
	  'settings'    => 'always_show_background',
	  'type'        => 'checkbox'
  ) );
}
add_action( 'customize_register', 'nightjar_theme_customizer' );

/**
 * Sanitizing functions
 */
function nightjar_sanitize_footer( $value ) {
	if ( $value ) {
		return wp_kses( $value,
			array( 'a' => array( 'href' => array() ),
				'strong' => array(),
				'em'     => array(),
				'span'   => array( 'class' => array() )
			)
		);
	} else {
		return false;
	}
}

function nightjar_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Set excerpt length
 */
function nightjar_excerpt_length() {
	if ( is_front_page() ) {
		return 10;
	} else {
		return 50;
	}
}
add_filter( 'excerpt_length', 'nightjar_excerpt_length' );

/**
 * We use excerpts frequently, so let's make the link more interesting
 */
function nightjar_excerpt_more( $more ) {
	return sprintf( '&hellip;<a class="read-more" href="%1$s" rel="bookmark">%2$s</a>',
		esc_url( get_permalink() ),
		esc_html__( 'Continue Reading', 'nightjar' )
	);
}
add_filter( 'excerpt_more', 'nightjar_excerpt_more' );

/**
 * Return Jetpack featured posts
 */
function nightjar_get_featured_posts() {
	return apply_filters( 'nightjar_get_featured_posts', array() );
}

/**
 * Get the number of featured posts
 */
function nightjar_has_featured_posts( $minimum = 1 ) {
	if ( is_paged() ) {
		return false;
	}
	
	$minimum = absint( $minimum );
	$featured_posts = apply_filters( 'nightjar_get_featured_posts', array() );
	
	if ( ! is_array( $featured_posts ) || $minimum > count( $featured_posts ) ) {
		return false;
	}
	
	return true;
}

/**
 * Get IDs of featured posts
 */
function nightjar_get_featured_ids() {
	$ids = array();
	$featured_posts = nightjar_get_featured_posts();
	
	foreach( $featured_posts as $featured_post ) {
		$ids[] = $featured_post->ID;
	}
	
	return $ids;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
