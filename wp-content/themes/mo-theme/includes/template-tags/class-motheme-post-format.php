<?php
/**
 * The Post Format class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemePostFormat' ) ) {
	/**
	 * The Post class.
	 *
	 * @since 1.0.0
	 */
	class MoThemePostFormat extends MoThemeBase {

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array An array of arguments.
		 */
		public $arguments = array(
			'local_link_class'    => 'local-link',
			'external_link_class' => 'external-link',
		);


		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The class setup arguments array.
		 * @return void
		 */
		public function __construct( $arguments = array() ) {
			$this->arguments = array_merge( $this->arguments, $arguments );
		}

		/**
		 * Returns link classname for the Link Post format.
		 * 
		 * @since 1.0.0
		 * 
		 * @param string $link The link URL
		 * @return string 
		 */
		public function get_link_class( $link ) {
			$mopost = new MoThemePost();
			return $mopost->link_is_external( $link ) ? $this->arguments['local_link_class'] : $this->arguments['external_link_class'];
		}

		/**
		 * Returns link title for the Link Post format.
		 * 
		 * Returns either the post title, or the URL where it points
		 * 
		 * @since 1.0.0
		 * 
		 * @param string $link The link URL
		 * @return string 
		 */
		public function get_link_title( $link ) {
			$has_title = the_title_attribute( 'echo=0' );

			return ( ! empty( $has_title ) ) ? $has_title : $link;
		}
	}
}
