<?php

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';

$loop = new WP_Query( $args );

?>

<?php
while ( $loop->have_posts() ) :
	$loop->the_post();
	?>

	<?php fx_template( 'views/blog/post' ); ?>

<?php endwhile; ?>

<div class="pagination">

	<?php the_posts_pagination(); ?>

</div>

<?php wp_reset_postdata(); ?>
