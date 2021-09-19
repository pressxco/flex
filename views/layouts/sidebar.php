<?php
/**
 *
 * Sidebar layout.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

get_header();
?>

<div id="layout-<?php echo esc_attr( $layout_name ); ?>" class="container px-4 py-7 mx-auto lg:px-6 relative">

	<div class="grid grid-cols-3 gap-7">

		<div class="col-span-3 md:col-span-2">

			<?php $layout_content(); ?>

		</div>

		<div class="col-span-3 md:col-span-1">

			<?php get_sidebar(); ?>

		</div>

	</div>

</div>

<?php
get_footer();
