<?php
/**
 * The template for displaying Post.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php fx_post_thumbnail(); ?>

		<div class="post-heading">

			<div class="post-category">

				<?php the_category( ', ' ); ?>

			</div>

			<h2 class="post-title">

				<a class="flex items-center text-gray-800 hover:text-opacity-80 transition-fx" href="<?php echo esc_url( get_the_permalink() ); ?>">

					<?php echo esc_html( get_the_title() ); ?>

				</a>

			</h2>

		</div>

		<div class="w-full px-10 pt-4 space-y-4 overflow-hidden">

			<div class="post-content">

				<?php echo wp_kses_post( has_excerpt( $post->ID ) ? get_the_excerpt() : get_the_content() ); ?>

			</div>

			<div class="read-more">

				<a class="text-blue-600 transition-fx hover:text-opacity-80" href="<?php echo esc_url( get_the_permalink() ); ?>">

					<?php esc_html_e( 'Read more →', 'flex' ); ?>

				</a>

			</div>

		</div>

		<div class="post-footer">

			<span class="post-data post-author">

				<?php fx_posted_by(); ?>

			</span>

			<span class="post-data post-comments">

				<a href="<?php echo esc_url( get_the_permalink() ); ?>#comments"><?php esc_html_e( 'Comments ', 'flex' ); ?><span>(<?php comments_number( '0', '1', '%' ); ?>)</span></a>

			</span>

			<span class="post-data post-date">

				<?php fx_posted_on(); ?>

			</span>

		</div>

</article>
