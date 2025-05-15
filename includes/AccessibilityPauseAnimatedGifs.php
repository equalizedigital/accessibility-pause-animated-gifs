<?php
/**
 * Main plugin class.
 *
 * @package EqualizeDigital\AccessibilityPauseAnimatedGif
 */

namespace EqualizeDigital\AccessibilityPauseAnimatedGifs;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main plugin class.
 */
class AccessibilityPauseAnimatedGifs {


	/**
	 * Plugin instance.
	 *
	 * @var AccessibilityPauseAnimatedGifs
	 */
	private static $instance = null;

	/**
	 * Get plugin instance.
	 *
	 * @return AccessibilityPauseAnimatedGifs
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

		// Initialize admin settings.
		if ( is_admin() ) {
			$settings = new Admin\Settings();
			$settings->init();
		}
	}

	/**
	 * Enqueue scripts.
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		wp_enqueue_script(
			'accessibility-pause-animated-gifs',
			EDAPAD_PLUGIN_URL . 'build/js/frontend.bundle.js',
			[],
			EDAPAD_VERSION,
			true
		);

		$options         = get_option( 'edapag_options', [] );
		$default_options = [
			'buttonBackground'      => '#072c7c',
			'buttonBackgroundHover' => '#0a2051',
			'buttonBorder'          => '2px solid #fff',
			'buttonBorderRadius'    => '0%',
			'buttonIconColor'       => '#ffffff',
			'buttonFocusColor'      => '#00e7ff',
			'buttonIconSize'        => '1.5rem',
			'buttonIconFontSize'    => '1rem',
			'buttonPlayIconID'      => '',
			'buttonPauseIconID'     => '',
			'buttonPlayIconHTML'    => '',
			'buttonPauseIconHTML'   => '',
			'container'             => 'body',
			'exclusions'            => '',
			'gifa11yOff'            => '',
			'inheritClasses'        => true,
			'initiallyPaused'       => false,
			'langPause'             => __( 'Pause animation:', 'accessibility-pause-animated-gifs' ),
			'langPlay'              => __( 'Play animation:', 'accessibility-pause-animated-gifs' ),
			'langPauseAllButton'    => __( 'Pause all animations', 'accessibility-pause-animated-gifs' ),
			'langPlayAllButton'     => __( 'Play all animations', 'accessibility-pause-animated-gifs' ),
			'langAltWarning'        => __( 'Error! Please add alt text to gif.', 'accessibility-pause-animated-gifs' ),
			'missingAltWarning'     => false,
			'sharedPauseButton'     => false,
			'showButtons'           => true,
			'showGifText'           => false,
			'target'                => '',
			'useDevicePixelRatio'   => true,
		];

		wp_localize_script(
			'accessibility-pause-animated-gifs',
			'edapag',
			[
				'options' => wp_parse_args( $options, $default_options ),
			]
		);
	}

	/**
	 * Enqueue styles.
	 *
	 * @return void
	 */
	public function enqueue_styles() {
		wp_enqueue_style(
			'accessibility-pause-animated-gifs',
			EDAPAD_PLUGIN_URL . 'build/css/frontend.bundle.css',
			[],
			EDAPAD_VERSION
		);
	}
}
