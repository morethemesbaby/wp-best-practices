<?php
/**
 * The Admin Menu
 *
 * @package Mo\Plugin\Features
 * @since 1.1.0
 */

if ( ! class_exists( 'Mo_Plugin_Features_AdminMenu' ) ) {
	/**
	 * The Admin Menu class.
	 *
	 * Displays and manages the admin menu for this theme.
	 *
	 * @since 1.0.0
	 */
	class Mo_Plugin_Features_AdminMenu extends Mo_Base {

		/**
		 * Class arguments.
		 *
		 * @since 1.1.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array(
			'page_title'              => 'Mo Theme Settings',
			'menu_title'              => 'Mo Theme Settings',
			'id'                      => 'mo-plugin-admin-menu',
			'settings_id'             => 'mo-plugin-settings',
			'settings_features'       => 'mo-plugin-settings-features',
			'settings_features_title' => 'Theme Features',
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
		 * Displays the `Test` field for the 'Features` settings
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function settings_features_test_field_callback() {
			$setting_name = $this->settings_features . '-test';
			$setting = get_option( $setting_name );
			?>
			<input type="text" name="<?php echo $setting_name; ?>" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
			<?php
		}

		/**
		 * Displays the `Features` settings header
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function settings_features_callback() {
			echo 'Section description';
		}

		/**
		 * Sets up custom options and settings
		 *
		 * @since 1.1.0
		 *
		 * @link https://developer.wordpress.org/plugins/settings/custom-settings-page/
		 *
		 * @return void
		 */
		public function init_settings() {
			register_setting( $this->id, $this->settings_id );

			add_settings_section(
				$this->settings_features,
				$this->settings_features_title,
				array( $this, 'settings_features_callback' ),
				$this->id
			);

			add_settings_field(
				$this->settings_features . '-test',
				'Test field',
				array( $this, 'settings_features_test_field_callback' ),
				$this->id,
				$this->settings_features
			);
		}

		/**
		 * Displays the settings for the admin menu
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function display_settings() {
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}

			// Check if the user have submitted the settings.
			// WordPress will add the "settings-updated" $_GET parameter to the url.
			if ( isset( $_GET['settings-updated'] ) ) {
				// Add settings saved message with the class of "updated".
				add_settings_error(
					'mo-plugin-settings_messages',
					'mo-plugin-settings_message',
					__( 'Settings Saved', 'mo-plugin' ),
					'updated'
				);
			}

			// Show error/update messages.
			settings_errors( 'mo-plugin-settings_messages' );

			// Display the form.
			echo '<div class="wrap"><h1 class="wp-heading-inline">';
			echo esc_html( get_admin_page_title() ) . '</h1>';
			echo '<form action="options.php" method="post">';

			// Display security fields.
			settings_fields( $this->id );

			// Display the settings fields.
			do_settings_sections( $this->id );

			// Display the submit button.
			submit_button( 'Save Settings' );

			echo '</form></div>';
		}

		/**
		 * Adds the admin menu.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function add_admin_menu() {
			add_menu_page(
				$this->page_title,
				$this->menu_title,
				'manage_options',
				$this->id,
				array( $this, 'display_settings' ),
				'',
				100
			);
		}

		/**
		 * Activates the Admin menu
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function activate() {
			add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
			add_action( 'admin_init', array( $this, 'init_settings' ) );
		}

		/**
		 * Deactivates the Admin menu
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function deactivate() {
			remove_menu_page( $this->id );
		}

		/**
		 * Set up arguments
		 */
		public function setup_arguments() {
			$this->page_title              = __( $this->arguments['page_title'], 'mo-plugin' );
			$this->menu_title              = __( $this->arguments['menu_title'], 'mo-plugin' );
			$this->id                      = $this->arguments['id'];
			$this->settings_id             = $this->arguments['settings_id'];
			$this->settings_features       = $this->arguments['settings_features'];
			$this->settings_features_title = __( $this->arguments['settings_features_title'], 'mo-plugin' );
		}
	}
} // End if().
