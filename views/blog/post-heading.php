<?php
/**
 * The template for displaying Post Heading.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

?>

<div class="<?php echo esc_attr( $post->post_type ); ?>-heading">

	<div class="post-category">

		<?php the_category( ', ' ); ?>

	</div>

	<h2 class="post-title">

		<?php
		if ( ! is_singular() ) {
			echo '<a href="' . esc_attr( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>';
		} else {
			the_title();
		}
		?>

	</h2>

</div>
