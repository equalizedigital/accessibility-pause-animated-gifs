<?php
/**
 * Main plugin class.
 *
 * @package EqualizeDigital\AccessibilityPauseAnimatedGif
 */

namespace EqualizeDigital\AccessibilityPauseAnimatedGif;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main plugin class.
 */
class AccessibilityPauseAnimatedGif {


	/**
	 * Plugin instance.
	 *
	 * @var AccessibilityPauseAnimatedGif
	 */
	private static $instance = null;

	/**
	 * Get plugin instance.
	 *
	 * @return AccessibilityPauseAnimatedGif
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Boot the plugin.
	 *
	 * @return void
	 */
	public function boot() {
		// stub.
	}
}
