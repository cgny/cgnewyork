<?php
/**
 * The template part for displaying single posts
 */
?>

<!-- Container -->
<div class="content-wrap">

	<div id="post-<?php the_ID(); ?>" <?php post_class( 'blogpost inner-content' ); ?>>

		<section class="inner-section">
			<div class="post-header">
				<h2 class="font-accident-two-normal uppercase"><?php the_title() ?></h2>
				<div class="dividewhite2"></div>
			</div>
			<div class="dividewhite4"></div>
			<div class="row">
				<div class="col-md-4">
					<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive' ) ) ?>
					<div class="dividewhite4"></div>
					<ul class="jobinfo">
						<li><?php esc_html_e( 'Date:', 'gridus' ); ?> <span> <?php the_date("F j, Y") ?></span></li>
						<li><?php esc_html_e( 'Categories:', 'gridus' ); ?> <span> <?php echo get_the_term_list( get_the_ID(), 'portfolio_category', '', ', ', ''); ?></span></li>
						<li><?php esc_html_e( 'Tags:', 'gridus' ); ?> <span> <?php echo get_the_term_list( get_the_ID(), 'portfolio_tag', '', ', ', ''); ?></span></li>
						<li><?php esc_html_e( 'Author:', 'gridus' ); ?> <span> <?php the_author_posts_link() ?></span></li>
					</ul>
				</div>
				<div class="col-md-1"></div>
				<div id="portfolio-overview" class="col-md-7">
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

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

					?>
					<!-- /Post Content -->
				</div>
			</div>
			<?php if (get_theme_mod('portfolio_hide_items') !== '1') { ?>
				<section id="portfolio" class="e-block e-block-skin">
					<div class="light">

						<div class="dividewhite8"></div>

						<div class="container-fluid text-center">
							<h3 class="font-accident-one uppercase"><?php echo esc_html__('Latest Items', 'gridus') ?></h3>
							<div class="dividewhite4"></div>
						</div>

						<div class="grid container-fluid ">
							<div id="posts" class="row popup-container">
								<?php
								if (function_exists('gridus_portfolio_shortcode')) {
									echo wp_kses(gridus_portfolio_shortcode(array(
										'limit' => 4,
										'orderby' => 'date',
										'order' => 'ASC',
										'categories' => '*',
										'hide_filters' => '1',
										'item_page' => '1',
										'just_items' => '1'
									)), 'post');
								}
								?>
							</div>
						</div>
					</div>
				</section>
			<?php } ?>
		</section>

	</div>
</div>