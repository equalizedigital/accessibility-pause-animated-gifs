<?php
/**
 * Plugin Name: Accessibility Pause Animated Gif
 * Description: An Equalize Digital plugin.
 * Version: 0.0.1
 * Author: Equalize Digital
 * Author URI: https://equalizedigital.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: accessibility-pause-animated-gif
 * Domain Path: /languages
 * Requires at least: 6.7
 * Requires PHP: 7.4
 *
 * @package EqualizeDigital\AccessibilityPauseAnimatedGifs
 */

namespace EqualizeDigital\AccessibilityPauseAnimatedGif;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'EDAPAD_VERSION' ) ) {
	define( 'EDAPAD_VERSION', '0.0.1' );
}

if ( ! defined( 'EDAPAD_PLUGIN_DIR' ) ) {
	define( 'EDAPAD_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'EDAPAD_PLUGIN_URL' ) ) {
	define( 'EDAPAD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'EDAPAD_PLUGIN_FILE' ) ) {
	define( 'EDAPAD_PLUGIN_FILE', __FILE__ );
}

if ( file_exists( EDAPAD_PLUGIN_DIR . 'vendor/autoload.php' ) ) {
	require_once EDAPAD_PLUGIN_DIR . 'vendor/autoload.php';
} else {
	add_action(
		'admin_notices',
		function () {
			?>
		<div class="notice notice-error is-dismissible">
			<p><?php esc_html_e( 'Please run composer install in the plugin directory.', 'accessibility-pause-animated-gifs' ); ?></p>
		</div>
			<?php
		}
	);
	return;
}

( AccessibilityPauseAnimatedGif::get_instance() )->boot();
