<?php
/**
 * The template for displaying 404 Page.
 *
 * The structure of the page that contains the 404 content.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

?>

<?php get_header(); ?>

	<div id="page-404" class="container items-center px-8 mx-auto text-center">

		<div>
			<h1 class="text-404"><?php esc_html_e( '404', 'flex' ); ?></h1>

				<p class="text-gray-600"><?php esc_html_e( 'Unfortunately, we could not find the page you are looking for.', 'flex' ); ?></p>

				<p>

					<a class="inline-flex items-center text-blue-600" href="<?php esc_attr( home_url() ); ?>">

						<?php fx_icon( 'arrow-left' ); ?>

						<span class="ml-1"><?php esc_html_e( 'Get back to the home page', 'flex' ); ?></span>

					</a>

				</p>
		</div>

	</div>

<?php
get_footer();
