<?php
/**
 * The template for displaying archive title.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

// Do not run on home and front page.
if ( is_home() || is_front_page() ) {
	return;
}

?>

<div class="archive-title">

	<?php
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
	?>

</div>
