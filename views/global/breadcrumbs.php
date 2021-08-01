<?php
/**
 * The template for displaying Breadcrumb.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

if ( function_exists( 'breadcrumb_trail' ) && ! is_home() && ! is_front_page() ) {

	$args = array(
		'show_browse' => false,
	);

	breadcrumb_trail( $args );

}
