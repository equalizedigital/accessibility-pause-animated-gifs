<?php
/**
 * Admin Settings class.
 *
 * @package EqualizeDigital\AccessibilityPauseAnimatedGif
 */

namespace EqualizeDigital\AccessibilityPauseAnimatedGifs\Admin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin Settings class.
 */
class Settings {
	/**
	 * Initialize admin hooks.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'admin_menu', [ $this, 'add_menu_page' ] );
		add_action( 'admin_init', [ $this, 'register_settings' ] );
	}

	/**
	 * Register plugin settings.
	 *
	 * @return void
	 */
	public function register_settings() {
		register_setting(
			'edapag_settings',
			'edapag_options',
			[ 'sanitize_callback' => [ $this, 'sanitize_options' ] ]
		);

		// General Settings Section.
		add_settings_section(
			'edapag_general_section',
			__( 'General Settings', 'accessibility-pause-animated-gifs' ),
			[ $this, 'render_section_description' ],
			'edapag_settings'
		);

		$general_fields = [
			'container'         => [
				'type'        => 'text',
				'default'     => 'body',
				'description' => __( 'Add a pause button to gifs within a specific area only. E.g. pass main for main content area.', 'accessibility-pause-animated-gifs' ),
			],
			'exclusions'        => [
				'type'        => 'text',
				'default'     => '',
				'description' => __( 'Ignore specific gifs or regions. Use commas to separate. E.g. .jumbotron', 'accessibility-pause-animated-gifs' ),
			],
			'inheritClasses'    => [
				'type'        => 'checkbox',
				'default'     => true,
				'description' => __( 'If canvas element should inherit the same classes as the gif.', 'accessibility-pause-animated-gifs' ),
			],
			'initiallyPaused'   => [
				'type'        => 'checkbox',
				'default'     => false,
				'description' => __( 'If you want all gifs to be paused at first.', 'accessibility-pause-animated-gifs' ),
			],
			'sharedPauseButton' => [
				'type'        => 'checkbox',
				'default'     => false,
				'description' => __( 'Pausing any gif pauses all gifs.', 'accessibility-pause-animated-gifs' ),
			],
			'showButtons'       => [
				'type'        => 'checkbox',
				'default'     => true,
				'description' => __( 'Show or hide Play/Pause buttons.', 'accessibility-pause-animated-gifs' ),
			],
			'target'            => [
				'type'        => 'text',
				'default'     => '',
				'description' => __( 'Using CSS selectors, target other images like .webp (that don\'t end with .gif), for example target: \'img[src$=".webp"]\'', 'accessibility-pause-animated-gifs' ),
			],
		];

		// Button Styling Section.
		add_settings_section(
			'edapag_button_section',
			__( 'Button Styling', 'accessibility-pause-animated-gifs' ),
			null,
			'edapag_settings'
		);

		$button_fields = [
			'buttonBackground'      => [
				'type'        => 'color',
				'default'     => '#072c7c',
				'description' => __( 'Select a color using the color picker.', 'accessibility-pause-animated-gifs' ),
			],
			'buttonBackgroundHover' => [
				'type'        => 'color',
				'default'     => '#0a2051',
				'description' => __( 'Select a color using the color picker.', 'accessibility-pause-animated-gifs' ),
			],
			'buttonBorder'          => [
				'type'        => 'text',
				'default'     => '2px solid #fff',
				'description' => __( 'Specify the style, width, and color of an element\'s border.', 'accessibility-pause-animated-gifs' ),
			],
			'buttonBorderRadius'    => [
				'type'        => 'text',
				'default'     => '0%',
				'description' => __( 'Switch between round and square buttons.', 'accessibility-pause-animated-gifs' ),
			],
			'buttonIconColor'       => [
				'type'        => 'color',
				'default'     => '#ffffff',
				'description' => __( 'Select a color using the color picker.', 'accessibility-pause-animated-gifs' ),
			],
			'buttonFocusColor'      => [
				'type'        => 'color',
				'default'     => '#00e7ff',
				'description' => __( 'Select a color using the color picker.', 'accessibility-pause-animated-gifs' ),
			],
			'buttonIconSize'        => [
				'type'        => 'text',
				'default'     => '1.5rem',
				'description' => __( 'Adjust height and width of SVG.', 'accessibility-pause-animated-gifs' ),
			],
		];

		// Language Section.
		add_settings_section(
			'edapag_language_section',
			__( 'Language Settings', 'accessibility-pause-animated-gifs' ),
			null,
			'edapag_settings'
		);

		$language_fields = [
			'langPause'          => [
				'type'        => 'text',
				'default'     => __( 'Pause animation:', 'accessibility-pause-animated-gifs' ),
				'description' => __( 'Text for the pause button.', 'accessibility-pause-animated-gifs' ),
			],
			'langPlay'           => [
				'type'        => 'text',
				'default'     => __( 'Play animation:', 'accessibility-pause-animated-gifs' ),
				'description' => __( 'Text for the play button.', 'accessibility-pause-animated-gifs' ),
			],
			'langPauseAllButton' => [
				'type'        => 'text',
				'default'     => __( 'Pause all animations', 'accessibility-pause-animated-gifs' ),
				'description' => __( 'Text for the pause all button.', 'accessibility-pause-animated-gifs' ),
			],
			'langPlayAllButton'  => [
				'type'        => 'text',
				'default'     => __( 'Play all animations', 'accessibility-pause-animated-gifs' ),
				'description' => __( 'Text for the play all button.', 'accessibility-pause-animated-gifs' ),
			],
		];

		$this->register_fields( 'edapag_general_section', $general_fields );
		$this->register_fields( 'edapag_button_section', $button_fields );
		$this->register_fields( 'edapag_language_section', $language_fields );
	}

	/**
	 * Add menu page.
	 *
	 * @return void
	 */
	public function add_menu_page() {
		add_options_page(
			__( 'Accessibility Pause Animated GIFs', 'accessibility-pause-animated-gifs' ),
			__( 'Pause Animated GIFs', 'accessibility-pause-animated-gifs' ),
			'manage_options',
			'edapag-settings',
			[ $this, 'render_settings_page' ]
		);
	}

	/**
	 * Render settings page.
	 *
	 * @return void
	 */
	public function render_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				<?php
				settings_fields( 'edapag_settings' );
				do_settings_sections( 'edapag_settings' );
				submit_button();
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * Render section description.
	 *
	 * @return void
	 */
	public function render_section_description() {
		echo '<p>' . esc_html__( 'Configure the behavior of animated GIF controls.', 'accessibility-pause-animated-gifs' ) . '</p>';
	}

	/**
	 * Register fields for a section.
	 *
	 * @param string $section Section ID.
	 * @param array  $fields Fields to register.
	 * @return void
	 */
	private function register_fields( $section, $fields ) {
		foreach ( $fields as $key => $field ) {
			add_settings_field(
				$key,
				$this->format_field_label( $key ),
				[ $this, 'render_field' ],
				'edapag_settings',
				$section,
				[
					'label_for'   => $key,
					'type'        => $field['type'],
					'default'     => $field['default'],
					'description' => isset( $field['description'] ) ? $field['description'] : '',
				]
			);
		}
	}

	/**
	 * Render a field.
	 *
	 * @param array $args Field arguments.
	 * @return void
	 */
	public function render_field( $args ) {
		$options = get_option( 'edapag_options', [] );
		$value   = isset( $options[ $args['label_for'] ] ) ? $options[ $args['label_for'] ] : $args['default'];

		switch ( $args['type'] ) {
			case 'checkbox':
				echo '<input type="checkbox"
                    id="' . esc_attr( $args['label_for'] ) . '"
                    name="edapag_options[' . esc_attr( $args['label_for'] ) . ']"
                    value="1"
                    ' . checked( $value, true, false ) . '>';
				break;
			case 'color':
				echo '<input type="color"
                    id="' . esc_attr( $args['label_for'] ) . '"
                    name="edapag_options[' . esc_attr( $args['label_for'] ) . ']"
                    value="' . esc_attr( $value ) . '">';
				break;
			case 'textarea':
				echo '<textarea
                    id="' . esc_attr( $args['label_for'] ) . '"
                    name="edapag_options[' . esc_attr( $args['label_for'] ) . ']"
                    rows="3"
                    cols="50">' . esc_textarea( $value ) . '</textarea>';
				break;
			default:
				echo '<input type="text"
                    id="' . esc_attr( $args['label_for'] ) . '"
                    name="edapag_options[' . esc_attr( $args['label_for'] ) . ']"
                    value="' . esc_attr( $value ) . '">';
		}

		if ( isset( $args['description'] ) ) {
			echo '<p class="description">' . esc_html( $args['description'] ) . '</p>';
		}
	}

	/**
	 * Get field label translations.
	 *
	 * @return array
	 */
	private function get_field_label_map() {
		return [
			// General fields.
			'container'             => __( 'Container', 'accessibility-pause-animated-gifs' ),
			'exclusions'            => __( 'Exclusions', 'accessibility-pause-animated-gifs' ),
			'gifa11yOff'            => __( 'Gifa11y Off', 'accessibility-pause-animated-gifs' ),
			'inheritClasses'        => __( 'Inherit Classes', 'accessibility-pause-animated-gifs' ),
			'initiallyPaused'       => __( 'Initially Paused', 'accessibility-pause-animated-gifs' ),
			'sharedPauseButton'     => __( 'Shared Pause Button', 'accessibility-pause-animated-gifs' ),
			'showButtons'           => __( 'Show Buttons', 'accessibility-pause-animated-gifs' ),
			'target'                => __( 'Target', 'accessibility-pause-animated-gifs' ),

			// Button fields.
			'buttonBackground'      => __( 'Button Background', 'accessibility-pause-animated-gifs' ),
			'buttonBackgroundHover' => __( 'Button Background Hover', 'accessibility-pause-animated-gifs' ),
			'buttonBorder'          => __( 'Button Border', 'accessibility-pause-animated-gifs' ),
			'buttonBorderRadius'    => __( 'Button Border Radius', 'accessibility-pause-animated-gifs' ),
			'buttonIconColor'       => __( 'Button Icon Color', 'accessibility-pause-animated-gifs' ),
			'buttonFocusColor'      => __( 'Button Focus Color', 'accessibility-pause-animated-gifs' ),
			'buttonIconSize'        => __( 'Button Icon Size', 'accessibility-pause-animated-gifs' ),

			// Language fields.
			'langPause'             => __( 'Language Pause', 'accessibility-pause-animated-gifs' ),
			'langPlay'              => __( 'Language Play', 'accessibility-pause-animated-gifs' ),
			'langPauseAllButton'    => __( 'Language Pause All Button', 'accessibility-pause-animated-gifs' ),
			'langPlayAllButton'     => __( 'Language Play All Button', 'accessibility-pause-animated-gifs' ),
		];
	}

	/**
	 * Format field label.
	 *
	 * @param string $key Field key.
	 * @return string
	 */
	private function format_field_label( $key ) {
		$labels = $this->get_field_label_map();
		return isset( $labels[ $key ] ) ? $labels[ $key ] : $key;
	}

	/**
	 * Sanitize options.
	 *
	 * @param array $options Options to sanitize.
	 * @return array
	 */
	public function sanitize_options( $options ) {
		$sanitized_options = [];
		$fields            = array_merge(
			$this->get_general_fields(),
			$this->get_button_fields(),
			$this->get_language_fields()
		);

		// First set all checkboxes to false.
		foreach ( $fields as $key => $field ) {
			if ( 'checkbox' === $field['type'] ) {
				$sanitized_options[ $key ] = false;
			} else {
				$sanitized_options[ $key ] = $field['default'];
			}
		}

		// Then update with submitted values.
		if ( is_array( $options ) ) {
			foreach ( $options as $key => $value ) {
				if ( ! isset( $fields[ $key ] ) ) {
					continue;
				}

				switch ( $fields[ $key ]['type'] ) {
					case 'checkbox':
						$sanitized_options[ $key ] = (bool) $value;
						break;
					case 'textarea':
						$sanitized_options[ $key ] = sanitize_textarea_field( $value );
						break;
					default:
						$sanitized_options[ $key ] = sanitize_text_field( $value );
				}
			}
		}

		return $sanitized_options;
	}

	/**
	 * Get general fields.
	 *
	 * @return array
	 */
	private function get_general_fields() {
		return [
			'container'         => [
				'type'    => 'text',
				'default' => 'body',
			],
			'exclusions'        => [
				'type'    => 'text',
				'default' => '',
			],
			'gifa11yOff'        => [
				'type'    => 'text',
				'default' => '.gifa11y-off',
			],
			'inheritClasses'    => [
				'type'    => 'checkbox',
				'default' => true,
			],
			'initiallyPaused'   => [
				'type'    => 'checkbox',
				'default' => false,
			],
			'sharedPauseButton' => [
				'type'    => 'checkbox',
				'default' => false,
			],
			'showButtons'       => [
				'type'    => 'checkbox',
				'default' => true,
			],
			'target'            => [
				'type'    => 'text',
				'default' => '',
			],
		];
	}

	/**
	 * Get button fields.
	 *
	 * @return array
	 */
	private function get_button_fields() {
		return [
			'buttonBackground'      => [
				'type'    => 'color',
				'default' => '#072c7c',
			],
			'buttonBackgroundHover' => [
				'type'    => 'color',
				'default' => '#0a2051',
			],
			'buttonBorder'          => [
				'type'    => 'text',
				'default' => '2px solid #fff',
			],
			'buttonBorderRadius'    => [
				'type'    => 'text',
				'default' => '0%',
			],
			'buttonIconColor'       => [
				'type'    => 'color',
				'default' => '#ffffff',
			],
			'buttonFocusColor'      => [
				'type'    => 'color',
				'default' => '#00e7ff',
			],
			'buttonIconSize'        => [
				'type'    => 'text',
				'default' => '1.5rem',
			],
		];
	}

	/**
	 * Get language fields.
	 *
	 * @return array
	 */
	private function get_language_fields() {
		return [
			'langPause'          => [
				'type'    => 'text',
				'default' => __( 'Pause animation:', 'accessibility-pause-animated-gifs' ),
			],
			'langPlay'           => [
				'type'    => 'text',
				'default' => __( 'Play animation:', 'accessibility-pause-animated-gifs' ),
			],
			'langPauseAllButton' => [
				'type'    => 'text',
				'default' => __( 'Pause all animations', 'accessibility-pause-animated-gifs' ),
			],
			'langPlayAllButton'  => [
				'type'    => 'text',
				'default' => __( 'Play all animations', 'accessibility-pause-animated-gifs' ),
			],
		];
	}
}
