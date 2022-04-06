<?php
/**
 * The template for displaying Search.
 *
 * The structure of the page that contains the search & results.
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
		fx_render( 'views/global/search-title' );
		fx_render( 'views/blog/post-loop' );
	}
);