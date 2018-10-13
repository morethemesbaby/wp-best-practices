<?php
/**
 * The More Themes Baby database class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoDB' ) ) {
	/**
	 * The main class.
	 *
	 * @since 1.0.0
	 */
	class MoDB extends MoBase {

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array();

		/**
		 * Arguments for get posts.
		 *
		 * @since 1.0.0
		 *
		 * @link https://10up.github.io/Engineering-Best-Practices/php/
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments_for_get_posts = array(
			'post_type'              => 'post',
			'posts_per_page'         => 10,
			'cache_id'               => '',
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
		);

		/**
		 * Instead of `posts_per_page => -1` we use a max posts per page.
		 *
		 * @since 1.0.0
		 *
		 * @var integer
		 */
		public $max_posts_per_page = 1000;

		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments An array of arguments.
		 * @return void
		 */
		public function __construct( $arguments = array() ) {
			$this->arguments = $this->array_merge( $this->arguments, $arguments );
			$this->setup_variables();
		}

		/**
		 * Gets posts.
		 *
		 * @since 1.0.0
		 *
		 * @link https://10up.github.io/Engineering-Best-Practices/php/
		 *
		 * @param array $arguments An array of arguments.
		 * @return array An array of posts.
		 */
		public function get_posts( $arguments = array() ) {
			$arguments = $this->array_merge( $this->arguments_for_get_posts, $arguments );
			$arguments = $this->setup_arguments_for_get_posts( $arguments );

			$results = wp_cache_get( $arguments['cache_id'] );

			if ( false === $results ) {
				$results = new WP_Query( $arguments );

				if ( ! is_wp_error( $results ) && $results->have_posts() ) {
					wp_cache_set( $arguments['cache_id'], $results );
				}
			}

			return $results;
		}

		/**
		 * Sets up variables for get posts.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments An array of arguments.
		 * @return array
		 */
		public function setup_arguments_for_get_posts( $arguments = array() ) {
			$arguments = $this->avoid_unlimited_posts_per_pages( $arguments );

			return $arguments;
		}

		/**
		 * Sets up the cache id.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments An array of arguments.
		 * @return array
		 */
		public function setup_cache_id( $arguments = array() ) {
			if ( ! isset( $arguments['cache_id'] ) ) {
				return $arguments;
			}

			if ( '' === $arguments['cache_id'] ) {
				return $arguments;
			}

			$arguments['cache_id'] = implode(
				'-',
				array(
					PLUGIN_TEXT_DOMAIN,
					$arguments['cache_id'],
				)
			);

			return $arguments;
		}

		/**
		 * Avoids unlimited posts per pages.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments An array of arguments.
		 * @return array
		 */
		public function avoid_unlimited_posts_per_pages( $arguments = array() ) {
			if ( ! isset( $arguments['posts_per_page'] ) ) {
				return $arguments;
			}

			if ( -1 !== $arguments['posts_per_page'] ) {
				return $arguments;
			}

			$arguments['posts_per_page'] = $max_posts_per_page;

			return $arguments;
		}

		/**
		 * Sets up variables.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function setup_variables() {
			//
		}
	}
} // End if().
