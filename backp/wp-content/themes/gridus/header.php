<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php esc_attr( get_bloginfo( 'charset', 'display' ) ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--Pre-Loader-->
<div id="preloader"></div>

<header>

	<section id="top-navigation" class="container-fluid nopadding">

		<div class="row nopadding ident ui-bg-color01">

			<a href="<?php echo get_home_url() ?>">
				<div class="col-md-4 vc-photo" style="background-image: url('<?php header_image(); ?>');"></div>
			</a>

			<!-- /Photo -->

			<div class="col-md-8 vc-name nopadding">
				<!-- Name-Position -->
				<div class="row nopadding name">
					<?php
					$name = get_theme_mod( 'name', esc_html__( 'Samuel Anderson', 'gridus' ) );
					$cv_file = get_theme_mod( 'cv_file' );
					$hide_cv_file = empty( $cv_file );
					?>
					<div class="col-md-<?php echo $hide_cv_file ? '12' : '10'?> name-title">
						<h2 class="font-accident-two-light uppercase" style="<?php echo sprintf( 'color: #%s;', get_header_textcolor() ); ?>"><?php echo esc_html( $name ) ?></h2>
					</div>
					<div id="cv_file" class="col-md-2 nopadding name-pdf <?php echo $hide_cv_file ? 'hidden' : '' ?>">
						<a href="<?php echo esc_url( $cv_file ) ?>" class="hvr-sweep-to-right" target="_blank">
							<i class="flaticon-download149" title="<?php esc_attr__( 'Download CV', 'gridus' ) ?>"></i>
						</a>
					</div>
				</div>
				<div class="row nopadding position">
					<?php
					$social_logo = get_theme_mod( 'social_logo', 'behance7' );
					$social_link = get_theme_mod( 'social_link' );
					$hide_social_link = empty( $social_link );
					?>
					<div class="col-md-<?php echo $hide_social_link ? '12' : '10'?> position-title">

						<section class="cd-intro">
							<h4 class="cd-headline clip is-full-width font-accident-two-normal uppercase">
								<?php
								$intro_fixed_part = get_theme_mod( 'intro_fixed_part', esc_html__( 'The experienced ', 'gridus' ) );
								?>
								<span><?php echo esc_html( $intro_fixed_part ) ?></span>
								<span class="cd-words-wrapper">
									<?php
									$intro_dynamic_parts = get_theme_mod( 'intro_dynamic_parts', wp_kses( __( '<b class="is-visible">UI/UX Designer</b><b>Web Designer</b><b>Photographer</b>', 'gridus' ), 'post' ) );
									echo wp_kses( $intro_dynamic_parts, 'post' );
									?>
								</span>
							</h4>
						</section>

					</div>
					<div id="behance_link" class="col-md-2 nopadding pdf <?php echo $hide_social_link ? 'hidden' : '' ?>">
						<a href="<?php echo esc_url( $social_link ) ?>" class="hvr-sweep-to-right" target="_blank">
							<i class="flaticon-<?php echo esc_attr( $social_logo ) ?>" title="<?php esc_attr_e( 'My Portfolio', 'gridus' ) ?>"></i>
						</a>
					</div>
				</div>
				<!-- /Name-Position -->

				<!-- Main Navigation -->

				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<?php
					wp_nav_menu(
						array(
		    				'container'       => '',
			    			'menu_class'      => 'row nopadding cd-side-navigation',
				    		'menu_id'         => 'nav',
					    	'fallback_cb'     => '',
					    	'depth'           => 2,
					    	'theme_location'  => 'primary'
						)
					);
					?>
				<?php endif; ?>

				<!-- /Main Navigation -->

			</div>
		</div>
	</section>

</header>
