<?php
/**
 * Plugin Name: Ultimate Member - Template pages for CPT
 * Plugin URI:  https://github.com/umdevelopera/um-cpt
 * Description: Adds special pages used to customize the single post view for Groups and Jobs.
 * Author:      Ultimate Member support team
 * Author URI:  https://github.com/umdevelopera/
 * Text Domain: um-cpt
 * Domain Path: /languages
 *
 * Requires Plugins: ultimate-member
 * Requires at least: 6.5
 * Requires PHP: 7.4
 * UM version: 2.9.1
 * Version: 1.0.0
 *
 * @package um_ext\um_cpt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once ABSPATH . 'wp-admin/includes/plugin.php';

$plugin_data = get_plugin_data( __FILE__, true, false );

define( 'um_cpt_url', plugin_dir_url( __FILE__ ) );
define( 'um_cpt_path', plugin_dir_path( __FILE__ ) );
define( 'um_cpt_plugin', plugin_basename( __FILE__ ) );
define( 'um_cpt_extension', $plugin_data['Name'] );
define( 'um_cpt_version', $plugin_data['Version'] );
define( 'um_cpt_textdomain', 'um-cpt' );


// Check dependencies.
if ( ! function_exists( 'um_cpt_check_dependencies' ) ) {
	function um_cpt_check_dependencies() {
		if ( ! defined( 'um_path' ) || ! function_exists( 'UM' ) || ! UM()->dependencies()->ultimatemember_active_check() ) {
			// Ultimate Member is not active.
			add_action(
				'admin_notices',
				function () {
					// translators: %s - plugin name.
					echo '<div class="error"><p>' . wp_kses_post( sprintf( __( 'The <strong>%s</strong> extension requires the Ultimate Member plugin to be activated to work properly. You can download it <a href="https://wordpress.org/plugins/ultimate-member">here</a>', 'um-cpt' ), um_cpt_extension ) ) . '</p></div>';
				}
			);
		} else {
			require_once 'includes/core/class-um-cpt.php';
			UM()->set_class( 'CPT', true );
		}
	}
}
add_action( 'plugins_loaded', 'um_cpt_check_dependencies', 2 );
