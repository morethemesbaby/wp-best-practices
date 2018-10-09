<?php
/**
 * The Comment class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeComment' ) ) {
	/**
	 * The Comment class.
	 *
	 * @since 1.0.0
	 */
	class MoThemeComment extends MoThemeBase {

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array An array of arguments.
		 */
		public $arguments = array();


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
		}

		/**
		 * Returns comments only, without pingbacks or trackbacks.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The argument list.
		 * @return array           A list of comments.
		 */
		public function get_without_pingback_trackback( $arguments ) {
			return get_comments(
				array(
					'post_id' => $arguments['post']->ID,
					'status'  => 'approve',
					'type'    => 'comment',
				)
			);
		}
	}
} // End if().
