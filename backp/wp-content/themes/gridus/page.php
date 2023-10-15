<?php
/* The template for displaying pages */

get_header(); ?>

<div id="content">
	<?php
	if ( function_exists( 'get_fields' ) ) {
		$wrapperDisabled = get_field('disable_page_wrapper');
	} else {
		$wrapperDisabled = false;
	}

	echo $wrapperDisabled ? '' : '<div id="wraps" class="padding-50">';

	if ( have_posts() ) : ?>

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				?>
				<div class="dividewhite4"></div>
				<?php
				comments_template();
			}

			// End the loop.
		endwhile;

	// If no content, include the "No posts found" template.
	else :
		get_template_part( 'template-parts/content', 'none' );

	endif;

	echo $wrapperDisabled ? '' : '</div>';

	?>

</div>

<?php get_footer(); ?>

