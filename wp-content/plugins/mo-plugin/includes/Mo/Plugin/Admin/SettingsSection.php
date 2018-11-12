<?php
/**
 * A Section in the Admin Settings API
 *
 * @link https://developer.wordpress.org/plugins/settings/
 *
 * @package Mo\Plugin\Admin
 * @since 1.1.0
 */

if ( ! class_exists( 'Mo_Plugin_Admin_SettingsSection' ) ) {
	/**
	 * The Section in the Admin Settings API class.
	 *
	 * Displays and manages a section of settings in the admin area.
	 *
	 * @since 1.1.0
	 */
	class Mo_Plugin_Admin_SettingsSection extends Mo_Base {

		/**
		 * Class arguments.
		 *
		 * @since 1.1.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array(
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
