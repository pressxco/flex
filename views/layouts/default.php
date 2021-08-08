<?php
/**
 *
 * Default layout.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

get_header();
?>

<div id="layout-<?php echo esc_attr( $layout_name ); ?>">

	<?php fx_render( $layout_content ); ?>

</div>

<?php
get_footer();
