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

		/**
		 * Theme arguments.
		 *
		 * @var $arguments An Array of arguments.
		 */
		public $arguments = array(
			'include_folder'         => 'includes/',
			'assets_folder'          => 'assets/',
			'javascript_folder'      => 'js/',
			'functionality_set'      => 'wporg',
			'customization_set'      => 'wporg',
			'javascript_extension'   => '.js',
			'javascript_file_handle' => '-script',
			'css_file_name'          => 'style.css',
			'css_file_handle'        => '-style',
		);


		/**
		 * Theme variables
		 *
		 * They are dynamically set and get (overloaded).
		 *
		 * @link http://codular.com/introducing-php-classes
		 * @var $data An array of variables.
		 */
		private $data = array();


		/**
		 * Dynamically sets a variable.
		 *
		 * @param string $variable The variable name.
		 * @param mixed  $value    The variable value.
		 * @return void
		 */
		public function __set( $variable, $value ) {
			$this->data[ $variable ] = $value;
		}


		/**
		 * Dynamically gets a variable.
		 *
		 * @param string $variable The variable name.
		 * @return mixed           The variable value.
		 */
		public function __get( $variable ) {
			if ( isset( $this->data[ $variable ] ) ) {
				return $this->data[ $variable ];
			} else {
				die( 'Unknown variable: ' . esc_attr( $variable ) );
			}
		}


		/**
		 * Sets up the class
		 *
		 * @param array $arguments An array of arguments.
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

			/*
			$customizations = new MoThemeCustomizations(
				array(
					'set' => $this->customization_set,
				)
			);
			*/
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
			wp_enqueue_script(
				$this->javascript_file_handle,
				$this->javascript_src,
				$this->javascript_deps,
				$this->javascript_timestamp,
				$this->javascript_in_footer
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
			wp_enqueue_style(
				$this->css_file_handle,
				$this->css_src,
				$this->css_deps,
				$this->css_timestamp
			);
		}
	}
}
