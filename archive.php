<?php
/**
 * The template for displaying Header.
 *
 * The structure of the page that contains the archive and archive content.
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

		<div class="archive-title">

			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>

		</div>

		<?php fx_render( 'views/blog/post-loop' ); ?>

		<?php
	}
);
