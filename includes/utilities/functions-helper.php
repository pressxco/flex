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

	echo '<img class="' . esc_attr( $class ) . ' lazyload" src="' . esc_html( $image_dir ) . esc_html( $image ) . '" alt="' . esc_attr( $alt ) . '">';

}

/**
 * FX Buttons
 * Request buttons with this custom functions.
 * Example: fx_button('My Button Text', '#', 'blue-button', 'margin-top: 20px;');
 *
 * @since 1.0.0
 */
function fx_button( $content, $link, $class, $style ) {

	echo '<a class="' . esc_attr( $class ) . '" href="' . esc_attr( $link ) . '" style="' . esc_attr( $style ) . '">' . esc_html( $content ) . '</a>';

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

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf(
		$time_string,
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

	echo '<span class="posted-on">' . wp_kses_post( $posted_on ) . '</span>'; // WPCS: XSS OK.

}


/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function fx_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
		?>

			<div class="post-image">

				<?php the_post_thumbnail(); ?>

			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<div class="post-image">

				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
					<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
					?>
				</a>

			</div>

			<?php
		endif; // End is_singular().
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


/**
 * Pingback Header
 *
 * @return void
 */
function fx_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'fx_pingback_header' );


/**
 * Asset Optimization
 *
 * @return void
 */
function fx_asset_optimization() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	add_filter( 'emoji_svg_url', '__return_false' );

	remove_action( 'wp_head', 'wp_print_scripts' );
	remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );

	add_filter( 'xmlrpc_enabled', '__return_false' );
	add_filter( 'pings_open', '__return_false', 9999 );

	add_action( 'wp_footer', 'wp_print_scripts', 5 );
	add_action( 'wp_footer', 'wp_print_head_scripts', 5 );

}

add_action( 'init', 'fx_asset_optimization' );


function fx_remove_jquery_migrate( &$scripts ) {

	if ( ! is_admin() ) {
		$scripts->remove( 'jquery' );
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
	}

}
add_filter( 'wp_default_scripts', 'fx_remove_jquery_migrate' );


/**
 * Hide WP Version
 *
 * @return void
 */
function fx_hide_wp_version() {
	return '';
}

remove_action( 'wp_head', 'wp_generator' );

add_filter( 'the_generator', 'fx_hide_wp_version' );


/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function fx_entry_footer() {

	$author_id          = get_the_author_meta( 'ID' );
	$author_image_class = ( get_the_author_meta( 'description' ) ) ? 'mt-2' : '';
	$categories_list    = get_the_category_list( esc_html__( ', ', 'flex' ) );
	$tags_list          = get_the_tag_list( '', ', ' );

	?>

	<div class="flex space-x-4">

		<img src="<?php echo esc_html( get_avatar_url( $author_id ) ); ?>" alt="<?php echo esc_html( get_the_author_meta( 'display_name' ) . ' Image' ); ?>" class="w-12 h-12 rounded-full <?php echo esc_html( $author_image_class ); ?>">

		<dl class="text-sm font-medium whitespace-no-wrap">

			<dt class="sr-only"><?php esc_html_e( 'Author Name', 'flex' ); ?></dt>

			<dd class="text-lg text-gray-900"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></dd>

			<?php if ( get_the_author_meta( 'description' ) ) : ?>

				<dt class="sr-only"><?php esc_html_e( 'Author Description', 'flex' ); ?></dt>

				<dd class="mb-2 text-base font-normal text-gray-600"><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></dd>

			<?php endif; ?>

			<dt class="sr-only"><?php esc_html_e( 'Author Archive Link', 'flex' ); ?></dt>

			<dd><a href="<?php echo esc_html( get_author_posts_url( $author_id ) ); ?>" class="text-blue-600 hover:text-blue-700 transition-fx"><?php esc_html_e( 'See all posts by this author →', 'flex' ); ?></a></dd>

		</dl>

	</div>

	<div class="flex pt-4 mt-6 text-sm text-gray-600 border-t border-gray-100 post-categories">

		<span class="inline-flex mr-1 text-gray-700"><?php esc_html_e( 'Categories: ', 'flex' ); ?></span>

		<?php
		if ( $categories_list ) {
			echo '<span class="text-gray-600 cat-links hover:text-gray-700 transition-fx">';
			printf(
				wp_kses(
				/* translators: 1: list of categories. */
					__( '<span class="screen-reader-text">Posted in </span>%1$s', 'flex' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				$categories_list
			);
			echo '</span>';
		}
		?>
	</div>

	<?php if ( $tags_list ) : ?>

	<div class="flex pt-4 mt-6 text-sm text-gray-600 border-t border-gray-100 post-tags">

		<span class="inline-flex mr-1 text-gray-700"><?php esc_html_e( 'Tags: ', 'flex' ); ?></span>

		<?php

			echo '<span class="text-gray-600 cat-links hover:text-gray-700 transition-fx">';

			printf(
				wp_kses(
					__( '<span class="screen-reader-text">Posted in </span>%1$s', 'flex' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				$tags_list
			);

			echo '</span>';

		?>
	</div>

	<?php endif; ?>

	<?php

}
