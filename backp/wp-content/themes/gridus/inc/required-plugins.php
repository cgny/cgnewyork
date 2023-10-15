<?php

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/plugins/TGM-Plugin-Activation/class-tgm-plugin-activation.php';

/**
 * Register the required plugins for this theme.
 */
function gridus_required_plugins() {

	$plugins = array(
		array(
			'name'     => esc_html__( 'Contact Form 7', 'gridus' ),
			'slug'     => 'contact-form-7',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Toggle wpautop', 'gridus' ),
			'slug'     => 'toggle-wpautop',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Easy Bootstrap Shortcode', 'gridus' ),
			'slug'     => 'easy-bootstrap-shortcodes',
			'required' => true,
		),
		array(
			'name'     => esc_html__( 'Easy Google Fonts', 'gridus' ),
			'slug'     => 'easy-google-fonts',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Simple Page Ordering', 'gridus' ),
			'slug'     => 'simple-page-ordering',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Advanced Custom Fields', 'gridus' ),
			'slug'     => 'advanced-custom-fields',
			'required' => true,
		),
		array(
			'name'     => esc_html__( 'Portfolio Post Type', 'gridus' ),
			'slug'     => 'portfolio-post-type',
			'required' => true,
		),
		array(
			'name'     => esc_html__( 'Menu Icons', 'gridus' ),
			'slug'     => 'menu-icons',
			'required' => true,
		),
		array(
			'name'               => esc_html__( 'Gridus Extensions', 'gridus' ),
			'slug'               => 'gridus-extensions',
			'source'             => get_template_directory() . '/plugins/gridus-extensions.zip',
			'required'           => true,
			'version'            => '0.3.3',
			'force_activation'   => false,
			'force_deactivation' => true,
			'external_url'       => '',
		),
		array(
			'name'               => esc_html__( 'Envato Market', 'gridus' ),
			'slug'               => 'envato-market',
			'source'             => get_template_directory_uri() . '/plugins/envato-market.zip',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
		),
	);

	$config = array(
		'id'           => 'gridus',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );

}

add_action( 'tgmpa_register', 'gridus_required_plugins' );
