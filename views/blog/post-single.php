<?php

$view_params = array(
	'post_title'   => get_the_title(),
	'post_content' => ( has_excerpt( $post->ID ) ) ? get_the_excerpt() : get_the_content(),
	'post_link'    => get_the_permalink(),
	'post_date'    => get_the_date( 'M d, Y' ),
	'post_day'     => get_the_date( 'd' ),
	'post_month'   => get_the_time( 'm' ),
	'post_year'    => get_the_time( 'Y' ),
	'post_type'    => ( is_page() ) ? 'page' : 'post',
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="<?php echo esc_attr( $view_params['post_type'] ); ?>-heading single">

			<div class="post-category">

				<?php the_category( ', ' ); ?>

			</div>

			<h2 class="post-title single">

				<a class="flex items-center text-gray-800 break-all" href="<?php echo esc_url( $view_params['post_link'] ); ?>">

					<?php if ( is_sticky() ) : ?>

						<span class="mr-2 pin"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Pin"><path d="M16.115 2h-8.23C6.97 2 6.2 2.572 6.086 3.333L6 4c-.08.539.174.985.584 1.363.125.115.251.23.375.347.776.732.85 1.858.508 2.869l-.429 1.269a2.948 2.948 0 0 1-.09.3c-.099.269-.33.862-.63 1.379-.19.327-.478.58-.793.79-.756.504-.4 1.683.51 1.683H10.5v2.111c0 1.242-.21 2.467.345 3.578L12 22l1.155-2.31c.556-1.112.345-2.337.345-3.579V14h4.465c.91 0 1.266-1.18.51-1.684-.315-.21-.603-.462-.793-.79a9.33 9.33 0 0 1-.63-1.379 2.97 2.97 0 0 1-.09-.3l-.429-1.269c-.34-1.01-.267-2.136.508-2.868.124-.117.25-.232.375-.347.41-.378.664-.824.584-1.363l-.086-.667C17.8 2.572 17.029 2 16.115 2z"/></svg></span>

						<?php endif; ?>

					<?php echo esc_html( wp_trim_words( $view_params['post_title'], 10 ) ); ?>

				</a>

			</h2>

		</div>

		<?php if ( ! is_page() ) : ?>

		<div class="post-footer single">

			<span class="post-data post-author">

				<?php fx_posted_by(); ?>

			</span>

			<span class="post-data post-comments">

				<a href="<?php echo esc_url( $view_params['post_link'] ); ?>#comments"><?php echo __( 'Comments', 'flex' ); ?><span>(<?php comments_number( '0', '1', '%' ); ?>)</span></a>

			</span>

			<span class="post-data post-date">

				<?php fx_posted_on(); ?>

			</span>

		</div>

		<?php endif; ?>

		<?php fx_post_thumbnail(); ?>

		<div class="w-full px-6 py-8 space-y-4 overflow-hidden sm:px-10">

			<div class="post-content single ">

				<?php wp_kses_post( the_content() ); ?>

				<?php wp_link_pages(); ?>

			</div>

		</div>

		<?php if ( ! is_page() ) : ?>

		<div class="px-8 py-6 border-t border-gray-100 single-footer">

			<?php fx_entry_footer(); ?>

		</div>

		<?php endif; ?>

		<?php if ( comments_open() ) : ?>

		<div class="page-comments">

			<?php wp_list_comments(); ?>

			<?php comments_template(); ?>

			<?php the_comments_navigation(); ?>

		</div>

		<?php endif; ?>
</article>
