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

				<?php echo esc_html( get_the_title() ); ?>

			</h2>

		</div>

		<?php if ( ! is_page() ) : ?>

		<div class="post-footer single">

			<span class="post-data post-author">

			<?php fx_render( 'views/blog/post-author' ); ?>

			</span>

			<span class="post-data post-comments">

				<a href="<?php echo esc_url( get_the_permalink() ); ?>#comments"><?php esc_html_e( 'Comments', 'flex' ); ?><span>(<?php comments_number( '0', '1', '%' ); ?>)</span></a>

			</span>

			<span class="post-data post-date">

				<?php fx_render( 'views/blog/post-date' ); ?>

			</span>

		</div>

		<?php endif; ?>

		<?php fx_render( 'views/blog/post-thumbnail' ); ?>

		<div class="w-full px-6 py-8 space-y-4 overflow-hidden sm:px-10">

			<div class="post-content single ">

				<?php wp_kses_post( the_content() ); ?>

				<?php wp_link_pages(); ?>

			</div>

		</div>

		<?php fx_render( 'views/blog/post-footer' ); ?>

		<?php comments_template(); ?>

</article>
