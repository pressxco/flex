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

?>

<div class="post-footer single">

	<span class="post-data post-author">

		<?php fx_render( 'views/blog/post-author' ); ?>

	</span>

	<span class="post-data post-comments">

		<a href="<?php the_permalink(); ?>#comments"><?php esc_html_e( 'Comments', 'flex' ); ?><span>(<?php comments_number( '0', '1', '%' ); ?>)</span></a>

	</span>

	<span class="post-data post-date">

		<?php fx_render( 'views/blog/post-date' ); ?>

	</span>

</div>
