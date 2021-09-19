<?php
/**
 * The template for displaying Post Single.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="<?php echo esc_attr( $post->post_type ); ?>-heading single">

			<div class="post-category">

				<?php the_category( ', ' ); ?>

			</div>

			<h2 class="post-title single">

				<?php the_title(); ?>

			</h2>

		</div>

		<?php fx_render( 'views/blog/post-meta' ); ?>

		<?php fx_render( 'views/blog/post-thumbnail' ); ?>

		<div class="w-full px-6 py-8 space-y-4 overflow-hidden sm:px-10">

			<div class="post-content single">

				<?php the_content(); ?>

				<?php wp_link_pages(); ?>

			</div>

		</div>

		<?php fx_render( 'views/blog/post-footer' ); ?>

		<?php comments_template(); ?>

</article>
