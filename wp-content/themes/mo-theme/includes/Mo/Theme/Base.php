<?php
/**
 * The theme base
 *
 * @package Mo\Theme
 * @since 1.0.0
 * @see Mo_Base
 */

if ( ! class_exists( 'Mo_Theme_Base' ) ) {
	/**
	 * The theme base class.
	 *
	 * Contains code specific for WordPress themes.
	 *
	 * @since 1.0.0
	 */
	class Mo_Theme_Base extends Mo_Base {

		/**
		 * Arguments for the `get_template_part` method.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		public $get_template_part_arguments = array(
			'query_var_name'     => '',
			'query_var_value'    => null,
			'template_part_slug' => '',
			'template_part_name' => '',
		);

		/**
		 * Arguments for the `get_query_var` method.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		public $get_query_var_arguments = array(
			'name'     => '',
			'defaults' => array(),
		);

		/**
		 * Gets a query var.
		 *
		 * Templates are communicating via query vars.
		 * When a query var is missing a warning is thrown.
		 * This method eliminates the warning by returning an empty query var when the var is missing.
		 *
		 * @since 1.0.0
		 *
		 * @link https://developer.wordpress.org/reference/functions/get_template_part/#comment-2349
		 *
		 * @param  array $arguments An array of arguments.
		 * @return array
		 */
		public function get_query_var( $arguments ) {
			$this->get_query_var_arguments = $this->array_merge(
				$this->get_query_var_arguments,
				$arguments
			);

			$query_var  = get_query_var( $this->get_query_var_arguments['name'] );
			$query_vars = ( '' === $query_var ) ? array() : $query_var;

			return $this->array_merge(
				$this->get_query_var_arguments['defaults'],
				$query_vars
			);
		}

		/**
		 * Gets a template part.
		 *
		 * Returns the output of a template part.
		 * Uses the `ob_start()` and `ob_get_clean()` output buffer method.
		 *
		 * By default `get_template_part` displays the template output.
		 * This method saves it for later reuse.
		 *
		 * @link https://developer.wordpress.org/reference/functions/get_template_part/
		 *
		 * @param  array $arguments An array of arguments.
		 * @return string           HTML
		 */
		public function get_template_part( $arguments ) {
			$this->get_template_part_arguments = $this->array_merge(
				$this->get_template_part_arguments,
				$arguments
			);

			ob_start();

			set_query_var(
				$this->get_template_part_arguments['query_var_name'],
				$this->get_template_part_arguments['query_var_value']
			);

			get_template_part(
				$this->get_template_part_arguments['template_part_slug'],
				$this->get_template_part_arguments['template_part_name']
			);

			return ob_get_clean();
		}
	}
} // End if().
