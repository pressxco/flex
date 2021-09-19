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

	<?php fx_render( 'views/blog/post-heading' ); ?>

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
