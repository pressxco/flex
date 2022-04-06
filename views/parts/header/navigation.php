<nav class="primary">

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
			'menu_class'     => 'primary-menu',
			'fallback_cb'    => function() {
				fx_render( 'views/global/menu-fallback' );
			},
			'container'      => false,
			'depth'          => 3,
		)
	);
	?>

</nav>
