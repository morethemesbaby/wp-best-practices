<?php
/**
 * The WordPress.org Sidebars functionality.
 *
 * @package Mo\Theme\Functionalities
 * @since 1.0.0
 * @see Mo_Theme_Base
 */

if ( ! class_exists( 'Mo_Theme_Functionalities_Sidebars' ) ) {
	/**
	 * The WordPress.org Sidebars functionality class.
	 *
	 * Displays sidebars (widget areas) in the theme.
	 *
	 * @since 1.0.0
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/
	 */
	class Mo_Theme_Functionalities_Sidebars extends Mo_Theme_Base {
		/**
		 * Defines the sidebars which will be added to the theme.
		 *
		 * @todo Maybe this can be enhanced to become a theme setup argument.
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
		 * @todo The HTML code below should be moved into a template part.
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
		 * @return void
		 */
		public function register_sidebar( $arguments ) {
			$arguments = $this->array_merge( $this->sidebar_arguments, $arguments );

			/**
			 * Some PHPCS errors here:
			 *
			 * @todo Find a general solution for translation interpolation.
			 * @todo Replace the hardwired theme slug in translation functions with `$this->text_domain`.
			 *
			 * This will yield a PHPCS error: `The $text arg must not contain interpolated variables. Found "$arguments".`
			 * You can move this `esc_html_x` declaration without interpolation into a class variable and will yield another error.
			 */

			/*
			$arguments['name'] = esc_html_x(
				"{$arguments['name']}",
				"The name of the {$arguments['name']} widget area",
				'mo-theme'
			);

			$arguments['description'] = esc_html_x(
				"{$arguments['name']} widget area",
				"The description of the {$arguments['name']} widget area",
				'mo-theme'
			);
			*/

			register_sidebar( $arguments );
		}
	}
} // End if().
