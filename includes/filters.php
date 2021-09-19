<?php
/**
 * Various filters to help development.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

/**
 * Reset Image Compression
 *
 * @since 1.0.0
 */
function fx_image_quality() {
	return 100;
}
add_filter( 'jpeg_quality', 'fx_image_quality' );
add_filter( 'wp_editor_set_quality', 'fx_image_quality' );


/**
 * Add `loading="lazy"` attribute to images output by the_post_thumbnail().
 *
 * @param  string       $html The post thumbnail HTML.
 * @param  int          $post_id The post ID.
 * @param  string       $post_thumbnail_id    The post thumbnail ID.
 * @param  string|array $size   The post thumbnail size. Image size or array of width and height values (in that order). Default 'post-thumbnail'.
 * @param  string       $attr Query string of attributes.
 *
 * @return string   The modified post thumbnail HTML.
 */
function fx_modify_post_thumbnail_html( $html, $post_id, $post_thumbnail_id, $size, $attr ) {

	$html = str_replace( 'src', 'data-src', $html );

	return $html;

}
add_filter( 'post_thumbnail_html', 'fx_modify_post_thumbnail_html', 10, 5 );


/**
 * Add `lazyload` class to images output.
 *
 * @param  array $attr Attributes registered.
 * @return array The modified attributes array.
 */
function fx_lazyload_class( $attr ) {
	$attr['class'] .= ' lazyload';
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'fx_lazyload_class' );


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function fx_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'primary' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'fx_body_classes' );


/**
 * Add "Read more" to the excerpt.
 *
 * @return string
 */
function fx_read_more_link() {
	return '<a class="read-more" href="' . get_permalink() . '">' . __( 'Read more', 'flex' ) . ' →</a>';
}
add_filter( 'the_content_more_link', 'fx_read_more_link' );
add_filter( 'excerpt_more', 'fx_read_more_link' );
