<?php
/*
Plugin Name:  WP Assistant
Plugin URI:   https://www.ionos.com
Description:  WordPress Setup Assistant
Version:      5.3.1
License:      GPLv2 or later
Author:       1&1 IONOS
Author URI:   https://www.ionos.com
Text Domain:  1and1-wordpress-wizard
Domain Path:  /languages
*/

/*
Copyright 2018 1&1 IONOS SE
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Online: http://www.gnu.org/licenses/gpl.txt
*/

// Do not allow direct access!
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class One_And_One_Assistant {
	const VERSION = '5.0.0';

	public function __construct() {
		$this->load_global_files();

		One_And_One_Assistant_Handler_Login::init(
			One_And_One_Assistant_Config::feature( 'login_redesign' )
		);

		/** admin actions */
		if ( is_admin() ) {
			$this->load_admin_files();

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

			// Start and configure the Assistant in the admin area
			One_And_One_Assistant_Handler_Dispatch::admin_init();

			// add checks on plugin activation
			register_activation_hook( __FILE__, array( $this, 'activate_plugin' ) );

			// register deactivation hook
			register_deactivation_hook( __FILE__, array( $this, 'deactivation_hook' ) );

		/** front-end actions */
		} else {
			$this->load_frontend_files();

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

			// add some Assistant elements on the front-end
			One_And_One_Assistant_Handler_Dispatch::wp_init();
		}
	}

	public function load_global_files() {
		include_once 'inc/config.php';
		include_once 'inc/view.php';
		include_once 'inc/functions.php';
		include_once 'inc/handlers/login.php';
		include_once 'inc/handlers/dispatch.php';
	}

	public function load_admin_files() {
		include_once 'inc/modify-settings-page.php';
		include_once 'inc/modify-plugins-page.php';
		include_once 'inc/sitetype-filter.php';
		include_once 'inc/cache-manager.php';
		include_once 'inc/dashboard.php';
	}

	public function load_frontend_files() {
		include_once 'inc/cron-update-deactivated-plugins.php';
		include_once 'inc/cron-update-plugin-meta.php';
	}

	public function deactivation_hook() {
		wp_clear_scheduled_hook( 'oneandone_cron_update_deactivated_plugins' );
		wp_clear_scheduled_hook( 'oneandone_cron_update_plugin_meta' );
		delete_option( 'oneandone_assistant_completed' );
		delete_option( 'oneandone_assistant_sitetype' );
	}

	public function load_textdomain() {
		if ( oneandone_is_must_use_plugin_folder() ) {
			$language_loaded = load_muplugin_textdomain( '1and1-wordpress-wizard', basename( dirname( __FILE__ ) ).'/languages' );
		} else {
			$language_loaded = load_plugin_textdomain( '1and1-wordpress-wizard', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}

		// Check whether language could be loaded properly. If not, use en_US as a fallback.
		if ( ! empty( $language_loaded ) || false === $language_loaded ) {
			if ( oneandone_is_must_use_plugin_folder() ) {
				$plugin_dir = WPMU_PLUGIN_DIR;
			} else {
				$plugin_dir = WP_PLUGIN_DIR;
			}

			$domain = '1and1-wordpress-wizard';
			$path   = trailingslashit( $plugin_dir.'/'.ltrim( dirname( plugin_basename( __FILE__ ) ).'/languages/', '/' ) );
			$mofile = $domain.'-en_US.mo';

			load_textdomain( $domain, $path . $mofile );
		}
	}

	public function enqueue_scripts() {

		// Add the cookie script to control feature switches through JS
		wp_enqueue_script( '1and1-wp-cookies', One_And_One_Assistant::get_js_url( 'cookies.js' ) );
	}

	public static function get_site_type_label( $site_type ) {
		switch ( $site_type ) {
			case 'gallery':
				$site_type = _x( 'Gallery', 'website-types', '1and1-wordpress-wizard' );
				break;
			case 'blog':
				$site_type = _x( 'Blog', 'website-types', '1and1-wordpress-wizard' );
				break;
			case 'personal':
				$site_type = _x( 'Personal Website', 'website-types', '1and1-wordpress-wizard' );
				break;
			case 'business':
				$site_type = _x( 'Business Website', 'website-types', '1and1-wordpress-wizard' );
				break;
		}

		return $site_type;
	}

	public function activate_plugin() {
		// Check WordPress version
		if ( version_compare( get_bloginfo( 'version' ), '3.5', '<' ) ) {
			die( __( 'The Assistant could not be activated. To activate the plugin, you need WordPress 3.5 or higher.', '1and1-wordpress-wizard' ) );
		}
	}

	/**
	 * Return the contract's market value provided by the installation
	 *
	 * @return string
	 */
	public static function get_market() {

		$default_market = 'US';
		$supported_markets = array( 'DE', 'CA', 'GB', 'US', 'ES', 'MX', 'FR', 'IT' );
		
		$market = ( string ) strtoupper( get_option( 'assistant_market', $default_market ) );

		// fix wrong market code for GB
		if ( ! $market || ! in_array( $market, $supported_markets ) ) {
			$market = $default_market;
		}

		return $market;
	}

	public static function get_css_url( $file = '' ) {
		return plugins_url( 'css/'.$file, __FILE__ );
	}

	public static function get_js_url( $file = '' ) {
		return plugins_url( 'js/'.$file, __FILE__ );
	}

	public static function get_images_url( $image = '' ) {
		return plugins_url( 'images/'.$image, __FILE__ );
	}


	public static function get_plugin_file_path() {
		return __FILE__;
	}

	public static function get_plugin_dir_path() {
		return apply_filters( '1and1-plugin-dir-path', plugin_dir_path( __FILE__ ) );
	}

	public static function get_inc_dir_path() {
		return plugin_dir_path( __FILE__ ).'inc/';
	}

	public static function get_views_dir_path() {
		return One_And_One_Assistant_View::get_default_views_path();
	}

	public static function get_abspath() {
		return apply_filters( '1and1-abspath', ABSPATH );
	}
}

$one_and_one_wizard = new One_And_One_Assistant();
