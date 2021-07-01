<?php

$border_type = ( isset( $args['border'] ) && true === $args['border'] ) ? 'border-b border-gray-200' : '';

?>

<div class="pt-6 pb-6 space-y-1 <?php echo esc_attr( $border_type ); ?> md:space-y-3">


		<h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-[2.5rem] md:leading-[2rem]">

			<?php if ( is_home() || is_front_page() ) : ?>

				<?php esc_html_e( 'Latest', 'flex' ); ?>

				<?php else : ?>

					<?php echo esc_html( get_queried_object()->name ); ?>

			<?php endif; ?>

	</h1>


</div>
