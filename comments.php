<?php
/**
 * The template file for displaying the comments and comment form for the
 * atakanoz theme.
 *
 * @package flex
 *
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/

if ( post_password_required() || ( ! have_comments() && ! comments_open() ) ) {
	return;
}

?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!

	if ( have_comments() ) :
		?>

		<h2 class="comments-title">
			<?php

			$fx_comment_count = get_comments_number();

			if ( '1' === $fx_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'flex' ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $fx_comment_count, 'comments title', 'flex' ) ),
					esc_html( number_format_i18n( $fx_comment_count ) ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			}
			?>

		</h2><!-- .comments-title -->

		<ol class="comment-list">

			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 64,
				)
			);
			?>

		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'flex' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form(
		array(
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		)
	);
	?>

</div><!-- #comments -->
