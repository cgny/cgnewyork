<?php
/* The template for displaying pages */

get_header(); ?>

<div id="content">

	<?php
	$args  = array(
		'post_type' => 'page',
		'name'      => 'portfolio'
	);
	$posts = get_posts( $args );
	foreach ( $posts as $post ) {
		setup_postdata( $post );
		// Include the page content template.
		get_template_part( 'template-parts/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
	wp_reset_postdata();
	?>

</div>

<?php get_footer(); ?>

