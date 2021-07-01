<?php
/**
 * Theme Functions
 *
 * The area where you can write the functions for your theme.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

/**
 * FX Theme Setup
 * Declares or register functions.
 *
 * @since 1.0.0
 * @return void
 */
function fx_setup() {
	/*
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	*/
	load_theme_textdomain( 'flex', get_template_directory() . '/languages' );

	// Register menus.
	register_nav_menus(
		array(

			'primary' => __( 'Primary Menu', 'flex' ),

			'mobile'  => __( 'Mobile Menu', 'flex' ),

		)
	);

	// Add Title Tag Support.
	add_theme_support( 'title-tag' );

	// Post Featured Images Support.
	add_theme_support( 'post-thumbnails' );

	// Custom Logo.
	add_theme_support( 'custom-logo' );

	// Automatic Feeds.
	add_theme_support( 'automatic-feed-links' );

	// Custom Headers.
	add_theme_support( 'custom-header' );

	// Custom Backgrounds.
	add_theme_support( 'custom-background' );

	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'responsive-embeds' );

	add_theme_support( 'align-wide' );

}
add_action( 'after_setup_theme', 'fx_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fx_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fx_content_width', 640 );
}
add_action( 'after_setup_theme', 'fx_content_width', 0 );

/**
 * Register Sidebars
 *
 * @since 1.0.0
 * @return void
 */
function fx_register_sidebars() {
	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id'            => 'primary',
			'name'          => __( 'Primary Sidebar', 'flex' ),
			'description'   => __( 'Primary Sidebar for the blog area.', 'flex' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'fx_register_sidebars' );

/**
 * FX Styles and Scripts
 * Enqueue scripts and styles to be used site-wide.
 *
 * @since 1.0.0
 * @return void
 */
function fx_styles_and_scripts() {

	// Theme Styles.
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/dist/styles/main.css', array(), true ); // Compiled by "style.scss".

	// Theme Scripts.
	wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/dist/scripts/bundle.js', array( 'jquery' ), array(), true );

	// Comment Reply.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}

	wp_enqueue_style( 'dashicons' );

}
add_action( 'wp_enqueue_scripts', 'fx_styles_and_scripts' );


/**
 * FX Menu
 * Example Nav Menu for the theme.
 *
 * @param string $menu_location location variable.
 * @since 1.0.0
 * @return void
 */
function fx_menu( $menu_location, $depth, $walker ) {

		wp_nav_menu(
			array(
				'theme_location'  => $menu_location,
				'menu'            => '',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul class="' . $menu_location . '">%3$s</ul>',
				'depth'           => $depth,
				'walker'          => $walker,

			)
		);

}

/**
 * FX Helper Functions
 */
require get_template_directory() . '/includes/utilities/functions-helper.php';

/**
 * Nav Walker
 */
require get_template_directory() . '/includes/utilities/nav-walker.php';

/**
 * Comment Walker
 */
require get_template_directory() . '/includes/utilities/comment-walker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/includes/utilities/jetpack.php';
}

/**
 * Comment Walker
 */
require get_template_directory() . '/includes/components/breadcrumb-class.php';
