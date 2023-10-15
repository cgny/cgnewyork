<?php
/**
 * The template part for displaying a message that posts cannot be found
 */
?>

<div id="content">

	<div class="inner-content">

		<section id="default" class="inner-section error-404 not-found text-center">

			<div class="container text-center">
				<div class="dividewhite10"></div>
				<h3 class="font-accident-one-bold uppercase white"><?php esc_html_e( 'Nothing Found', 'gridus' ); ?></h3>
				<div class="dividewhite10"></div>
				<?php if ( current_user_can( 'publish_posts' ) ) : ?>
					<h5 class="font-accident-one-bold title uppercase hovercolor">
						<?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'gridus' ), 'default' ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
					</h5>
				<?php endif; ?>
				<?php
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

		</section>

	</div>

</div>