<?php
/**
 * The main components class
 *
 * @package Mo\Theme\Components
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_Components' ) ) {
	/**
	 * The main HTML components class.
	 *
	 * Contains utilities to componentize the theme.
	 * And some HTML components re-used across the theme.
	 *
	 * @since 1.0.0
	 */
	class Mo_Theme_Components extends Mo_Theme_Base {

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array(
			'attributes'   => array(),
			'title'        => array(),
			'text_wrapper' => array(),
			'arrows'       => array(),
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
			$this->arguments = $this->array_merge( $this->arguments, $arguments );

			$this->attributes = new Mo_Theme_Components_Attributes( $this->arguments['attributes'] );

			$this->title = new Mo_Theme_Components_Title( $this->arguments['title'] );

			$this->text_wrapper = new Mo_Theme_Components_TextWrapper( $this->arguments['text_wrapper'], $this );

			$this->arrows = new Mo_Theme_Components_Arrows( $this->arguments['arrows'] );
		}
	}
} // End if().
