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
		fx_render( 'views/blog/post-loop' );
	}
);