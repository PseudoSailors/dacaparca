<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Nightjar
 */

if ( ! function_exists( 'nightjar_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function nightjar_posted_on() {
	printf( '<time class="entry-date meta" datetime="%1$s"><a href="%2$s">%3$s</a></time>',
		esc_attr( get_the_date( 'c' ) ),
		esc_url( get_permalink() ),
		esc_html( get_the_date() )	
	);
}
endif;

if ( ! function_exists( 'nightjar_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function nightjar_entry_footer() {
	// Hide category, tags, author for pages
	if ( 'post' === get_post_type() ) {
		$byline = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	
		printf( esc_html_x( 'by %s', 'post author', 'nightjar' ), $byline );
				
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'nightjar' ) );
		if ( $categories_list && nightjar_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'nightjar' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'nightjar' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'nightjar' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'nightjar' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'nightjar' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function nightjar_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'nightjar_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'nightjar_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so nightjar_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so nightjar_categorized_blog should return false.
		return false;
	}
}

if ( ! function_exists( 'nightjar_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function nightjar_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in nightjar_categorized_blog.
 */
function nightjar_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'nightjar_categories' );
}
add_action( 'edit_category', 'nightjar_category_transient_flusher' );
add_action( 'save_post',     'nightjar_category_transient_flusher' );
