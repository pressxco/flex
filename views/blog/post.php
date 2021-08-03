<?php
/**
 * The template for displaying Post.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

$view_params = array(
	'post_title'   => get_the_title(),
	'post_content' => ( has_excerpt( $post->ID ) ) ? get_the_excerpt() : get_the_content(),
	'post_link'    => get_the_permalink(),
	'post_date'    => get_the_date( 'M d, Y' ),
	'post_day'     => get_the_date( 'd' ),
	'post_month'   => get_the_time( 'm' ),
	'post_year'    => get_the_time( 'Y' ),
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php fx_post_thumbnail(); ?>

		<div class="post-heading">

			<div class="post-category">

				<?php the_category( ', ' ); ?>

			</div>

			<h2 class="post-title">

				<a class="flex items-center text-gray-800 hover:text-opacity-80 transition-fx" href="<?php echo esc_url( $view_params['post_link'] ); ?>">

					<?php echo esc_html( $view_params['post_title'] ); ?>

				</a>

			</h2>

		</div>

		<div class="w-full px-10 pt-4 space-y-4 overflow-hidden">

			<div class="post-content">

				<?php echo wp_kses_post( $view_params['post_content'] ); ?>

			</div>

			<div class="read-more">

				<a class="text-blue-600 transition-fx hover:text-opacity-80" href="<?php echo esc_url( $view_params['post_link'] ); ?>">

					<?php esc_html_e( 'Read more →', 'flex' ); ?>

				</a>

			</div>

		</div>

		<div class="post-footer">

			<span class="post-data post-author">

				<?php fx_posted_by(); ?>

			</span>

			<span class="post-data post-comments">

				<a href="<?php echo esc_url( $view_params['post_link'] ); ?>#comments"><?php esc_html_e( 'Comments ', 'flex' ); ?><span>(<?php comments_number( '0', '1', '%' ); ?>)</span></a>

			</span>

			<span class="post-data post-date">

				<?php fx_posted_on(); ?>

			</span>

		</div>

</article>
