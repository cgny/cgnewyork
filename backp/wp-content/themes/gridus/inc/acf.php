<?php
/**
 * Gridus Advanced Custom Fields.
 */
define( 'ACF_LITE', true );

if ( function_exists( "register_field_group" ) ) {

	register_field_group( array(
		'id'         => 'acf_info',
		'title'      => 'Info',
		'fields'     => array(
			array(
				'key'            => 'field_56df1dd7f50f0',
				'label'          => esc_html__( 'Start', 'gridus' ),
				'name'           => 'start',
				'type'           => 'date_picker',
				'date_format'    => 'yymmdd',
				'display_format' => 'M yy',
				'first_day'      => 1,
			),
			array(
				'key'            => 'field_56df1e52f50f1',
				'label'          => esc_html__( 'End', 'gridus' ),
				'name'           => 'end',
				'type'           => 'date_picker',
				'date_format'    => 'yymmdd',
				'display_format' => 'M yy',
				'first_day'      => 1,
			),
			array(
				'key'           => 'field_56df1ebbf50f2',
				'label'         => esc_html__( 'Position', 'gridus' ),
				'name'          => 'position',
				'type'          => 'text',
				'default_value' => '',
				'placeholder'   => '',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => '',
			),
		),
		'location'   => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'timeline',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options'    => array(
			'position'       => 'normal',
			'layout'         => 'default',
			'hide_on_screen' => array(),
		),
		'menu_order' => 0,
	) );

	register_field_group(array (
		'id' => 'acf_page-settings',
		'title' => 'Page settings',
		'fields' => array (
			array (
				'key'           => 'field_57a2e6dedf70e',
				'label'         => esc_html__( 'Disable page wrapper', 'gridus' ),
				'name'          => 'disable_page_wrapper',
				'type'          => 'true_false',
				'message'       => '',
				'default_value' => 0,
			),
			array (
				'key'           => 'field_57a2e6dedf71e',
				'label'         => esc_html__( 'Disable page title', 'gridus' ),
				'name'          => 'disable_page_title',
				'type'          => 'true_false',
				'message'       => '',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
