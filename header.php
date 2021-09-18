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

		<header class="primary">

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
						?>

					</nav>

					<?php fx_render( 'views/global/hamburger' ); ?>

				</div>

			</div>

		</header>

		<main class="site-main" role="main">

			<div id="breadcrumb">

				<div class="container">

					<?php fx_render( 'views/global/breadcrumbs' ); ?>

				</div>

			</div>
