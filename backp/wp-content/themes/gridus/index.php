<?php
/**
 * The main template file
 */

get_header(); ?>

<!-- Container -->
<div class="content-wrap">
	<div id="blog-list" class="inner-content">
		<section class="inner-section">
			<div class="container-fluid nopadding">
				<div class="flex row">
					<?php get_sidebar('left') ?>

					<div class="posts-feed">
						<?php if ( have_posts() ) : ?>

							<?php
							// Start the loop.
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content', get_post_format() );
							endwhile;
							?>

							<!--Pagination-->
							<div class="col-md-12">
								<div id="tf-pagination">
									<?php
									// Previous/next page navigation.
									the_posts_pagination( array(
										'prev_text'          => esc_html__( 'Previous page', 'gridus' ),
										'next_text'          => esc_html__( 'Next page', 'gridus' ),
										'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'gridus' ) . ' </span>',
									) );
									?>
									<div class="dividewhite6"></div>
								</div>
							</div>
							<!--/Pagination-->

						<?php
						// If no content, include the "No posts found" template.
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
					</div>

					<?php get_sidebar('right') ?>
				</div>
			</div>
		</section>
	</div>
</div>

<?php get_footer(); ?>
