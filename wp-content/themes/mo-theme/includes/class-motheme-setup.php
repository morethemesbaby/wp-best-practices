<?php
/**
 * The theme setup class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeSetup' ) ) {
	/**
	 * The main theme class.
	 *
	 * @since 1.0.0
	 */
	class MoThemeSetup extends MoThemeBase {

		/**
		 * Theme arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array(
			'include_folder'         => 'includes/',
			'assets_folder'          => 'assets/',
			'javascript_folder'      => 'js/',
			'functionality_set'      => '',
			'javascript_extension'   => '.js',
			'javascript_file_handle' => '-script',
			'css_file_name'          => 'style.css',
			'css_file_handle'        => '-style',
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

			add_action( 'after_setup_theme', array( $this, 'setup_variables' ) );
			add_action( 'after_setup_theme', array( $this, 'setup_assets' ) );
			add_action( 'after_setup_theme', array( $this, 'setup_functionalities' ) );
		}

		/**
		 * Sets up theme variables.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function setup_variables() {
			$theme = wp_get_theme();

			$this->name        = $theme->get( 'Name' );
			$this->version     = $theme->get( 'Version' );
			$this->text_domain = $theme->get( 'TextDomain' );

			$this->assets_folder = $this->arguments['assets_folder'];

			$this->functionality_set = $this->arguments['functionality_set'];
		}

		/**
		 * Sets up theme assets.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function setup_assets() {
			$arguments = $this->array_merge(
				$this->arguments,
				array(
					'folder'       => $this->assets_folder,
					'admin_folder' => '',
					'action'       => 'wp_enqueue_scripts',
					'version'      => $this->version,
					'text_domain'  => $this->text_domain,
				)
			);

			$assets = new MoAssets( $arguments );
			$assets->add();
		}

		/**
		 * Sets up theme functionalities.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function setup_functionalities() {
			$functionalities = new MoThemeFunctionalities(
				array(
					'set' => $this->functionality_set,
				)
			);
		}
	}
} // End if().
