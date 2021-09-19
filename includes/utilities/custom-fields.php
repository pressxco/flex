<?php
/**
 * WordPress custom fields registering file.
 *
 * @link https://carbonfields.net
 *
 * @package Flex
 */

/**
 * Do not run if Carbon_Fields is not installed.
 */
if ( ! class_exists( 'Carbon_Fields' ) ) {
	return;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Create a sample theme options field.
 */
function crb_attach_theme_options() {
	Container::make( 'theme_options', __( 'Theme Options' ) )
	->add_fields(
		array(
			Field::make( 'text', 'crb_text', 'Text Field' ),
		)
	);
}
add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );

/**
 * Initiate Carbon Fields on theme setup.
 */
function crb_load() {
	\Carbon_Fields\Carbon_Fields::boot();
}
add_action( 'after_setup_theme', 'crb_load' );
