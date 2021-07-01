<?php
/**
 * Various functions to help development.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

/**
 * Debug Mode
 * Dump the data
 *
 * @since 1.0.0
 */
function debug( $var ) {

	echo '<pre>' . esc_html( var_dump( $var ) ) . '</pre>';

}

/**
 * Debug Mode
 * Dump the data
 *
 * @since 1.0.0
 */
function dd( $var ) {

	echo '<pre>' . esc_html( var_dump( $var ) ) . '</pre>';

	die();

}

/**
 * Reset Inline Image Dimensions
 *
 * @since 1.0.0
 */
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {

	$html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );

	return $html;

}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );


/**
 * Reset Image Compression
 *
 * @since 1.0.0
 */
add_filter(
	'jpeg_quality',
	function( $arg ) {
		return 100;
	}
);
add_filter(
	'wp_editor_set_quality',
	function( $arg ) {
		return 100;
	}
);


/**
 * FX Icons
 * Request icons with this custom functions.
 * Use only icon name without extension.
 * Example: fx_icon('myicon');
 *
 * @since 1.0.0
 */

function fx_icon( $icon ) {

	echo file_get_contents( get_stylesheet_directory() . '/dist/icons/' . $icon . '.svg' );

}

/**
 * FX Template
 * Exactly the same thing as get_template_part.
 * Added for sytanx unity of FX.
 *
 * @param string $template
 * @since 1.0.0
 */
function fx_image( $image, $alt = null, $class = 'x-image' ) {

	$image_dir = get_stylesheet_directory_uri() . '/dist/images/';

	echo '<img class="' . esc_html( $class ) . ' lazyload" src="' . esc_html( $image_dir ) . esc_html( $image ) . '" alt="' . esc_html( $alt ) . '">';

}

/**
 * FX Buttons
 * Request buttons with this custom functions.
 * Example: fx_button('My Button Text', '#', 'blue-button', 'margin-top: 20px;');
 *
 * @since 1.0.0
 */
function fx_button( $content, $link, $class, $style, $icon ) {

	echo '<a class="' . $class . '" href="' . $link . '" style="' . $style . '">' . $content . $icon . '</a>';

}

/**
 * FX Template
 * Exactly the same thing as get_template_part.
 * Added for sytanx unity of FX.
 *
 * @param string $template
 * @since 1.0.0
 */
function fx_template( $template, $args = array() ) {

	return get_template_part( $template, '', $args );

}
