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
			'css_extension'           => 'css',
			'css_dependencies'        => array(),
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
			$this->css_extension           = $this->arguments['css_extension'];
			$this->css_dependencies        = $this->arguments['css_dependencies'];
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
			$args = array(
				'folder' => $this->admin_assets_folder,
			);

			$scripts = $this->setup_scripts( $args );
			$styles  = $this->setup_styles( $args );

			add_action(
				'admin_enqueue_scripts',
				function() use ( $scripts ) {
					$this->add_scripts( $scripts );
				}
			);

			add_action(
				'admin_enqueue_scripts',
				function() use ( $styles ) {
					$this->add_styles( $styles );
				}
			);
		}

		/**
		 * Sets up arguments for 'wp_enqueue_style`
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return array
		 */
		public function setup_styles( $arguments = array() ) {
			$folder        = $arguments['folder'];
			$css_file_name = "{$this->text_domain}-{$folder}.{$this->css_extension}";

			return array(
				'css_file_handle'  => "{$this->text_domain}-{$this->css_file_handle}",
				'css_src'          => PLUGIN_DIR_URL . "{$folder}/{$this->css_folder}/{$css_file_name}",
				'css_dependencies' => $this->css_dependencies,
				'css_timestamp'    => $this->version,
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
		 * @param array $arguments The arguments array.
		 * @return void
		 */
		public function add_styles( $arguments = array() ) {
			wp_enqueue_style(
				$arguments['css_file_handle'],
				$arguments['css_src'],
				$arguments['css_dependencies'],
				$arguments['css_timestamp']
			);
		}
	}
} // End if().
