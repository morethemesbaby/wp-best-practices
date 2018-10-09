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
		public $arguments = array(
			'has_admin_interface'    => false,
			'has_public_interface'   => false,
			'admin_assets_folder'    => 'admin',
			'public_assets_folder'   => 'public',
			'js_folder'              => 'js',
			'css_folder'             => 'css',
			'images_folder'          => 'images',
			'javascript_file_handle' => 'script',
			'css_file_handle'        => 'style',
			'javascript_extension'   => 'js',
			'plugin_dir_url'         => plugin_dir_url( __FILE__ )
		);

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

			add_action( 'plugins_loaded', array( $this, 'setup_variables' ) );
			add_action( 'plugins_loaded', array( $this, 'setup_functionalities' ) );
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
			$plugin = wp_get_data();

			$this->name        = $plugin->get( 'Name' );
			$this->version     = $plugin->get( 'Version' );
			$this->text_domain = $plugin->get( 'TextDomain' );

			$this->has_admin_interface  = $this->arguments['has_admin_interface'];
			$this->has_public_interface = $this->arguments['has_public_interface'];
			$this->admin_assets_folder  = $this->arguments['admin_assets_folder'];
			$this->public_assets_folder = $this->arguments['public_assets_folder'];
			$this->js_folder            = $this->arguments['js_folder'];
			$this->css_folder           = $this->arguments['css_folder'];
			$this->images_folder        = $this->arguments['images_folder'];
		}

		/**
		 * Sets up plugin functionalities.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function setup_functionalities() {
			if ( true === $this->has_admin_interface ) {
				$this->setup_admin_functionalities();
			}

			if ( true === $this->has_public_interface ) {
				$this->setup_public_functionalities();
			}
		}

		/**
		 * Sets up admin functionalities.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function setup_admin_functionalities() {
			$this->setup_scripts(array(
				'folder' => $this->admin_assets_folder,
			));
		}

		/**
		 * Sets up arguments for 'wp_enqueue_style`
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return void
		 */
		public function setup_scripts( $arguments = array() ) {
			$folder = $arguments['folder'];

			$javascript_file_name    = "{$this->text_domain}-{$this->folder}.{$this->javascript_extension}";
			$javascript_file_handle  = "{$this->text_domain}-{$this->javascript_file_handle}";
			$javascript_src          = "{$this->plugin_dir_url}/{$this->javascript_file_name}";
			$javascript_dependencies = $this->javascript_dependencies;
			$javascript_in_footer    = $this->javascript_in_footer;
			$javascript_timestamp    = $this->version;
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
