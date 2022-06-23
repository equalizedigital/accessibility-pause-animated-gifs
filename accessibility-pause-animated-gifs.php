<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Accessibility Pause Animated GIFs
 * Plugin URI:        https://equalizedigital.com
 * Description:       Add play pause functionality to animated GIFs.
 * Version:           1.0.0
 * Author:            Equalize Digital
 * Author URI:        https://equalizedigital.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       apag
 * Domain Path:       /languages
 */

 // Constants
define( 'APAG_VERSION', '1.0.0' );
define( 'APAG_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'APAG_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if ( ! class_exists( 'APAG' ) ) {
	class APAG {
		
		/**
		 * Constructor
		 */
		public function __construct() {
			$this->setup_actions();
		}
		
		/**
		 * Setting up Hooks
		 */
		public function setup_actions() {
			add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts'));
			add_action( 'wp_enqueue_scripts', array($this, 'enqueue_styles'));
		}

		/**
		 * Enqueue Admin Styles
		 */
		function enqueue_styles() {
			wp_enqueue_style( 'APAG', APAG_PLUGIN_URL.'assets/css/accessibility-pause-animated-gifs.css', array(), APAG_VERSION, 'all' );
		}

		/**
		 * Enqueue Admin Scripts
		 */
		function enqueue_scripts() {
			wp_enqueue_script( 'APAG', APAG_PLUGIN_URL. 'assets/js/accessibility-pause-animated-gifs-min.js', array( 'jquery' ), APAG_VERSION, false );
		}
		
	}
	
	// instantiate the plugin class
	$APAG = new APAG();
}