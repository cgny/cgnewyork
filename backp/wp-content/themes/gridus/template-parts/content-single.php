<?php
/**
 * The template part for displaying single posts
 */
?>

<!-- Container -->
<div class="content-wrap">

	<div id="post-<?php the_ID(); ?>" <?php post_class( 'blogpost inner-content' ); ?>>

		<section id="page-title" class="inner-section">
			<div class="container-fluid nopadding">
				<h2 class="font-accident-two-normal uppercase"><?php the_title() ?></h2>
				<div class="post-meta">
					<span><?php esc_html_e( 'by', 'gridus' ) ?> <?php the_author_posts_link() ?>,</span> <span><?php the_date( "F j, Y" ) ?></span>
				</div>
				<div class="post-category"><?php echo get_the_category_list(', ') ?></div>

			</div>
		</section>

		<!-- Blog Block -->
		<div class="inner-section">

			<div class="container-fluid nopadding">

				<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive' ) ) ?>

				<article class="post">

<!--					<div class="dividewhite6"></div>-->

					<!-- Post Content -->
					<?php
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
					<!-- /Post Content -->

					<div class="dividewhite4"></div>
					<div class="post-tag"><?php echo get_the_tag_list( '<p>', ', ', '</p>' ); ?></div>
					<hr>

				</article>

				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>

			</div>
			<div class="dividewhite8"></div>

		</div>
		<!-- /Blog Block -->

	</div>
</div>