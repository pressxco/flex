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
 * @param mixed $variable Any variable to pass from var_dump() function.
 * @since 1.0.0
 */
function debug( $variable ) {

	echo '<pre>' . esc_html( var_dump( $variable ) ) . '</pre>'; // phpcs:ignore

}

/**
 * Debug Mode
 * Dump the data and exit the code
 *
 * @param mixed $variable Any variable to pass from var_dump() function.
 * @since 1.0.0
 */
function dd( $variable ) {

	debug( $variable );
	die();

}


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
 * @param string $icon Icon name.
 * @since 1.0.0
 */
function fx_icon( $icon ) {

	$icon_dir = get_stylesheet_directory() . '/dist/icons/';

	echo file_get_contents( esc_attr( $icon_dir ) . esc_attr( $icon ) . '.svg' ); // phpcs:ignore

}

/**
 * FX Template
 * Exactly the same thing as get_template_part.
 * Added for sytanx unity of FX.
 *
 * @param string $image Image name.
 * @param string $alt Alternative text.
 * @param string $class Image classes.
 * @since 1.0.0
 */
function fx_image( $image, $alt = '', $class = 'x-image' ) {

	$image_dir_uri = get_stylesheet_directory_uri() . '/dist/images/';

	echo '<img class="' . esc_attr( $class ) . ' lazyload" src="' . esc_attr( $image_dir_uri ) . esc_attr( $image ) . '" alt="' . esc_attr( $alt ) . '">';

}

/**
 * FX Buttons
 * Request buttons with this custom functions.
 * Example: fx_button('My Button Text', '#', 'blue-button', 'margin-top: 20px;');
 *
 * @param string $content Buton label.
 * @param string $link Buton link.
 * @param string $class Buton class.
 * @param string $style Buton inline style.
 * @since 1.0.0
 */
function fx_button( $content, $link = '#', $class = '', $style = '' ) {

	echo '<a class="' . esc_attr( $class ) . '" href="' . esc_attr( $link ) . '" style="' . esc_attr( $style ) . '">' . esc_html( $content ) . '</a>';

}


/**
 * FX Layout
 *
 * @param string   $layout_name Template name.
 * @param function $layout_content Layout content view.
 * @since 1.0.0
 */
function fx_layout( $layout_name, $layout_content ) {

	require get_template_directory() . "/views/layouts/$layout_name.php";

}

/**
 * FX Template
 * Exactly the same thing as get_template_part.
 * Added for sytanx unity of FX.
 *
 * @param string $template Template name.
 * @param array  $args Arguments to pass.
 * @since 1.0.0
 */
function fx_render( $template, $args = array() ) {

	return get_template_part( $template, '', $args );

}


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
 * Prints HTML with meta information for the current author.
 */
function fx_posted_by() {

	$byline = sprintf(
		wp_kses(
			/* translators: %s: post author. */
			__( '<span class="screen-reader-text">by </span>%s', 'flex' ),
			array(
				'span' => array(
					'class' => array(),
				),
			)
		),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo wp_kses_post( $byline );

}


/**
 * Prints HTML with meta information for the current post-date/time.
 */
function fx_posted_on() {

	$time_string = sprintf(
		'<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		wp_kses(
			/* translators: %s: post date. */
			__( '<span class="sr-only">Posted on </span>%s', 'flex' ),
			array(
				'span' => array(
					'class' => array(),
				),
			)
		),
		wp_kses_post( $time_string )
	);

	echo '<span class="posted-on">' . wp_kses_post( $posted_on ) . '</span>';

}


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
