<?php
/**
 * The main HTML components class
 *
 * Contains utilities to componentize the theme.
 * And some HTML components re-used accross the theme.
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeHTMLComponent' ) ) {
	/**
	 * The main class.
	 *
	 * @since 1.0.0
	 */
	class MoThemeHTMLComponent extends MoThemeBase {

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

			$this->attributes = new MoThemeHTMLComponentAttributes( $this->arguments['attributes'] );

			$this->title = new MoThemeHTMLComponentTitle( $this->arguments['title'] );

			$this->text_wrapper = new MoThemeHTMLComponentTextWrapper( $this->arguments['text_wrapper'], $this );

			$this->arrows = new MoThemeHTMLComponentArrows( $this->arguments['arrows'] );
		}
	}
} // End if().
