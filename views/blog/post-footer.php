<?php
/**
 * Prints HTML with meta information for the categories, tags and comments.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

	// Don't show on pages.
if ( is_page() ) {
	return;
}

	$author_id          = get_the_author_meta( 'ID' );
	$author_image_class = get_the_author_meta( 'description' ) ? 'mt-2' : '';
	$categories_list    = get_the_category_list( esc_html__( ', ', 'flex' ) );
	$tags_list          = get_the_tag_list( '', ', ' );

?>

<div class="px-6 py-6 border-t border-gray-100 sm:px-10 single-footer">

	<div class="flex space-x-4 items-top">

		<img src="<?php echo esc_html( get_avatar_url( $author_id ) ); ?>" alt="<?php echo esc_html( get_the_author_meta( 'display_name' ) . ' Image' ); ?>" class="w-16 h-16 rounded-full <?php echo esc_html( $author_image_class ); ?>">

		<dl class="text-sm font-medium whitespace-no-wrap">

			<dt class="sr-only"><?php esc_html_e( 'Author Name', 'flex' ); ?></dt>

			<dd class="text-lg text-gray-900"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></dd>

			<?php if ( get_the_author_meta( 'description' ) ) : ?>

				<dt class="sr-only"><?php esc_html_e( 'Author Description', 'flex' ); ?></dt>

				<dd class="mb-2 text-base font-normal text-gray-600"><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></dd>

			<?php endif; ?>

			<dt class="sr-only"><?php esc_html_e( 'Author Archive Link', 'flex' ); ?></dt>

			<dd class="mt-1"><a href="<?php echo esc_html( get_author_posts_url( $author_id ) ); ?>" class="text-blue-600 hover:text-blue-700 transition-fx"><?php esc_html_e( 'See all posts by this author →', 'flex' ); ?></a></dd>

		</dl>

	</div>


	<?php if ( $tags_list ) : ?>

		<div class="flex pt-4 mt-4 text-sm text-gray-600 border-t border-gray-100 post-tags">

			<span class="inline-flex mr-1 text-gray-700"><?php esc_html_e( 'Tags: ', 'flex' ); ?></span>

				<span class="text-gray-600 cat-links hover:text-gray-700 transition-fx">
				<?php
					echo wp_kses_post(
						printf(
							/* translators: %1$s: Tags list. */
							__( '<span class="screen-reader-text">Posted in </span>%1$s', 'flex' ),
							$tags_list
						)
					);
				?>
				</span>
		</div>

	<?php endif; ?>

</div>
