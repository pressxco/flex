<?php
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
	return;
}

if ( is_singular() ) :
	?>

		<div class="post-image">

		<?php the_post_thumbnail(); ?>

		</div><!-- .post-thumbnail -->

	<?php else : ?>

		<div class="relative post-image">

				<?php if ( is_sticky() ) : ?>

					<span title="sticky" class="absolute z-40 flex items-center justify-center w-8 h-8 text-white bg-black rounded-full bg-opacity-10 pin right-3 top-3"><?php fx_icon( 'sticky-icon' ); ?></span>

				<?php endif; ?>

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
