<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<div id="content">

	<div id="error-404" class="inner-content">

		<section id="default" class="inner-section error-404 not-found text-center">

			<div class="container-fluid nopadding">
				<div class="dividewhite8"></div>
				<h1 class="fontcolor-medium-light">404</h1>
				<h2 class="font-accident-two-normal uppercase"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'gridus' ) ?></h2>
				<h5 class="font-accident-one-bold hovercolor uppercase"><?php esc_html_e( 'Use the Menu to find a desired content', 'gridus' ) ?></h5>
				<div class="dividewhite2"></div>
				<p class="small fontcolor-medium">
					<?php echo wp_kses( __( 'The Gridus Personal WordPress Theme. Fully Responsive theme, ideal for Personal CV Resume website, Personal Portfolio web page, <br>Freelancer or Small business website. The general advantages of the Gridus Personal vCard HTML Template are: <br>modern, clean and well-balanced design, outstanding flexibility and ease of customization.', 'gridus' ), 'post' ) ?>
				</p>
				<div class="dividewhite2"></div>
			</div>

		</section>

	</div>

</div>


<?php get_footer(); ?>
