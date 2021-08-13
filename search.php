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
	'default',
	function() {
		?>

		<?php fx_render( 'views/global/search-title' ); ?>

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

		<?php
	}
);
