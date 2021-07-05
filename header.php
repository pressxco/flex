<?php
/**
 * The template for displaying Header.
 *
 * The area of the page that contains <head> and header area.
 *
 * @package flex
 * @author pressx
 * @since   1.0.0
 */

?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php wp_body_open(); ?>

		<header id="primary">

			<div class="container">

				<div class="wrap">

					<div class="brand">

						<a href="<?php echo esc_html( home_url() ); ?>" class="flex items-center">

							<?php fx_icon( 'fx-logo' ); ?>

						</a>

					</div>


					<nav class="primary">

						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
									'menu_class'     => 'primary-menu',
									'fallback_cb'    => 'fx_main_menu_fallback',
									'container'      => false,
									'depth'          => 3,
								)
							);

							// fx_optimized_nav( 'primary', '<ul class="%2$s">%3$s</ul>', 'primary-menu', 'fx_main_menu_fallback', 3 );
							?>

					</nav>

					<?php fx_template( 'views/global/search' ); ?>

					<div class="block hamburger lg:hidden">

						<div class="inline-flex items-center py-3 pl-3 text-gray-600 cursor-pointer transition-fx hover:text-gray-500 mobile-trigger">

							<span class="mt-0.5 m-open"><?php fx_icon( 'menu-icon' ); ?></span>

							<span class="ml-1.5 text-base font-medium mt-open"><?php esc_html_e( 'Menu', 'flex' ); ?></span>

						</div>

					</div>

				</div>

			</div>

		</header>

		<main id="primary" class="site-main" role="main">

		<div class="container">

			<?php fx_template( 'views/global/breadcrumbs' ); ?>

		</div>
