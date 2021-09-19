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
 * FX Render
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
 * @param array    $layout_args Arguments to pass.
 * @since 1.0.0
 */
function fx_layout( $layout_name, $layout_content, $layout_args = array() ) {

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
