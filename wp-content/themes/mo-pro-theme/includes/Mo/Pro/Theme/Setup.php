<?php
/**
 * The theme setup
 *
 * @package Mo\Pro\Theme
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Pro_Theme_Setup' ) ) {
	/**
	 * The theme setup class.
	 *
	 * Sets up theme variables, assets and functionalities.
	 *
	 * @since 1.0.0
	 */
	class Mo_Pro_Theme_Setup extends Mo_Theme_Base {

		/**
		 * Theme arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array An array of arguments.
		 */
		public $arguments = array(
			'include_folder' => 'includes/',
			'assets'         => array(),
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

			$this->setup_variables();
			$this->setup_assets();
			$this->setup_functionalities();
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

			$this->assets = $this->arguments['assets'];
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
				$this->assets,
				array(
					'version'     => $this->version,
					'text_domain' => $this->text_domain,
				)
			);

			$assets = new Mo_Assets( $arguments );
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
			$functionalities = new Mo_Pro_Theme_Functionalities_Base();
		}
	}
} // End if().
