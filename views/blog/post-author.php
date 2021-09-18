<?php
/**
 * Prints HTML with meta information for the current author.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

echo wp_kses_post(
	sprintf(
		/* translators: %s: post author. */
		__( '<span class="screen-reader-text">by </span>%s', 'flex' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	)
);
