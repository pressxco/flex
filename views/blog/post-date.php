<?php
/**
 * Prints HTML with meta information for the current post-date/time.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

	$time_string = sprintf(
		'<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		__( '<span class="sr-only">Posted on </span>%s', 'flex' ),
		$time_string
	);

	?>

<span class="posted-on"><?php echo wp_kses_post( $posted_on ); ?></span>
