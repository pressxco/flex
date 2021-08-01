<?php
/**
 * The template for displaying Post Loop.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

$paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
$template = ( isset( $args['template'] ) ) ? $args['template'] : 'views/blog/post';
$loop     = ( isset( $args['loop_arguments'] ) ) ? new WP_Query( $args['loop_arguments'] ) : $wp_query;

?>

<?php
while ( $loop->have_posts() ) :
	$loop->the_post();
	?>

	<?php fx_template( $template ); ?>

<?php endwhile; ?>

<div class="pagination">

	<?php the_posts_pagination(); ?>

</div>

<?php wp_reset_postdata(); ?>
