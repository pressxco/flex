<?php

$classes = ( $args ) ? $args : '';

?>

<div class="pb-6 space-y-1 <?php echo esc_attr( $classes ); ?> md:space-y-3">

		<?php if ( have_posts() ) : ?>

			<h1 class="text-3xl font-bold text-gray-800 tracking-tight sm:text-4xl md:text-[2rem] md:leading-[2rem]">

				<?php printf( __( 'Search Results for: %s', 'flex' ), '<span>' . get_search_query() . '</span>' ); ?>

			</h1>

		<?php else : ?>

			<h1 class="text-3xl font-bold text-gray-800 tracking-tight sm:text-4xl md:text-[2rem] md:leading-[2rem]">

				<?php _e( 'Nothing Found', 'flex' ); ?>

			</h1>

		<?php endif; ?>


</div>
