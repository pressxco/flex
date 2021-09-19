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

	<?php fx_render( 'views/blog/post-thumbnail' ); ?>

	<div class="post-heading">

		<div class="post-category">

			<?php the_category( ', ' ); ?>

		</div>

		<h2 class="post-title">

			<a class="flex items-center text-gray-800 hover:text-opacity-80 transition-fx" href="<?php the_permalink(); ?>">

				<?php the_title(); ?>

			</a>

		</h2>

	</div>

	<div class="w-full px-6 pt-4 space-y-4 overflow-hidden sm:px-10">

		<div class="post-content">

			<?php the_excerpt(); ?>

		</div>

	</div>

	<div class="post-footer">

		<span class="post-data post-author">

			<?php fx_render( 'views/blog/post-author' ); ?>

		</span>

		<span class="post-data post-comments">

			<a href="<?php the_permalink(); ?>#comments"><?php esc_html_e( 'Comments ', 'flex' ); ?><span>(<?php comments_number( '0', '1', '%' ); ?>)</span></a>

		</span>

		<span class="post-data post-date">

		<?php fx_render( 'views/blog/post-date' ); ?>

		</span>

	</div>

</article>
