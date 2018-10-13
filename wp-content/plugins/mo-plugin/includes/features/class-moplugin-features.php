<?php
/**
 * The plugin features setup class
 *
 * @package MoPlugin
 * @since 1.0.0
 */

if ( ! class_exists( 'MoPluginFeatures' ) ) {
	/**
	 * The plugin features class.
	 *
	 * @since 1.0.0
	 */
	class MoPluginFeatures extends MoPluginBase {

		/**
		 * The class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An array of arguments
		 */
		public $arguments = array(
			'features' => array(),
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
			$this->features  = $this->arguments['features'];
		}

		/**
		 * Activates all features.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function activate() {
			if ( ! isset( $this->features ) ) {
				return;
			}

			if ( array() === $this->features ) {
				return;
			}

			if ( $this->features['custom-post-type'] ) {
				$this->activate_custom_post_type();
			}

			if ( $this->features['shortcode'] ) {
				$this->activate_shortcode();
			}
		}

		/**
		 * Deactivates all features.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function deactivate() {
			if ( ! isset( $this->features ) ) {
				return;
			}

			if ( empty( $this->features ) ) {
				return;
			}

			if ( $this->features['custom-post-type'] ) {
				$this->deactivate_custom_post_type();
			}

			if ( $this->features['shortcode'] ) {
				$this->deactivate_shortcode();
			}
		}

		/**
		 * Activates the custom post type feature.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function activate_custom_post_type() {
			$mo_cpt = new MoPluginCustomPostType();
			$mo_cpt->register();

			flush_rewrite_rules();
		}

		/**
		 * Dectivates the custom post type feature.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function deactivate_custom_post_type() {
			$mo_cpt = new MoPluginCustomPostType();
			$mo_cpt->deregister();

			flush_rewrite_rules();
		}

		/**
		 * Activates the shortcode feature.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function activate_shortcode() {
			$mo_sh = new MoPluginCustomShortcode();

			add_shortcode( 'books', array( $mo_sh, 'books' ) );
		}

		/**
		 * Deactivates the shortcode feature.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function deactivate_shortcode() {
			remove_shortcode( 'books' );
		}
	}
} // End if().
