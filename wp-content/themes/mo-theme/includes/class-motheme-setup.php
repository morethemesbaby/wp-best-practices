<?php
/**
 * The theme setup class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoTheme' ) ) {
	/**
	 * The main theme class
	 *
	 * @package MoTheme
	 * @since 1.0.0
	 */
	class MoTheme {

		// Theme arguments
		public $arguments = array(
			'include_folder'    => 'includes/',
			'assets_folder'     => 'assets/',
			'functionality_set' => 'wporg',
			'customization_set' => 'wporg',
		);

		// Theme variables
		public $name              = '';
		public $version           = '';
		public $text_domain       = '';
		public $assets_folder     = '';
		public $theme_path        = '';
		public $include_path      = '';
		public $functionality_set = '';
		public $customization_set = '';

		/**
		 * Sets up the class
		 *
		 * @param $arguments An array of arguments.
		 * @return void
		 *
		 * @package MoTheme
		 * @since 1.0.0
		 */
		public function __construct( $arguments ) {
			$this->arguments = array_merge( $this->arguments, $arguments );

			add_action( 'after_setup_theme', array( $this, 'variables' ) );
			add_action( 'after_setup_theme', array( $this, 'functionalities' ) );
			add_action( 'after_setup_theme', array( $this, 'customizations' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
		}

		/**
		 * Sets up theme variables
		 *
		 * @return void
		 *
		 * @package MoTheme
		 * @since 1.0.0
		 */
		public function variables() {
			$theme = wp_get_theme();

			$this->name          = $theme->get( 'Name' );
			$this->version       = $theme->get( 'Version' );
			$this->text_domain   = $theme->get( 'TextDomain' );
			$this->assets_folder = $this->arguments['assets_folder'];
			$this->theme_path    = get_template_directory() . '/';
			$this->include_path  = $this->theme_path . $this->arguments['include_folder'];

			$this->functionality_set = $this->arguments['functionality_set'];
			$this->customization_set = $this->arguments['customization_set'];
		}

		/**
		 * Sets up theme functionalities
		 *
		 * @return void
		 *
		 * @package MoTheme
		 * @since 1.0.0
		 */
		public function functionalities() {
			require $this->include_path . 'functionalities/class-motheme-functionalities.php';

			$functionalities = new MoThemeFunctionalities(
				array(
					'set' => $this->functionality_set,
				)
			);
		}

		/**
		 * Sets up theme customizations
		 *
		 * @return void
		 *
		 * @package MoTheme
		 * @since 1.0.0
		 */
		public function customizations() {
			require $this->include_path . 'customizations/class-motheme-customizations.php';

			$customizations = new MoThemeCustomizations(
				array(
					'set' => $this->customization_set,
				)
			);
		}

		/**
		 * Includes theme scripts
		 *
		 * @return void
		 *
		 * @package MoTheme
		 * @since 1.0.0
		 */
		public function scripts() {
			$file_name     = 'js/' . $this->text_domain . '.js';
			$file_location = get_theme_file_uri( '/' . $this->assets_folder );
			$timestamp     = filemtime( $this->theme_path . $this->assets_folder . $file_name );

			wp_enqueue_script(
				$this->text_domain . '-script',
				$file_location . $file_name,
				array(),
				$this->version . '-' . $timestamp
			);
		}

		/**
		 * Includes theme styles
		 *
		 * @return void
		 *
		 * @package MoTheme
		 * @since 1.0.0
		 */
		public function styles() {
			$timestamp = filemtime( $this->theme_path . '/style.css' );

			wp_enqueue_style(
				$this->text_domain . '-style',
				get_stylesheet_uri(),
				array(),
				$this->version . '-' . $timestamp
			);
		}
	}
}
