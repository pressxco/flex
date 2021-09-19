<?php
/**
 * The template for displaying Breadcrumb.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

/**
 * Do not run if breadcrumb_trail function is not exists.
 */
if ( ! function_exists( 'breadcrumb_trail' ) || is_home() || is_front_page() ) {
	return;
}

$args = array(
	'show_browse' => false,
);

breadcrumb_trail( $args );
