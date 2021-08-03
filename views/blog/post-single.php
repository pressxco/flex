<?php
/**
 * The template for displaying Post Single.
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
	'post_type'    => ( is_page() ) ? 'page' : 'post',
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="<?php echo esc_attr( $view_params['post_type'] ); ?>-heading single">

			<div class="post-category">

				<?php the_category( ', ' ); ?>

			</div>

			<h2 class="post-title single">

				<a class="flex items-center text-gray-800" href="<?php echo esc_url( $view_params['post_link'] ); ?>">

					<?php echo esc_html( $view_params['post_title'] ); ?>

				</a>

			</h2>

		</div>

		<?php if ( ! is_page() ) : ?>

		<div class="post-footer single">

			<span class="post-data post-author">

				<?php fx_posted_by(); ?>

			</span>

			<span class="post-data post-comments">

				<a href="<?php echo esc_url( $view_params['post_link'] ); ?>#comments"><?php esc_html_e( 'Comments', 'flex' ); ?><span>(<?php comments_number( '0', '1', '%' ); ?>)</span></a>

			</span>

			<span class="post-data post-date">

				<?php fx_posted_on(); ?>

			</span>

		</div>

		<?php endif; ?>

		<?php fx_post_thumbnail(); ?>

		<div class="w-full px-6 py-8 space-y-4 overflow-hidden sm:px-10">

			<div class="post-content single ">

				<?php wp_kses_post( the_content() ); ?>

				<?php wp_link_pages(); ?>

			</div>

		</div>

		<?php if ( ! is_page() ) : ?>

		<div class="px-8 py-6 border-t border-gray-100 single-footer">

			<?php fx_entry_footer(); ?>

		</div>

		<?php endif; ?>

		<?php if ( comments_open() ) : ?>

		<div class="page-comments">

			<?php wp_list_comments(); ?>

			<?php comments_template(); ?>

			<?php the_comments_navigation(); ?>

		</div>

		<?php endif; ?>
</article>
