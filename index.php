<?php
/**
 *
 * The structure of the page that contains the front page and it's content.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

?>

<?php
fx_layout(
	'sidebar',
	function () {
		?>

		<?php fx_render( 'views/blog/post-loop' ); ?>

		<?php
	}
);
