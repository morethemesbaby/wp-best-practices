<?php
/**
 * The Post Format Template tag
 *
 * @package Mo\Theme\TemplateTags
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_TemplateTags_PostFormat' ) ) {
	/**
	 * The Post Format Template tag class.
	 *
	 * Contains code to help displaying Post Formats.
	 *
	 * @since 1.0.0
	 */
	class Mo_Theme_TemplateTags_PostFormat extends Mo_Theme_Base {

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
			$this->arguments = $this->array_merge( $this->arguments, $arguments );
		}

		/**
		 * Adds an arrow to the Link Post Format title.
		 *
		 * This is a filter for `the_title()`.
		 *
		 * @since 1.0.0
		 *
		 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/the_title
		 *
		 * @param string $title The title of the post.
		 * @return string
		 */
		public function add_arrow_to_link_post_title( $title ) {
			if ( 'link' === get_post_format() ) {
				return $title . $this->get_arrow_for_link_post_type();
			} else {
				return $title;
			}
		}

		/**
		 * Returns an arrow for the Link Post Format title.
		 *
		 * @since  1.0.0
		 *
		 * @return string
		 */
		public function get_arrow_for_link_post_type() {
			$arrow_attributes = apply_filters(
				'mo_theme_post_format_link_arrows',
				array(
					'direction' => 'right',
				)
			);

			$component = new Mo_Theme_Components();

			return $component->arrows->get( $arrow_attributes );
		}

		/**
		 * Returns classname for the Link Post Format link.
		 *
		 * @since 1.0.0
		 *
		 * @param string $link The link URL.
		 * @return string
		 */
		public function get_link_class( $link ) {
			$mopost = new MoThemePost();

			return $mopost->link_is_external( $link ) ? $this->arguments['local_link_class'] : $this->arguments['external_link_class'];
		}

		/**
		 * Returns title for the Link Post Format link.
		 *
		 * Returns either the post title, or the URL where it points
		 *
		 * @since 1.0.0
		 *
		 * @param string $link The link URL.
		 * @return string
		 */
		public function get_link_title( $link ) {
			$has_title = the_title_attribute( 'echo=0' );

			return ( ! empty( $has_title ) ) ? $has_title : $link;
		}
	}
} // End if().
