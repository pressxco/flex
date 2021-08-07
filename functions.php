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

// Load Composer’s autoloader.
require_once __DIR__ . '/vendor/autoload.php';

/**
 * FX Theme Setup
 * Declares or register functions.
 *
 * @since 1.0.0
 * @return void
 */
function fx_setup() {

	/**
	 * Disable full-site editing support.
	 *
	 * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
	 */
	remove_theme_support( 'block-templates' );

	/**
	 * Register the navigation menus.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'flex' ),
			'mobile'  => __( 'Mobile Menu', 'flex' ),
		)
	);

	/**
	 * Register the editor color palette.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
	 */
	add_theme_support( 'editor-color-palette', array() );

	/**
	 * Register the editor color gradient presets.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-gradient-presets
	 */
	add_theme_support( 'editor-gradient-presets', array() );

	/**
	 * Register the editor font sizes.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-font-sizes
	 */
	add_theme_support( 'editor-font-sizes', array() );

	/**
	 * Register relative length units in the editor.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#support-custom-units
	 */
	add_theme_support( 'custom-units' );

	/**
	 * Enable support for custom line heights in the editor.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#supporting-custom-line-heights
	 */
	add_theme_support( 'custom-line-height' );

	/**
	 * Enable support for custom block spacing control in the editor.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#spacing-control
	 */
	add_theme_support( 'custom-spacing' );

	/**
	 * Disable custom colors in the editor.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes
	 */
	add_theme_support( 'disable-custom-colors' );

	/**
	 * Disable custom color gradients in the editor.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-gradients
	 */
	add_theme_support( 'disable-custom-gradients' );

	/**
	 * Disable custom font sizes in the editor.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-font-sizes
	 */
	add_theme_support( 'disable-custom-font-sizes' );

	/**
	 * Disable the default block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
	 */
	remove_theme_support( 'core-block-patterns' );

	/**
	 * Enable plugins to manage the document title.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable post thumbnail support.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable wide alignment support.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
	 */
	add_theme_support( 'align-wide' );

	/**
	 * Enable responsive embed support.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
	 */
	add_theme_support( 'responsive-embeds' );

	/**
	 * Enable HTML5 markup support.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
	 */
	add_theme_support(
		'html5',
		array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
			'script',
			'style',
		)
	);

	/**
	 * Enable selective refresh for widgets in customizer.
	 *
	 * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 *
	 * @link https://developer.wordpress.org/reference/functions/load_theme_textdomain/
	 */
	load_theme_textdomain( 'flex', get_template_directory() . '/languages' );

	/**
	 * Custom logo support.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/custom-logo/
	 */
	add_theme_support( 'custom-logo' );

	/**
	 * Automatic feed links support.
	 *
	 * @link https://codex.wordpress.org/Automatic_Feed_Links#:~:text=Automatic%20Feed%20Links%20is%20a,the%20deprecated%20automatic_feed_links()%20function.
	 */
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
	wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/dist/scripts/bundle.js', array( 'jquery' ), false, true );

	// Comment Reply.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}

}
add_action( 'wp_enqueue_scripts', 'fx_styles_and_scripts' );

/**
 * FX Helper Functions
 */
require get_template_directory() . '/includes/utilities/functions-helper.php';

/**
 * Carbon Fields Settings
 */
require get_template_directory() . '/includes/utilities/fields.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/includes/components/breadcrumb-class.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/includes/fallbacks/menu-fallback.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/includes/utilities/jetpack.php';
}
