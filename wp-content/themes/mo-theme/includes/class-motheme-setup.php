<?php
/**
 * The Mo Theme setup class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoTheme' ) ) {
	/**
	 * The main Mo Theme class
	 *
	 * @package MoTheme
	 * @since 1.0.0
	 */
	class MoTheme {

		public $name          = '';
		public $version       = '';
		public $text_domain   = '';
		public $assets_folder = '';
		public $theme_path    = '';

		/**
		 * Sets up the class
		 *
		 * @package MoTheme
		 * @since 1.0.0
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'setup' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
		}

		/**
		 * Sets up theme details
		 *
		 * @package MoTheme
		 * @since 1.0.0
		 * @return void
		 */
		public function setup() {
			$theme = wp_get_theme();

			$this->name          = $theme->get( 'Name' );
			$this->version       = $theme->get( 'Version' );
			$this->text_domain   = $theme->get( 'TextDomain' );
			$this->assets_folder = 'assets/';
			$this->theme_path    = get_template_directory() . '/';
		}

		/**
		 * Includes theme scripts
		 *
		 * @package MoTheme
		 * @since 1.0.0
		 * @return void
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
		 * @package MoTheme
		 * @since 1.0.0
		 * @return void
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
