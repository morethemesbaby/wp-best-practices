<?php
/**
 * The WordPress sidebars functionality
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalitiesSidebars' ) ) {
	/**
	 * The WordPress sidebars functionality class
	 *
	 * @since 1.0.0
	 */
	class MoThemeFunctionalitiesSidebars {
		/**
		 * Sidebars
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		public $sidebars = array(
			array(
				'name' => 'Sidebar',
				'id'   => 'sidebar-1',
			),
			array(
				'name' => 'Header Menu',
				'id'   => 'sidebar-2',
			),
		);

		/**
		 * Sidebar arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		public $sidebar_arguments = array(
			'name'          => '',
			'id'            => '',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		);

		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			add_action( 'widgets_init', array( $this, 'register_sidebars' ) );
		}

		/**
		 * Register sidebars.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function register_sidebars() {
			foreach ( $this->sidebars as $sidebar ) {
				$this->register_sidebar( $sidebar );
			}
		}

		/**
		 * Register sidebar.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The sidebar arguments.
		 *
		 * @return void
		 */
		public function register_sidebar( $arguments ) {
			$arguments = array_merge( $this->sidebar_arguments, $arguments );

			$arguments['name'] = $this->get_translation_string(
				array(
					'name'  => 'name',
					'value' => $arguments['name'],
				)
			);

			$arguments['description'] = $this->get_translation_string(
				array(
					'name'  => 'description',
					'value' => $arguments['description'],
				)
			);

			register_sidebar( $arguments );
		}

		/**
		 * Returns a translation string.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 *
		 * @return string
		 */
		public function get_translation_string( $arguments ) {
			return esc_html_x(
				"{$arguments['value']}",
				"The {$arguments['value']} of the {$arguments['name']} widget area",
				'mo-theme'
			);
		}
	}
}