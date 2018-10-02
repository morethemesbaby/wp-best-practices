<?php
/**
 * The HTML component text wrapper class
 * 
 * When styling text sometimes the font size, the line height etc. is changed.
 * This breaks the vertical flow of the page. 
 * 
 * For example if we have `padding: 1em` and we increase `font-size: 200%`
 * that padding will be increased too.
 * 
 * As a solution we wrap all text into a wrapper class and style the wrapper class text instead.
 * 
 * This breaks the flow:
 * ```
 * <h3 style="font-size:200%;padding:1em">Text</h3>
 * ```
 * 
 * This won't break the flow:
 * ```
 * <h3 style="padding:1em"><span class="text" style="font-size:200%">Text</span></h3>
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeHTMLComponentTextWrapper' ) ) {
	/**
	 * The HTML component text wrapper class.
	 *
	 * @since 1.0.0
	 */
	class MoThemeHTMLComponentTextWrapper extends MoThemeBase {

		/**
		 * We need to use the parent inside this class.
		 * 
		 * @since 1.0.0
		 * 
		 * @link https://stackoverflow.com/questions/9707460/get-parent-object-from-within-an-object
		 */
		private $parent;

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array(
			'attribute' => 'span',
			'value'     => 'text',
		);

		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The class setup arguments array.
		 * @return void
		 */
		public function __construct( $arguments = array(), MoThemeHTMLComponent $parent ) {
			$this->arguments            = array_merge( $this->arguments, $arguments );
			$this->parent               = $parent;
			$this->arguments_for_parent = array(
				'block'   => $this->arguments['value'],
				'element' => '',
			);
		}

		/**
		 * Displays the text wrapper class.
		 * 
		 * @since 1.0.0
		 * 
		 * @return void
		 */
		public function display() {
			$this->parent->attributes->display( $this->arguments_for_parent );
		}

		/**
		 * Returns the text wrapper class.
		 * 
		 * @since 1.0.0
		 * 
		 * @return string
		 */
		public function get() {
			return $this->parent->attributes->get( $this->arguments_for_parent );
		}
	}
}
