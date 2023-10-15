<?php
/**
 * Gridus back compatibility functionality
 */

/**
 * Prevent switching to Gridus on old versions of WordPress.
 *
 * Switches to the default theme.
 */
function gridus_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'gridus_upgrade_notice' );
}
add_action( 'after_switch_theme', 'gridus_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Gridus on WordPress versions prior to 4.4.
 */
function gridus_upgrade_notice() {
	$message = sprintf( esc_html__( 'Gridus requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'gridus' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 */
function gridus_customize() {
	wp_die( sprintf( esc_html__( 'Gridus requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'gridus' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'gridus_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 */
function gridus_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Gridus requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'gridus' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'gridus_preview' );
