<?php
/**
 * The template for displaying Title
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

$classes = ( $args ) ? $args : '';

?>

<div class="pb-6 space-y-1 <?php echo esc_attr( $classes ); ?> md:space-y-3">


		<h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-[2rem] md:leading-[2rem]">

			<?php if ( is_home() || is_front_page() ) : ?>

				<?php esc_html_e( 'Latest', 'flex' ); ?>

				<?php else : ?>

					<?php echo esc_html( wp_title( '' ) ); ?>

			<?php endif; ?>

	</h1>


</div>
