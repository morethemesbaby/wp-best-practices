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
		 * Arguments for a theme functionality.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		public $functionality_arguments = array(
			'folder' => '',
			'action' => '',
		);

		/**
		 * Arguments to set up enqueue for a script or style.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		public $enqueue_arguments = array(
			'folder'       => '',
			'extension'    => '',
			'file_handle'  => '',
			'subfolder'    => '',
			'dependencies' => array(),
			'in_footer'    => false,
		);

		/**
		 * Arguments to enqueue a script.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		public $enqueue_script_arguments = array(
			'file_handle'  => '',
			'src'          => '',
			'dependencies' => array(),
			'timestamp'    => '',
			'in_footer'    => false,
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
				$this->setup_functionality(
					array(
						'folder' => $this->admin_assets_folder,
						'action' => 'admin_enqueue_scripts',
					)
				);
			}

			if ( true === $this->has_public_interface ) {
				$this->setup_functionality(
					array(
						'folder' => $this->public_assets_folder,
						'action' => 'wp_enqueue_scripts',
					)
				);
			}
		}

		/**
		 * Sets up a specific functionality.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return void
		 */
		public function setup_functionality( $arguments ) {
			$arguments = $this->array_merge( $this->functionality_arguments, $arguments );

			$script = $this->setup_enqueue(
				array(
					'folder'       => $arguments['folder'],
					'extension'    => $this->javascript_extension,
					'file_handle'  => $this->javascript_file_handle,
					'subfolder'    => $this->javascript_folder,
					'dependencies' => $this->javascript_dependencies,
					'in_footer'    => $this->in_footer( $arguments ),
				)
			);

			$style = $this->setup_enqueue(
				array(
					'folder'       => $arguments['folder'],
					'extension'    => $this->css_extension,
					'file_handle'  => $this->css_file_handle,
					'subfolder'    => $this->css_folder,
					'dependencies' => $this->css_dependencies,
				)
			);

			add_action(
				$arguments['action'],
				function() use ( $script ) {
					$this->add_script( $script );
				}
			);

			add_action(
				$arguments['action'],
				function() use ( $style ) {
					$this->add_style( $style );
				}
			);
		}

		/**
		 * Sets up arguments for enqueue scripts or styles.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return array
		 */
		public function setup_enqueue( $arguments ) {
			$arguments = $this->array_merge( $this->enqueue_arguments, $arguments );

			$folder    = $arguments['folder'];
			$file_name = "{$this->text_domain}-{$folder}.{$arguments['extension']}";

			return array(
				'file_handle'  => "{$this->text_domain}-{$arguments['file_handle']}",
				'src'          => PLUGIN_DIR_URL . "{$folder}/{$arguments['subfolder']}/{$file_name}",
				'dependencies' => $arguments['dependencies'],
				'timestamp'    => $this->version,
				'in_footer'    => $arguments['in_footer'],
			);
		}


		/**
		 * Includes a script.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return void
		 */
		public function add_script( $arguments = array() ) {
			$arguments = $this->array_merge( $this->enqueue_script_arguments, $arguments );

			if ( '' !== $arguments['src'] ) {
				wp_enqueue_script(
					$arguments['file_handle'],
					$arguments['src'],
					$arguments['dependencies'],
					$arguments['timestamp'],
					$arguments['in_footer']
				);
			}
		}

		/**
		 * Includes a style.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return void
		 */
		public function add_style( $arguments = array() ) {
			$arguments = $this->array_merge( $this->enqueue_script_arguments, $arguments );

			if ( '' !== $arguments['src'] ) {
				wp_enqueue_style(
					$arguments['file_handle'],
					$arguments['src'],
					$arguments['dependencies'],
					$arguments['timestamp']
				);
			}
		}

		/**
		 * Decides if a script can be / must be loaded in the footer.
		 *
		 * On the admin scripts cannot be loaded in the footer.
		 * On public they can be loaded anywhere.
		 * 
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return boolean
		 */
		public function in_footer( $arguments = array() ) {
			$arguments = $this->array_merge(
				array(
					'folder' => '',
				),
				$arguments
			);

			if ( $arguments['folder'] === $this->admin_assets_folder ) {
				return false;
			} else {
				return $this->javascript_in_footer;
			}
		}
	}
} // End if().
