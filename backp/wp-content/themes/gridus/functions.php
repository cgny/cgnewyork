<?php
/**
 * Gridus functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 */

/**
 * Gridus only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1170;
}

/**
 * Theme activation
 */
function gridus_theme_activate() {
	set_theme_mod('rate-theme-notice', strtotime("+7 days"));
	update_option( 'lp_toggle_wpautop_auto', 1 );
}
add_action('after_switch_theme', 'gridus_theme_activate');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function gridus_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'gridus', get_template_directory() . '/languages' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 0, true );

	add_theme_support( 'custom-header', array(
		'default-image' => get_template_directory_uri() . '/assets/custom/images/userpic01.jpg',
		'width'         => 420,
		'height'        => 360,
		'flex-width'    => true,
		'flex-height'   => true,
	) );
	add_theme_support( 'custom-background', array(
		'default-image' => get_template_directory_uri() . '/assets/custom/images/backgrounds/dark_fabric.png',
	) );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'gridus' ),
	) );

	add_post_type_support( 'post', 'page-attributes' );
	add_post_type_support( 'portfolio', 'page-attributes' );
}

add_action( 'after_setup_theme', 'gridus_setup' );

/**
 * This theme use custom single page menu atts for posts
 */
function gridus_page_menu_atts( $atts, $item, $args, $depth ) {
	$atts['class'] = 'hvr-sweep-to-bottom';

	$color = get_post_meta( $item->ID, 'menu-color', true );
	$style = empty($color) ? '' : ' style="background-color: ' . esc_attr($color) . '"';
	$args->before = '<div' . $style . '>';
	$args->after = '</div>';

	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'gridus_page_menu_atts', 10, 4 );

/**
 * Add menu item color
 */
function gridus_special_nav_class( $classes, $item, $args, $depth ) {
	global $gridus_menu_color_count;

	$gridus_menu_color_count = isset($gridus_menu_color_count) ? ++$gridus_menu_color_count : 1;
	$classes = array( 'nopadding menuitem ui-menu-color0' . $gridus_menu_color_count );
	if ($depth == 0) $classes[] = 'col-xs-4 col-sm-2';

	return $classes;
}

add_filter( 'nav_menu_css_class', 'gridus_special_nav_class', 10, 4 );

/**
 * Add custom body class to the head
 */
function gridus_body_class( $classes ) {
	$layout_width = get_theme_mod( 'layout_width', 'boxed' );
	$classes[] = esc_attr($layout_width);

	return $classes;
}

add_filter( 'body_class', 'gridus_body_class' );

/**
 * Registers a widget area.
 */
function gridus_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Content Footer', 'gridus' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Appears at the footer.', 'gridus' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="font-accident-two-normal uppercase">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'gridus' ),
		'id'            => 'sidebar-left',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="font-accident-two-normal uppercase">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'gridus' ),
		'id'            => 'sidebar-right',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="font-accident-two-normal uppercase">',
		'after_title'   => '</h4>',
	) );
}

add_action( 'widgets_init', 'gridus_widgets_init' );

/**
 * Ajax blog loader
 */
function gridus_blog_posts_callback() {
	$nonce = $_REQUEST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajaxConfig-nonce' ) ) {
		wp_die();
	}

	if ( function_exists( 'gridus_blog_grid_items' ) ) {
		$result = gridus_blog_grid_items( $_REQUEST['data'] );
		echo json_encode($result);
	}

	wp_die();
}

add_action( 'wp_ajax_blog_posts', 'gridus_blog_posts_callback' );
add_action( 'wp_ajax_nopriv_blog_posts', 'gridus_blog_posts_callback' );

/**
 * Filter for Easy Google Fonts
 * @param $options
 *
 * @return mixed
 */
if ( class_exists( 'EGF_Register_Options' ) ) {
	function gridus_custom_option_force_styles($options) {
		foreach ( $options as &$option ) {
			$option['properties']['force_styles'] = 1;
		}
		return $options;
	}

	add_filter( 'tt_font_get_option_parameters', 'gridus_custom_option_force_styles', 10 );
}

/**
 * Required plugins.
 */
require get_template_directory() . '/inc/required-plugins.php';

/**
 * Gridus Advanced Custom Fields.
 */
require_once get_template_directory() . '/inc/acf.php';

/**
 * Enqueues scripts and styles.
 */
require get_template_directory() . '/inc/assets.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Gridus template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';
