<?php
/**
 * The plugin setup class
 *
 * @package MoPlugin
 * @since 1.0.0
 */

if ( ! class_exists( 'MoPluginSetup' ) ) {
	/**
	 * The main plugin class.
	 *
	 * @since 1.0.0
	 */
	class MoPluginSetup extends MoPluginBase {

		/**
		 * Theme arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array();

		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments An array of arguments.
		 * @return void
		 */
		public function __construct( $arguments ) {
			$this->arguments = $this->array_merge( $this->arguments, $arguments );

			add_action( 'after_setup_plugin', array( $this, 'setup_variables' ) );
			add_action( 'after_setup_plugin', array( $this, 'setup_functionalities' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'add_styles' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts' ) );
		}

		/**
		 * Sets up plugin variables.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function setup_variables() {
			$plugin = wp_get_plugin();

			$this->name        = $plugin->get( 'Name' );
			$this->version     = $plugin->get( 'Version' );
			$this->text_domain = $plugin->get( 'TextDomain' );

			$this->assets_folder = $this->arguments['assets_folder'];
			$this->plugin_path    = get_template_directory() . '/';
			$this->include_path  = $this->plugin_path . $this->arguments['include_folder'];

			$this->functionality_set = $this->arguments['functionality_set'];
			$this->customization_set = $this->arguments['customization_set'];

			$this->javascript_file_name     = $this->arguments['javascript_folder'] . $this->text_domain . $this->arguments['javascript_extension'];
			$this->javascript_file_location = get_plugin_file_uri( '/' . $this->assets_folder );
			$this->javascript_file_handle   = $this->text_domain . $this->arguments['javascript_file_handle'];
			$this->javascript_src           = $this->javascript_file_location . $this->javascript_file_name;
			$this->javascript_deps          = array();
			$this->javascript_in_footer     = true;
			$this->javascript_timestamp     = $this->version;

			$this->css_file_handle = $this->text_domain . $this->arguments['css_file_handle'];
			$this->css_src         = get_stylesheet_uri();
			$this->css_deps        = array();
			$this->css_timestamp   = $this->version;
		}

		/**
		 * Sets up plugin functionalities.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function setup_functionalities() {
			$functionalities = new MoPluginFunctionalities(
				array(
					'set' => $this->functionality_set,
				)
			);
		}


		/**
		 * Includes plugin scripts.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function add_scripts() {
			wp_enqueue_script(
				$this->javascript_file_handle,
				$this->javascript_src,
				$this->javascript_deps,
				$this->javascript_timestamp,
				$this->javascript_in_footer
			);
		}

		/**
		 * Includes plugin styles.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function add_styles() {
			wp_enqueue_style(
				$this->css_file_handle,
				$this->css_src,
				$this->css_deps,
				$this->css_timestamp
			);
		}
	}
} // End if().
