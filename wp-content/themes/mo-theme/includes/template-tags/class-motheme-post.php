<?php
/**
 * The Post class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemePost' ) ) {
	/**
	 * The Post class.
	 *
	 * @since 1.0.0
	 */
	class MoThemePost extends MoThemeBase {

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array An array of arguments.
		 */
		public $arguments = array(
			'max_word_count' => 40,
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
		 * Checks if a post has content.
		 * 
		 * WordPress has no `has_content()` function like `has_excerpt()`.
		 * This is a quick fix of that.
		 * 
		 * @since 1.0.0
		 * 
		 * @return boolean
		 */
		public function has_content() {
			return ( '' !== get_the_content() );
		}

		/**
		 * Returns the class attribute for a post.
		 * 
		 * @since 1.0.0
		 * 
		 * @return string
		 */
		public function get_class() {
			$orientation = '';
			$klass       = [];

			if ( $this->has_content() ) {
				$orientation = $this->get_class_orientation( array( 'text' => get_the_content() ) );
				$klass[]     = 'has-content';
			}

			if ( has_excerpt() ) {
				$orientation = $this->get_class_orientation( array( 'text' => get_the_excerpt() ) );
				$klass[]     = 'has-excerpt';
			}

			if ( has_post_thumbnail() ) {
				$klass[] = 'has-thumbnail';
			}

			return implode( ' ', array_merge( (array) $orientation, $klass ) );
		}

		/**
		 * Returns a classname describing the post orientation.
		 * 
		 * @since 1.0.0
		 * 
		 * @param array $arguments The arguments array.
		 * @return string
		 */
		public function get_class_orientation( $arguments = array() ) {
			$defaults   = array(
				'text' => '',
			);
			$arguments  = array_merge( $defaults, $arguments );
			$word_count = str_word_count( strip_tags( $arguments['text'] ) );

			return ( $word_count < $this->arguments['max_word_count'] ) ? 'display-horizontal' : 'display-vertical';
		}
	}
}
