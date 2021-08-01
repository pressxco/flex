<?php
/**
 * The template for displaying Search Title.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

$classes = ( $args ) ? $args : '';

?>

<div class="pb-6 space-y-1 <?php echo esc_attr( $classes ); ?> md:space-y-3">

		<?php if ( have_posts() ) : ?>

			<h1 class="text-3xl font-bold text-gray-800 tracking-tight sm:text-4xl md:text-[2rem] md:leading-[2rem]">

				<?php printf( esc_html__( 'Search Results for: %s', 'flex' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>

			</h1>

		<?php else : ?>

			<h1 class="text-3xl font-bold text-gray-800 tracking-tight sm:text-4xl md:text-[2rem] md:leading-[2rem]">

				<?php esc_html_e( 'Nothing Found', 'flex' ); ?>

			</h1>

		<?php endif; ?>


</div>
