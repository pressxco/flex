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
		?>

		<?php get_template_part( 'views/global/search-title' ); ?>
		<?php get_template_part( 'views/blog/post-loop' ); ?>

		<?php
	}
);
