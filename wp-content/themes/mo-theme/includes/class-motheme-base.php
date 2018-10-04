<?php
/**
 * The MoTheme base class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeBase' ) ) {
	/**
	 * The base class.
	 *
	 * @since 1.0.0
	 */
	class MoThemeBase {
		/**
		 * Class variables.
		 *
		 * They are dynamically set and get (overloaded).
		 *
		 * @since 1.0.0
		 *
		 * @link http://codular.com/introducing-php-classes
		 * @var array $data An array of variables.
		 */
		protected $data = array();

		/**
		 * Arguments for the get_template_part method.
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
		 * Arguments for the get_query_var method.
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
		 * Dynamically sets a variable.
		 *
		 * @since 1.0.0
		 *
		 * @param string $variable The variable name.
		 * @param mixed  $value    The variable value.
		 * @return void
		 */
		public function __set( $variable, $value ) {
			$this->data[ $variable ] = $value;
		}


		/**
		 * Dynamically gets a variable.
		 *
		 * @since 1.0.0
		 *
		 * @param string $variable The variable name.
		 * @return mixed           The variable value.
		 */
		public function __get( $variable ) {
			if ( isset( $this->data[ $variable ] ) ) {
				return $this->data[ $variable ];
			} else {
				die( 'Unknown variable: ' . esc_attr( $variable ) );
			}
		}


		/**
		 * Gets a query var.
		 *
		 * @since 1.0.0
		 *
		 * @param  array $arguments An array of arguments.
		 * @return array
		 */
		public function get_query_var( $arguments ) {
			$this->get_query_var_arguments = array_merge(
				$this->get_query_var_arguments,
				$arguments
			);

			$query_var  = get_query_var( $this->get_query_var_arguments['name'] );
			$query_vars = ( '' === $query_var ) ? array() : $query_var;

			return array_merge(
				$this->get_query_var_arguments['defaults'],
				$query_vars
			);
		}

		/**
		 * Gets a template part.
		 *
		 * Uses the `ob_start()` and `ob_get_clean()` output buffer method.
		 *
		 * @param  array $arguments An array of arguments.
		 * @return string            HTML
		 */
		public function get_template_part( $arguments ) {
			$this->get_template_part_arguments = array_merge(
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
}
