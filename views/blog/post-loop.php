<?php
/**
 * The template for displaying Post Loop.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

$loop     = isset( $args['loop_arguments'] ) ? new WP_Query( $args['loop_arguments'] ) : $wp_query;
$template = isset( $args['template'] ) ? $args['template'] : 'views/blog/post';

?>

<div class="post-loop space-y-7">

	<?php
	while ( $loop->have_posts() ) :
		$loop->the_post();
		?>

		<?php fx_render( $template ); ?>

	<?php endwhile; ?>

	<div class="pagination">

		<?php the_posts_pagination(); ?>

	</div>

	<?php wp_reset_postdata(); ?>

</div>
