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

					<?php fx_render( 'views/parts/header/brand' ); ?>

					<?php fx_render( 'views/parts/header/navigation' ); ?>

					<?php fx_render( 'views/global/hamburger' ); ?>

				</div>

			</div>

		</header>

		<main class="site-main" role="main">

			<?php fx_render( 'views/global/breadcrumbs' ); ?>
