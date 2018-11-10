<?php
/**
 * The Admin Settings API
 *
 * @link https://developer.wordpress.org/plugins/settings/
 *
 * @package Mo\Plugin\Admin
 * @since 1.1.0
 */

if ( ! class_exists( 'Mo_Plugin_Admin_Settings' ) ) {
	/**
	 * The Admin Settings API class.
	 *
	 * Displays and manages settings in the admin area.
	 *
	 * @since 1.0.0
	 */
	class Mo_Plugin_Admin_Settings extends Mo_Base {

		/**
		 * Class arguments.
		 *
		 * @since 1.1.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array(
			'options_id'               => 'general',
			'options_section_features' => '',
			'button_text'              => 'Save Settings',
			'confirmation_message'     => 'Settings saved',
		);

		/**
		 * Arguments to create a field name.
		 *
		 * @since 1.1.0
		 *
		 * @var array
		 */
		public $field_name_arguments = array(
			'key'       => '',
			'separator' => '_',
		);

		/**
		 * Arguments of an input field.
		 *
		 * @since 1.1.0
		 *
		 * @var array
		 */
		public $input_field_arguments = array(
			'options' => '',
			'key'     => '',
		);

		/**
		 * Sets up the class.
		 *
		 * @since 1.1.0
		 *
		 * @param array $arguments The class setup arguments array.
		 * @return void
		 */
		public function __construct( $arguments = array() ) {
			$this->arguments = $this->array_merge( $this->arguments, $arguments );
			$this->setup_arguments();
		}

		/**
		 * Sets up arguments.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function setup_arguments() {
			$this->options_id               = $this->arguments['options_id'];
			$this->options_section_features = $this->arguments['options_section_features'];
			$this->settings_errors          = $this->options_id . '-error-messages';

			$this->button_text          = __( $this->arguments[ 'button_text' ], 'mo-plugin' );
			$this->confirmation_message = __( $this->arguments[ 'confirmation_message' ], 'mo-plugin' );
		}

		/**
		 * Displays a settings field.
		 *
		 * @since 1.1.0
		 *
		 * @param array $args Defined at the `add_settings_field()` function.
		 * @return void;
		 */
		public function display_field( $args ) {
			if ( empty( $args ) ) {
				return;
			}

			if ( ! isset( $args['name'] ) ) {
				return;
			}

			$arguments = array(
				'options' => $this->options_id,
				'key'     => $args['name'],
			);

			$name  = $this->get_input_field_name( $arguments );
			$value = $this->get_field_value( $arguments );

			$arguments = array(
				'name'  => $name,
				'value' => $value,
				'args'  => $args,
			);

			switch ( $args['type'] ) {
				case 'checkbox': 
					$this->display_checkbox_field( $arguments );
					break;
				default:
					$this->display_input_field( $arguments );
			}
		}

		/**
		 * Displays settings.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function display() {
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}

			$this->display_form_messages();

			printf(
				'<div class="wrap">%1$s%2$s</div>',
				wp_kses_post( $this->get_page_title() ),
				$this->get_form()
			);
		}

		/**
		 * Returns the settings form.
		 *
		 * @since 1.1.0
		 * @return string
		 */
		public function get_form() {
			ob_start();

			/**
			 * This is standard practice.
			 * `options.php` will redirect back to this current settings page.
			 */
			echo '<form action="options.php" method="post">';

			/**
			 * Displays security fields, the sections and it's fields, and a submit button
			 */
			settings_fields( $this->options_id );
			do_settings_sections( $this->options_id );
			submit_button( $this->button_text );

			echo '</form>';

			return ob_get_clean();
		}

		/**
		 * Returns the page title.
		 *
		 * @since 1.1.0
		 * @return string
		 */
		public function get_page_title() {
			return sprintf(
				'<h1 class="wp-heading-inline">%1s</h1>',
				esc_html( get_admin_page_title() )
			);
		}

		/**
		 * Displays messages when a form is updated.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function display_form_messages() {
			/**
			 * Check if the user have submitted the settings.
			 * WordPress will add the "settings-updated" $_GET parameter to the url.
			 */
			if ( isset( $_GET['settings-updated'] ) ) {
				add_settings_error(
					$this->settings_errors,
					esc_attr( 'settings_saved' ),
					$this->confirmation_message,
					'updated'
				);
			}

			/**
			 * Show error / update messages.
			 */
			settings_errors( $this->settings_errors );
		}

		/**
		 * Displays a checkbox field.
		 *
		 * @since 1.1.0
		 *
		 * @param array $arguments An array of arguments.
		 * @return void;
		 */
		public function display_checkbox_field( $arguments = array() ) {
			if ( ! isset( $arguments['name'] ) ) {
				return;
			}

			$checked = '';

			if ( isset( $arguments['value'] ) && ( $arguments['value'] ) ) {
				$checked = 'checked';
			}

			printf(
				'<input type="checkbox" name="%1$s" %2$s>',
				esc_attr( $arguments['name'] ),
				$checked
			);
		}

		/**
		 * Displays an input field.
		 *
		 * @since 1.1.0
		 *
		 * @param array $arguments An array of arguments.
		 * @return void;
		 */
		public function display_input_field( $arguments = array() ) {
			if ( ! isset( $arguments['name'] ) ) {
				return;
			}

			printf(
				'<input type="text" name="%1$s" value="%2$s">',
				esc_attr( $arguments['name'] ),
				esc_attr( $arguments['value'] )
			);
		}

		/**
		 * Returns a field value from the options database.
		 *
		 * @since 1.1.0
		 *
		 * @param array $arguments An array of arguments.
		 * @return string
		 */
		public function get_field_value( $arguments = array() ) {
			$this->input_field_arguments = $this->array_merge( $this->input_field_arguments, $arguments );

			$value = '';

			$options = get_option( $this->input_field_arguments['options'] );
			$key     = $this->input_field_arguments['key'];

			if ( ( ! empty( $options ) ) && ( array_key_exists( $key, $options ) ) ) {
				$value = $options[ $key ];
			}

			return $value;
		}

		/**
		 * Generates an input name for a field.
		 *
		 * The name must be part of a set of options.
		 * Example: options[field].
		 *
		 * Example: 'mo_theme_settings[custom-post-type]'
		 *
		 * @since 1.1.0
		 *
		 * @param array $arguments An array of arguments.
		 * @return string
		 */
		public function get_input_field_name( $arguments = array() ) {
			$this->input_field_arguments = $this->array_merge( $this->input_field_arguments, $arguments );

			$ret = "{$this->input_field_arguments['options']}[{$this->input_field_arguments['key']}]";

			return $ret;
		}

		/**
		 * Generates a field name.
		 *
		 * Example: 'mo_theme_settings_custom-post-type'
		 *
		 * @since 1.1.0
		 *
		 * @param array $arguments An array of arguments.
		 * @return string
		 */
		public function get_field_name( $arguments = array() ) {
			$this->field_name_arguments = $this->array_merge( $this->field_name_arguments, $arguments );

			$ret = $this->implode(
				$this->field_name_arguments['separator'],
				array(
					$this->options_section_features,
					$this->field_name_arguments['key'],
				)
			);

			return $ret;
		}
	}
} // End if().
