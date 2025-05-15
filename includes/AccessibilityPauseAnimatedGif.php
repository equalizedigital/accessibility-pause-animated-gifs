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
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		wp_enqueue_script(
			'accessibility-pause-animated-gif',
			EDAPAD_PLUGIN_URL . 'build/js/frontend.bundle.js',
			[],
			EDAPAD_VERSION,
			true
		);
	}

	/**
	 * Enqueue styles.
	 *
	 * @return void
	 */
	public function enqueue_styles() {
		wp_enqueue_style(
			'accessibility-pause-animated-gif',
			EDAPAD_PLUGIN_URL . 'build/css/frontend.bundle.css',
			[],
			EDAPAD_VERSION
		);
	}
}
