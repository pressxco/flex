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
	'default',
	function () {
		?>

		<div id="archive" class="container px-8 pb-10 mx-auto lg:px-6">

			<div class="archive-title">

			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>

			</div>

			<div class="grid grid-cols-3 gap-7">

				<div class="col-span-3 md:col-span-2">

					<div class="post-loop space-y-7">

						<?php fx_render( 'views/blog/post-loop' ); ?>

					</div>

				</div>

				<div class="col-span-3 md:col-span-1">

					<?php get_sidebar(); ?>

				</div>

			</div>

		</div>

		<?php
	}
);
