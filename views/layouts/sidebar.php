<?php
/**
 *
 * Sidebar layout.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

?>

<?php get_header(); ?>

<div id="layout-<?php echo esc_attr( $layout_name ); ?>">

	<div class="container px-4 py-10 mx-auto lg:px-6">

		<div class="grid grid-cols-3 gap-7">

			<div class="col-span-3 md:col-span-2">

				<div class="post-loop space-y-7">

					<?php $layout_content(); ?>

				</div>

			</div>

			<div class="col-span-3 md:col-span-1">

				<?php get_sidebar(); ?>

			</div>

		</div>

	</div>

</div>

<?php
get_footer();
