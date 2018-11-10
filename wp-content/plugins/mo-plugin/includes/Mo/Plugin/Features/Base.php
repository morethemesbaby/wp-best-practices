<?php
/**
 * The plugin features setup
 *
 * @package Mo\Plugin\Features
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Plugin_Features_Base' ) ) {
	/**
	 * The plugin features setup class.
	 *
	 * Implements the functionalities of the plugin.
	 *
	 * This aims to be the most important class of the plugin.
	 * The idea is to have a central place where all functionalities the plugin implements can be quickly overviewed or managed.
	 *
	 * Looking into this file should reveal what the plugin does.
	 *
	 * @since 1.0.0
	 */
	class Mo_Plugin_Features_Base extends Mo_Base {

		/**
		 * The class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array An array of arguments
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

			if ( $this->features['admin_menu'] ) {
				$this->activate_admin_menu();
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

			if ( $this->features['admin_menu'] ) {
				$this->deactivate_admin_menu();
			}
		}

		/**
		 * Activates the admin menu feature.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function activate_admin_menu() {
			$mo_admin_menu = new Mo_Plugin_Features_AdminMenu(
				array(
					'theme_features' => $this->features,
				)
			);
			$mo_admin_menu->activate();
		}

		/**
		 * Deactivates the admin menu feature.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function deactivate_admin_menu() {
			$mo_admin_menu = new Mo_Plugin_Features_AdminMenu();
			$mo_admin_menu->deactivate();
		}

		/**
		 * Activates the custom post type feature.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function activate_custom_post_type() {
			$mo_cpt = new Mo_Plugin_Features_CustomPostType();
			$mo_cpt->register();

			flush_rewrite_rules();
		}

		/**
		 * Deactivates the custom post type feature.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function deactivate_custom_post_type() {
			$mo_cpt = new Mo_Plugin_Features_CustomPostType();
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
			$mo_sh = new Mo_Plugin_Features_CustomShortcode();

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
