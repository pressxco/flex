<?php
/**
 * The template for displaying Footer
 *
 * The area of the page that contains footer area.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

?>
		</main>

		<?php get_sidebar(); ?>

		<footer id="primary">

			<div class="container">

				<p class="copyright"><?php esc_html_e( '© 2020 proudly developed by PressX.', 'flex' ); ?></p>

			</div>

		</footer>

		<?php wp_footer(); ?>

	</body>

</html>
