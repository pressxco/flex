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

<div id="layout-<?php echo esc_attr( $layout_name ); ?>" data-template="<?php echo esc_attr( get_post_type() ); ?>">

	<div class="container px-8 pb-10 mx-auto lg:px-6">

		<?php $layout_content(); ?>

	</div>

</div>

<?php
	get_footer();
