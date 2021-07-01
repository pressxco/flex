<?php
/**
 *
 * The structure of the page that contains the front page and it's content.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

?>

<?php get_header(); ?>

<div id="welcome">

	<div class="max-w-5xl px-8 py-10 mx-auto divide-y divide-gray-200 lg:px-6">

		<?php fx_template( 'views/home/title' ); ?>

		<?php
			fx_template(
				'views/blog/post-loop',
				array(
					'nopaging'       => false,
					'posts_per_page' => 10,
					'paged'          => $paged,
				)
			);
			?>

	</div>

</div>

<?php
get_footer();
