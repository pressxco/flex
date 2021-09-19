<?php
/**
 * Primary menu fallback.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

?>

<nav class="primary">
	<ul class="primary-menu">
		<li class="menu-item">
			<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
				<?php esc_html_e( 'Set your primary menu here →', 'flex' ); ?>
			</a>
		</li>
	</ul>
</nav>
