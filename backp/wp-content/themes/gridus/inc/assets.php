<?php
/**
 * Gridus Enqueues scripts and styles.
 */
function gridus_scripts() {

	// Preloader
	wp_enqueue_style( 'preloader', get_template_directory_uri() . '/assets/custom/css/preloader.css', array(), '20150825' );

	/*
	 * Vendor assets
	 */

	$vendor = get_template_directory_uri() . '/assets/vendor/';

	// Bootstrap v3.3.6
	wp_enqueue_style( 'bootstrap', $vendor . 'bootstrap/css/bootstrap.min.css', array(), '3.3.6' );
	wp_enqueue_script( 'bootstrap', $vendor . 'bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );

	// Font Awesome 4.4.0
	wp_enqueue_style( 'font-awesome', $vendor . 'fontawesome/css/font-awesome.min.css', array(), '4.4.0' );

	// Flaticon
	wp_enqueue_style( 'flaticon', $vendor . 'flaticons/flaticon.css', array(), '20150826' );

	// Hover
	wp_enqueue_style( 'hover', $vendor . 'hover/css/hover-min.css', array(), '20150825' );

	// Isotope PACKAGED v3.0.1
	wp_enqueue_script( 'isotope', $vendor . 'isotope/js/isotope.pkgd.min.js', array( 'jquery' ), '3.0.1', true );

	// Magnific Popup - v1.0.0
	wp_enqueue_style( 'magnific-popup', $vendor . 'mfp/css/magnific-popup.min.css', array(), '1.0.0' );
	wp_enqueue_script( 'magnific-popup', $vendor . 'mfp/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0.0', true );

	// Waypoints 2.0.3
	wp_enqueue_script( 'waypoints', $vendor . 'waypoints/waypoints.min.js', array( 'jquery' ), '1.0.0', true );

	// jquery-circle-progress 0.6.0
	wp_enqueue_script( 'circle-progress', $vendor . 'circle-progress/circle-progress.min.js', array( 'jquery' ), '1.1.3', true );

	// jquery.counterup.js 1.0
	wp_enqueue_script( 'anicounter', $vendor . 'anicounter/jquery.counterup.min.js', array( 'jquery' ), '1.0', true );

	// imagesloaded.pkgd.min.js 4.1.1
	wp_deregister_script( 'imagesloaded' );
	wp_enqueue_script( 'imagesloaded', $vendor . 'imagesloaded/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '4.1.1', true );

	// comment-reply
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Masonry
	if ( is_active_sidebar( 'sidebar-footer' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	// Google Maps
	wp_enqueue_script( 'google-maps', 'https://maps.google.com/maps/api/js' );
	// Google Fonts
	wp_enqueue_style( 'gridus-fonts', gridus_fonts_url(), array(), '1.0.0' );

	/*
	 * Custom assets
	 */

	// Theme stylesheet.
	wp_enqueue_style( 'gridus-style', get_template_directory_uri() . '/assets/custom/css/style.css', array(), '20150827' );

	// Color scheme.
	$color_scheme = get_theme_mod( 'color_scheme' );
	$color_scheme = $color_scheme ? $color_scheme : 'default';

	wp_enqueue_style( 'gridus-color-scheme', get_template_directory_uri() . '/assets/custom/css/colors/' . $color_scheme . '.css', array(), '20150827' );

	// Theme script.
	wp_enqueue_script( 'gridus-script', get_template_directory_uri() . '/assets/custom/js/script.js', array( 'jquery' ), '20150836' );

	wp_localize_script( 'gridus-script', 'ajaxConfig',
		array(
			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'ajaxConfig-nonce' )
		)
	);

}

add_action( 'wp_enqueue_scripts', 'gridus_scripts' );


/**
 * Register Google fonts for Gridus.
 *
 * @return string Google fonts URL for the theme.
 */
function gridus_fonts_url() {
	$font_url = '';

	/*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'gridus' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Montserrat:400,700|Dosis:300,400,500,700|Raleway:300,400,400oblique,500,700&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}