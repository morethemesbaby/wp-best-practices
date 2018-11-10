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
			'settings_option_group' => 'general',
			'settings_section'      => '',
			'button_text'           => 'Save Settings',
			'confirmation_message'  => 'Settings saved',
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
			/**
			 * The option group from https://developer.wordpress.org/reference/functions/register_setting/
			 */
			$this->settings_group_id = $this->arguments['settings_option_group'];

			/**
			 * The section id 
			 */
			$this->settings_section = $this->arguments['settings_section'];

			/**
			 * The form error messages unique id for https://developer.wordpress.org/reference/functions/add_settings_error/
			 */
			$this->settings_errors = $this->settings_group_id . '-error-messages';

			$this->button_text = __( $this->arguments[ 'button_text' ], 'mo-plugin' );

			$this->confirmation_message = __( $this->arguments[ 'confirmation_message' ], 'mo-plugin' );
		}

		/**
		 * Displays an input field.
		 *
		 * @since 1.1.0
		 *
		 * @param array $args Defined at the `add_settings_field()` function.
		 * @return void;
		 */
		public function display_input_field( $args ) {
			if ( empty( $args ) ) {
				return;
			}

			if ( ! isset( $args['key'] ) ) {
				return;
			}

			$setting_name  = $this->settings_section . '-' . $args['key'];
			$setting_value = ( null !== get_option( $setting_name ) ) ? get_option( $setting_name ) : '';

			printf(
				'<input type="text" name="%1$s" value="%2$s">',
				esc_attr( $setting_name ),
				esc_attr( $setting_value )
			);
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
			settings_fields( $this->settings_group_id );
			do_settings_sections( $this->settings_group_id );
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
	}
} // End if().
