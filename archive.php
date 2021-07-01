<?php
/**
 * The template for displaying Header.
 *
 * The structure of the page that contains the archive and archive content.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */

?>
<?php
$query_term       = get_queried_object();
$archive_taxonomy = $query_term->taxonomy;
$archive_name     = $query_term->name;

?>

<?php get_header(); ?>

	<div class="max-w-5xl px-8 py-10 mx-auto divide-y divide-gray-200 lg:px-6">

		<?php fx_template( 'views/home/title' ); ?>

		<?php
			fx_template(
				'views/blog/post-loop',
				array(
					'nopaging'       => false,
					'posts_per_page' => 10,
					'paged'          => $paged,
					'tax_query'      => array( // (array) - use taxonomy parameters (available with Version 3.1).
						'relation' => ' and ', // (string) - The logical relationship between each inner taxonomy array when there is more than one. Possible values are ' and ', ' or '. Do not use with a single inner taxonomy array. Default value is ' and '.
						array(
							'taxonomy'         => $query_term->taxonomy, // (string) - Taxonomy.
							'terms'            => $query_term->term_id,
							'field'            => 'id', // (string) - Select taxonomy term by Possible values are 'term_id', 'name', 'slug' or 'term_taxonomy_id'. Default value is 'term_id'.
							'include_children' => true, // (bool) - Whether or not to include children for hierarchical taxonomies. Defaults to true.
							'operator'         => 'IN', // (string) - Operator to test. Possible values are 'IN', 'NOT IN', ' and ', 'EXISTS' and 'NOT EXISTS'. Default value is 'IN'.
						),
					),
				)
			);
			?>

	</div>

<?php
get_footer();
