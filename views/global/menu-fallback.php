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
		<li id="menu-item-1303" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1303">
			<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
				<?php esc_html_e( 'Set your primary menu here', 'flex' ); ?>
				<span class="chevron"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="ArrowRight"><path d="M4 12h16"/><path d="M13 5l7 7-7 7"/></svg></svg>
			</span>
		</a>
	</ul>
</nav>
