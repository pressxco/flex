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

<?php get_header(); ?>

	<div class="container px-8 pb-10 mx-auto lg:px-6">

		<div class="grid grid-cols-3 gap-7">

			<div class="col-span-3 md:col-span-2">

				<div class="post-loop space-y-7">

					<?php fx_template( 'views/blog/post-loop', array( 'template' => 'views/blog/post-single' ) ); ?>

				</div>

			</div>

			<div class="col-span-3 md:col-span-1">

				<?php get_sidebar(); ?>

			</div>

		</div>

	</div>

<?php
get_footer();
