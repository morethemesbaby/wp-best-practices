<?php
/**
 * The Post Template tag
 *
 * @package Mo\Theme\TemplateTags
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_TemplateTags_Post' ) ) {
	/**
	 * The Post Template tag class.
	 *
	 * Contains code to help displaying posts.
	 *
	 * @since 1.0.0
	 */
	class Mo_Theme_TemplateTags_Post extends Mo_Theme_Base {

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array An array of arguments.
		 */
		public $arguments = array(
			'max_word_count'      => 40,
			'image_not_found_url' => '/assets/images/image-not-found.png',
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
		}

		/**
		 * Checks if a post has title.
		 *
		 * @since 1.0.0
		 *
		 * @return boolean
		 */
		public function has_title() {
			$title = the_title_attribute( 'echo=0' );
			return ( ! empty( $title ) );
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
		 * Checks if a post link is external (outside of the current domain)
		 *
		 * @since 1.0.0
		 *
		 * @param string $link The link.
		 * @return boolean
		 */
		public function link_is_external( $link ) {
			$permalink = apply_filters( 'the_permalink', get_permalink() );

			return ( $link === $permalink );
		}

		/**
		 * Returns the first link from post content.
		 *
		 * If there is no link in the content returns the post permalink.
		 *
		 * @since 1.0.0
		 *
		 * @link https://developer.wordpress.org/reference/functions/get_url_in_content/
		 *
		 * @return string
		 */
		public function get_link_from_content() {
			$content = get_the_content();
			$has_url = get_url_in_content( $content );

			return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
		}

		/**
		 * Returns the class attribute for a post.
		 *
		 * Includes also a `post_class` call required by WordPress.org themes.
		 *
		 * @since 1.0.0
		 *
		 * @return string
		 */
		public function get_class() {
			$orientation = '';

			$klass = get_post_class();

			if ( $this->has_content() ) {
				$orientation = $this->get_class_orientation(
					array(
						'text' => get_the_content(),
					)
				);

				$klass[] = 'has-content';
			}

			if ( has_excerpt() ) {
				$orientation = $this->get_class_orientation(
					array(
						'text' => get_the_excerpt(),
					)
				);

				$klass[] = 'has-excerpt';
			}

			if ( has_post_thumbnail() ) {
				$klass[] = 'has-thumbnail';
			}

			return $this->implode(
				' ',
				$this->array_merge(
					$orientation,
					$klass
				)
			);
		}

		/**
		 * Returns a classname describing the post orientation.
		 *
		 * Depends on the post content or excerpt length.
		 * If they are lengthy the orientation will be vertical, otherwise horizontal.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return string
		 */
		public function get_class_orientation( $arguments = array() ) {
			$defaults = array(
				'text' => '',
			);

			$arguments  = $this->array_merge( $defaults, $arguments );
			$word_count = str_word_count( wp_strip_all_tags( $arguments['text'] ) );

			return ( $word_count < $this->arguments['max_word_count'] ) ? 'display-horizontal' : 'display-vertical';
		}

		/**
		 * Returns the first image URL from a post.
		 *
		 * If there is no URL found returns the URL of a 'not-found' image.
		 *
		 * @since 1.0.0
		 *
		 * @link https://css-tricks.com/snippets/wordpress/get-the-first-image-from-a-post/
		 * @return string
		 */
		public function get_first_image_url() {
			global $post;

			$first_img = '';

			preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', do_shortcode( $post->post_content, 'gallery' ), $matches );
			$first_img = isset( $matches[1][0] ) ? $matches[1][0] : null;

			if ( empty( $first_img ) ) {
				return get_template_directory_uri() . $this->arguments['image_not_found_url'];
			}

			return $first_img;
		}
	}
} // End if().
