<?php
/**
 * The More Themes Baby database
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_DB' ) ) {
	/**
	 * The More Themes Baby database class.
	 *
	 * Contains code for working with the database.
	 *
	 * @since 1.0.0
	 */
	class Mo_DB extends Mo_Base {

		/**
		 * Class arguments.
		 *
		 * Empty for now, kept for future compatibility.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An array of arguments.
		 */
		public $arguments = array();

		/**
		 * Arguments for get posts.
		 *
		 * Contains standard arguments for `WP_Query` together with optimization arguments.
		 * The WordPress query can be heavily optimized with these additional arguments.
		 *
		 * @since 1.0.0
		 *
		 * @link https://10up.github.io/Engineering-Best-Practices/php/ Optimizing queries.
		 *
		 * @var array $arguments An array of arguments.
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
		 * For query optimization instead of `posts_per_page => -1` we use a max posts per page.
		 *
		 * @since 1.0.0
		 *
		 * @link https://10up.github.io/Engineering-Best-Practices/php/ Optimizing queries.
		 *
		 * @var integer
		 */
		public $max_posts_per_page = 1000;

		/**
		 * Sets up the class.
		 *
		 * Empty for now, kept for future compatibility.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments An array of arguments.
		 * @return void
		 */
		public function __construct( $arguments = array() ) {
			$this->arguments = $this->array_merge( $this->arguments, $arguments );
		}

		/**
		 * Gets posts.
		 *
		 * Returns an optimized `WP_Query` or the results from the cache.
		 * If the query is not cached it will cache it.
		 *
		 * @since 1.0.0
		 *
		 * @link https://10up.github.io/Engineering-Best-Practices/php/ Optimizing queries.
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
		 * Sets up arguments for get posts.
		 *
		 * Arguments are filtered through a set of optimization methods.
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
		 * Avoids unlimited posts per pages.
		 *
		 * If the query is set for unlimited posts per page it will be capped.
		 *
		 * @todo See how this works when more results has to be returned than the capped value.
		 *
		 * @since 1.0.0
		 *
		 * @link https://10up.github.io/Engineering-Best-Practices/php/ Optimizing queries.
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
		 * Sets up the cache id.
		 *
		 * @todo Test the cache.
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

			$arguments['cache_id'] = $this->implode(
				'-',
				array(
					THEME_TEXT_DOMAIN,
					$arguments['cache_id'],
				)
			);

			return $arguments;
		}
	}
} // End if().
