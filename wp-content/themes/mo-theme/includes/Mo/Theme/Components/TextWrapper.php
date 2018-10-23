<?php
/**
 * The Text Wrapper HTML component
 *
 * @package Mo\Theme\Components
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_Components_TextWrapper' ) ) {
	/**
	 * The Text Wrapper HTML component class.
	 *
	 * When styling text sometimes the font size, the line height etc. is changed.
	 * This breaks the vertical flow of the page.
	 *
	 * For example if we have `padding: 1em` and we increase `font-size: 200%`
	 * that padding will be increased too.
	 *
	 * As a solution we wrap all text into a wrapper class and style the wrapper class text instead.
	 *
	 * This breaks the vertical flow:
	 * ```
	 * <h3 style="font-size:200%;padding:1em">Text</h3>
	 * ```
	 *
	 * This won't break the flow:
	 * ```
	 * <h3 style="padding:1em"><span class="text" style="font-size:200%">Text</span></h3>
	 * ```
	 *
	 * This class creates such a text wrapper.
	 *
	 * @since 1.0.0
	 */
	class Mo_Theme_Components_TextWrapper extends Mo_Theme_Base {

		/**
		 * We need to use the parent object inside this class.
		 * In fact this class returns the parent object's `attributes` method with a predefined argument set.
		 *
		 * @uses Mo_Theme_Components::attributes
		 *
		 * @since 1.0.0
		 *
		 * @link https://stackoverflow.com/questions/9707460/get-parent-object-from-within-an-object
		 * @var object
		 */
		private $parent;

		/**
		 * Class arguments.
		 *
		 * To return something like `class="text"`.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array(
			'value' => 'text',
		);

		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @param array  $arguments The class setup arguments array.
		 * @param object $parent   The parent object.
		 * @return void
		 */
		public function __construct( $arguments = array(), Mo_Theme_Components $parent ) {
			$this->arguments            = $this->array_merge( $this->arguments, $arguments );
			$this->parent               = $parent;
			$this->arguments_for_parent = array(
				'block'   => $this->arguments['value'],
				'element' => '',
			);
		}

		/**
		 * Displays the text wrapper class.
		 *
		 * Usage: `<div <?php $component->text_wrapper->display(); ?>>`.
		 *
		 * @since 1.0.0
		 *
		 * @see Mo_Theme_Components::attributes
		 *
		 * @return void
		 */
		public function display() {
			$this->parent->attributes->display( $this->arguments_for_parent );
		}

		/**
		 * Returns the text wrapper class.
		 *
		 * Usage: `printf( '<div $s>', $component->text_wrapper->get() );`
		 *
		 * @since 1.0.0
		 *
		 * @uses Mo_Theme_Components::attributes
		 *
		 * @return string
		 */
		public function get() {
			return $this->parent->attributes->get( $this->arguments_for_parent );
		}
	}
} // End if().
