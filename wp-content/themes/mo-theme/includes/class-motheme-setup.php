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
			'functionality_set'      => FUNCTIONALITY_SET_WPORG,
			'customization_set'      => CUSTOMIZATION_SET_WPORG,
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
			$this->arguments = array_merge( $this->arguments, $arguments );

			add_action( 'after_setup_theme', array( $this, 'setup_variables' ) );
			add_action( 'after_setup_theme', array( $this, 'setup_functionalities' ) );
			add_action( 'after_setup_theme', array( $this, 'setup_customizations' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'add_styles' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts' ) );
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
			$this->theme_path    = get_template_directory() . '/';
			$this->include_path  = $this->theme_path . $this->arguments['include_folder'];

			$this->functionality_set = $this->arguments['functionality_set'];
			$this->customization_set = $this->arguments['customization_set'];

			$this->javascript_file_name     = $this->arguments['javascript_folder'] . $this->text_domain . $this->arguments['javascript_extension'];
			$this->javascript_file_location = get_theme_file_uri( '/' . $this->assets_folder );
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

		/**
		 * Sets up theme customizations.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function setup_customizations() {
			//
		}

		/**
		 * Includes theme scripts.
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
		 * Includes theme styles.
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
}
