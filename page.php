<?php
/**
 * The template for displaying Page.
 *
 * The structure of the page that contains the page and page content.
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

		<?php fx_render( 'views/blog/post-loop', array( 'template' => 'views/blog/post-single' ) ); ?>

		<?php
	}
);
