<?php
/**
 * The theme setup.
 *
 * @package MoTheme
 * @since 1.0.0
 * @see MoThemeBase Based on the MoThemeBase class.
 */

if ( ! class_exists( 'MoThemeSetup' ) ) {
	/**
	 * The theme setup class.
	 *
	 * Sets up theme variables, assets and functionalities.
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
			'include_folder'    => 'includes/',
			'functionality_set' => '',
			'assets'            => array(),
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

			$this->assets            = $this->arguments['assets'];
			$this->functionality_set = $this->arguments['functionality_set'];
		}

		/**
		 * Sets up theme assets.
		 *
		 * Uses the @see MoAssets class.
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

			$assets = new MoAssets( $arguments );
			$assets->add();
		}

		/**
		 * Sets up theme functionalities.
		 *
		 * Uses the @see MoThemeFunctionalities class.
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
