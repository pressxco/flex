<?php
/**
 * Prints HTML with meta information for the current author.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

// Do not run on pages.
if ( is_page() ) {
	return;
}

$post_author = sprintf(
	/* translators: %s: post author. */
	__( '<span class="screen-reader-text">by </span>%s', 'flex' ),
	'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
);


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

<div class="post-footer single">

	<span class="post-data post-author">

		<?php echo wp_kses_post( $post_author ); ?>

	</span>

	<span class="post-data post-comments">

		<a href="<?php the_permalink(); ?>#comments"><?php esc_html_e( 'Comments', 'flex' ); ?><span>(<?php comments_number( '0', '1', '%' ); ?>)</span></a>

	</span>

	<span class="post-data post-date">

		<span class="posted-on"><?php echo wp_kses_post( $posted_on ); ?></span>

	</span>

</div>
