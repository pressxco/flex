<?php
/**
 * The template for displaying Post Heading.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

?>

<div class="<?php echo esc_attr( $post->post_type ); ?>-heading">

	<div class="post-category">

		<?php the_category( ', ' ); ?>

	</div>

	<h2 class="post-title">

		<?php if ( ! is_singular() ) : ?>
		<a href="<?php the_permalink(); ?>">
		<?php endif; ?>

			<?php the_title(); ?>

		<?php if ( ! is_singular() ) : ?>
			</a>
		<?php endif; ?>

	</h2>

</div>
