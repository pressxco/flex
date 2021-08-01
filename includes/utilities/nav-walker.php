<?php
/**
 * The utility class for constructing a new walker.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */


/**
 * PX Navigation Walker
 */
class PX_Walker extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {

		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );

		$display_depth = ( $depth + 1 );

		$classes = array(
			'sub-menu',
			( $display_depth >= 2 ? 'sub-sub-menu' : '' ),
		);

		$class_names = implode( ' ', $classes );

		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";

	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		global $wp_query;

		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );

		$depth_classes = array(
			( $depth == 0 ? 'nav-item' : 'sub-item' ),
			( $depth >= 2 ? 'sub-sub-item' : '' ),
		);

		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		$output .= $indent . '<li id="nitem-' . $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';

		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';

		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';

		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		$item_output = sprintf(
			'%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after,
			$args->after
		);

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

}
