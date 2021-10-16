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

		<?php get_template_part( 'views/blog/post-loop' ); ?>

		<?php
	}
);
