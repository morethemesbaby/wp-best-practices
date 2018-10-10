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
			'has_admin_interface'     => false,
			'has_public_interface'    => false,
			'admin_assets_folder'     => 'admin',
			'public_assets_folder'    => 'public',
			'javascript_folder'       => 'js',
			'css_folder'              => 'css',
			'images_folder'           => 'images',
			'javascript_file_handle'  => 'script',
			'css_file_handle'         => 'style',
			'javascript_extension'    => 'js',
			'javascript_dependencies' => array(),
			'javascript_in_footer'    => true,
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
			// From https://wordpress.stackexchange.com/questions/17948/call-to-undefined-function-get-plugin-data
			if ( ! function_exists( 'get_plugin_data' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}
			$plugin = get_plugin_data( PLUGIN_FILE_PATH );

			$this->name        = $plugin['Name'];
			$this->version     = $plugin['Version'];
			$this->text_domain = $plugin['TextDomain'];

			$this->has_admin_interface     = $this->arguments['has_admin_interface'];
			$this->has_public_interface    = $this->arguments['has_public_interface'];
			$this->admin_assets_folder     = $this->arguments['admin_assets_folder'];
			$this->public_assets_folder    = $this->arguments['public_assets_folder'];
			$this->javascript_folder       = $this->arguments['javascript_folder'];
			$this->css_folder              = $this->arguments['css_folder'];
			$this->images_folder           = $this->arguments['images_folder'];
			$this->javascript_file_handle  = $this->arguments['javascript_file_handle'];
			$this->css_file_handle         = $this->arguments['css_file_handle'];
			$this->javascript_extension    = $this->arguments['javascript_extension'];
			$this->javascript_dependencies = $this->arguments['javascript_dependencies'];
			$this->javascript_in_footer    = $this->arguments['javascript_in_footer'];
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
			$scripts = $this->setup_scripts(
				array(
					'folder' => $this->admin_assets_folder,
				)
			);

			add_action(
				'admin_enqueue_scripts',
				function() use ( $scripts ) {
					$this->add_scripts( $scripts );
				}
			);
		}

		/**
		 * Sets up arguments for 'wp_enqueue_script`
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return array
		 */
		public function setup_scripts( $arguments = array() ) {
			$folder               = $arguments['folder'];
			$javascript_file_name = "{$this->text_domain}-{$folder}.{$this->javascript_extension}";

			return array(
				'javascript_file_handle'  => "{$this->text_domain}-{$this->javascript_file_handle}",
				'javascript_src'          => PLUGIN_DIR_URL . "{$folder}/{$this->javascript_folder}/{$javascript_file_name}",
				'javascript_dependencies' => $this->javascript_dependencies,
				'javascript_in_footer'    => $this->javascript_in_footer,
				'javascript_timestamp'    => $this->version,
			);
		}


		/**
		 * Includes plugin scripts.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return void
		 */
		public function add_scripts( $arguments = array() ) {
			wp_enqueue_script(
				$arguments['javascript_file_handle'],
				$arguments['javascript_src'],
				$arguments['javascript_deps'],
				$arguments['javascript_timestamp'],
				$arguments['javascript_in_footer']
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
