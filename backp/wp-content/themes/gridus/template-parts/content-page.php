<?php
/**
 * The template part for displaying content
 */
?>

<!-- Container -->
<div class="content-wrap">
	<?php
	if ( function_exists( 'get_fields' ) ) {
		$titleDisabled = get_field('disable_page_title');
	} else {
		$titleDisabled = false;
	}

	if ( !$titleDisabled ) { ?>
		<header class="inner-section">
			<?php the_title( '<h2 class="font-accident-two-normal uppercase">', '</h2>' ); ?>
		</header>
	<?php }

	the_content();

	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'gridus' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'gridus' ) . ' </span>%',
		'separator'   => '<span class="screen-reader-text">, </span>',
	) );
	?>

</div>
