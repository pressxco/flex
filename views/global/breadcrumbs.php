<?php
/**
 * The template for displaying Breadcrumb.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

// Do not run on home and front page.
if ( is_home() || is_front_page() ) {
	return;
}


$args = array(
	'labels' => array(
		'title' => '',
	),
);
Hybrid\Breadcrumbs\Trail::display( $args );
