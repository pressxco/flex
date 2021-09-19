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

	<div class="<?php echo esc_attr( $post->post_type ); ?>-heading">

		<div class="post-category">

			<?php the_category( ', ' ); ?>

		</div>

		<h2 class="post-title">

			<?php
			if ( ! is_singular() ) {
				echo '<a href="' . esc_attr( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>';
			} else {
				the_title();
			}
			?>

		</h2>

	</div>

	<?php fx_render( 'views/blog/post-meta' ); ?>

	<?php fx_render( 'views/blog/post-thumbnail' ); ?>

	<div class="post-content">

		<?php
		if ( is_single() || is_page() ) {

			the_content();
			wp_link_pages();

		} else {

			the_excerpt();

		}
		?>

	</div>

	<?php fx_render( 'views/blog/post-footer' ); ?>

	<?php comments_template(); ?>

</article>
