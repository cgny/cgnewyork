<?php

/**
 * Gridus Customizer functionality
 */
class Gridus_Customize {

	/**
	 * Add new sections and controls to the Theme Customize screen.
	 *
	 * @param WP_Customize_Manager $wp_customize The Customizer object.
	 */
	public static function register( $wp_customize ) {

		/**
		 * Gridus Header
		 */
		$wp_customize->add_section( 'gridus_layout', array(
			'title'    => esc_html__( 'Gridus Layout', 'gridus' ),
			'priority' => 150,
		) );

		// Layout width
		$wp_customize->add_setting( 'layout_width', array(
			'default'           => 'boxed',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post'
		) );

		$wp_customize->add_control( 'control_layout_width', array(
			'type'     => 'select',
			'section'  => 'gridus_layout',
			'settings' => 'layout_width',
			'label'    => esc_html__( 'Layout width', 'gridus' ),
			'choices'  => array(
				'boxed' => esc_html__( 'Boxed', 'gridus' ),
				'wide'  => esc_html__( 'Wide', 'gridus' ),
			),
		) );

		// Color Scheme
		$wp_customize->add_setting( 'color_scheme', array(
			'default'           => 'default',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post'
		) );

		$wp_customize->add_control( 'control_color_scheme', array(
			'type'     => 'select',
			'section'  => 'colors',
			'settings' => 'color_scheme',
			'label'    => esc_html__( 'Color Scheme', 'gridus' ),
			'choices'  => array(
				'default'   => esc_html__( 'Default', 'gridus' ),
				'blue'      => esc_html__( 'Blue', 'gridus' ),
				'green'     => esc_html__( 'Green', 'gridus' ),
				'greyscale' => esc_html__( 'Greyscale', 'gridus' ),
				'light'     => esc_html__( 'Light', 'gridus' ),
				'morning'   => esc_html__( 'Morning', 'gridus' ),
				'pastel'    => esc_html__( 'Pastel', 'gridus' ),
				'red'       => esc_html__( 'Red', 'gridus' ),
			),
		) );

		/**
		 * Gridus Header
		 */
		$wp_customize->add_section( 'gridus_header', array(
			'title'    => esc_html__( 'Gridus Header', 'gridus' ),
			'priority' => 151,
		) );

		// Name
		$wp_customize->add_setting( 'name', array(
			'default'           => esc_html__( 'Samuel Anderson', 'gridus' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		) );

		$wp_customize->add_control( 'control_name', array(
			'type'     => 'text',
			'section'  => 'gridus_header',
			'settings' => 'name',
			'label'    => esc_html__( 'Name', 'gridus' ),
		) );

		// Fixed part of Intro
		$wp_customize->add_setting( 'intro_fixed_part', array(
			'default'           => esc_html__( 'The experienced ', 'gridus' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		) );

		$wp_customize->add_control( 'control_intro_fixed_part', array(
			'type'     => 'text',
			'section'  => 'gridus_header',
			'settings' => 'intro_fixed_part',
			'label'    => esc_html__( 'Fixed part of Intro', 'gridus' ),
		) );

		// Dynamic parts of Intro
		$wp_customize->add_setting( 'intro_dynamic_parts', array(
			'default'           => wp_kses( __( '<b class="is-visible">UI/UX Designer</b><b>Web Designer</b><b>Photographer</b>', 'gridus' ), 'post' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post'
		) );

		$wp_customize->add_control( 'control_intro_dynamic_parts', array(
			'label'    => esc_html__( 'Dynamic parts of Intro', 'gridus' ),
			'type'     => 'textarea',
			'section'  => 'gridus_header',
			'settings' => 'intro_dynamic_parts',
		) );

		// CV File pdf
		$wp_customize->add_setting( 'cv_file', array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'control_cv_file', array(
			'label'    => esc_html__( 'CV File', 'gridus' ),
			'section'  => 'gridus_header',
			'settings' => 'cv_file',
		) ) );

		// Social logo
		$wp_customize->add_setting( 'social_logo', array(
			'default'           => 'behance7',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post'
		) );

		$wp_customize->add_control( 'control_social_logo', array(
			'type'     => 'select',
			'section'  => 'gridus_header',
			'settings' => 'social_logo',
			'label'    => esc_html__( 'Social logo', 'gridus' ),
			'choices'  => array(
				'behance7'      => esc_html__( 'Behance', 'gridus' ),
				'facebook45'    => esc_html__( 'Facebook', 'gridus' ),
				'github-logo-silhouette-in-a-square'     => esc_html__( 'GitHub', 'gridus' ),
				'google111'     => esc_html__( 'Google', 'gridus' ),
				'instagram14'   => esc_html__( 'Instagram', 'gridus' ),
				'linkedin22'    => esc_html__( 'Linkedin', 'gridus' ),
				'odnolassniki2' => esc_html__( 'Odnolassniki', 'gridus' ),
				'pinterest28'   => esc_html__( 'Pinterest', 'gridus' ),
				'soundcloud8'   => esc_html__( 'Soundcloud', 'gridus' ),
				'stack-overflow'=> esc_html__( 'Stack Overflow', 'gridus' ),
				'twitter39'     => esc_html__( 'Twitter', 'gridus' ),
				'vimeo22'       => esc_html__( 'Vimeo', 'gridus' ),
				'vk6'           => esc_html__( 'VK', 'gridus' ),
				'youtube33'     => esc_html__( 'Youtube', 'gridus' ),
			),
		) );

		// Social link
		$wp_customize->add_setting( 'social_link', array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'control_social_link', array(
			'type'     => 'text',
			'section'  => 'gridus_header',
			'settings' => 'social_link',
			'label'    => esc_html__( 'Social link', 'gridus' ),
		) );

		/**
		 * Gridus Footer
		 */
		$wp_customize->add_section( 'gridus_footer', array(
			'title'    => esc_html__( 'Gridus Footer', 'gridus' ),
			'priority' => 152,
		) );

		// Copyright
		$wp_customize->add_setting( 'copyright', array(
			'default'           => esc_html__( '2016 Samuel Anderson.', 'gridus' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post'
		) );

		$wp_customize->add_control( 'control_copyright', array(
			'label'    => esc_html__( 'Copyright', 'gridus' ),
			'type'     => 'text',
			'section'  => 'gridus_footer',
			'settings' => 'copyright',
		) );

		$wp_customize->get_section( 'static_front_page' )->priority = 20;

	}
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register', array( 'Gridus_Customize', 'register' ) );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gridus_customize_preview_js() {
	wp_enqueue_script( 'gridus_customizer', get_template_directory_uri() . '/assets/custom/js/customizer.js', array( 'customize-preview' ), '20151218', true );
}
add_action( 'customize_preview_init', 'gridus_customize_preview_js' );