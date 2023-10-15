<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>

<?php
// Start the loop.
while ( have_posts() ) : the_post();

	// Include the single post content template.
	get_template_part( 'template-parts/content', 'single' );

	// End of the loop.
endwhile;
?>

<?php get_footer(); ?>
