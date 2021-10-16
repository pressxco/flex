<?php
/**
 * The template for displaying Single Post.
 *
 * The structure of the page that contains the single post and it's content.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

?>

<?php
fx_layout(
	'sidebar',
	function() {
		?>

		<?php get_template_part( 'views/blog/post-loop' ); ?>

		<?php
	}
);

