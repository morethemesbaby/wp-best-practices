<?php
/**
 * The Custom Widget
 *
 * @package MoPlugin
 * @since 1.0.0
 */

if ( ! class_exists( 'MoProThemeCustomWidget' ) ) {
	/**
	 * The Custom Widget class.
	 *
	 * Sets up and displays the `Books` custom widget.
	 *
	 * @since 1.0.0
	 */
	class MoProThemeCustomWidget extends WP_Widget {

		/**
		 * The arguments for wp_kses displaying the widget on backend.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		public $wp_kses = array(
			'p'     => array(),
			'br'    => array(),
			'input' => array(
				'id'    => array(),
				'name'  => array(),
				'type'  => array(),
				'value' => array(),
				'min'   => array(),
			),
			'label' => array(
				'for' => array(),
			),
		);

		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @link https://codex.wordpress.org/Function_Reference/register_widget
		 *
		 * @return void
		 */
		public function __construct() {
			parent::__construct(
				'mo_plugin_book_widget',
				'Mo Plugin Books',
				array(
					/* translators: The Book widget description on the admin screen */
					'description'     => esc_html__( 'Display most popular books', 'mo-pro-theme' ),
					/* translators: The Book widget `number of books to display` text on the admin screen */
					'number_of_books' => esc_html__( 'Number of books to display', 'mo-pro-theme' ),
				)
			);
		}

		/**
		 * Displays the widget on frontend.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     The widget arguments.
		 * @param array $instance The instance of the widget.
		 * @return void
		 */
		public function widget( $args, $instance ) {
			$cpt = new MoPluginCustomPostType();

			$books = $cpt->get_books(
				array(
					'number_of_books' => $instance['number_of_books'],
				)
			);

			$query = array(
				'title' => 'Book list',
				'query' => $books,
			);

			$arguments = array(
				'query_var_name'     => 'post-list-query-vars',
				'query_var_value'    => $query,
				'template_part_slug' => 'template-parts/post-list/post-list',
				'template_part_name' => 'with-external-query',
			);

			$mo_theme_base = new MoThemeBase();

			echo wp_kses_post( $mo_theme_base->get_template_part( $arguments ) );
		}

		/**
		 * Displays the widget on the backend.
		 *
		 * @since 1.0.0
		 *
		 * @param array $instance The widget instance.
		 * @return void
		 */
		public function form( $instance ) {
			$id    = $this->get_field_id( 'number_of_books' );
			$label = $this->widget_options['number_of_books'];
			$name  = $this->get_field_name( 'number_of_books' );
			$value = $instance['number_of_books'];

			$label = sprintf(
				'<label for="%1$s">%2$s</label>',
				esc_attr( $id ),
				esc_html( $label )
			);

			$input = sprintf(
				'<input id="%1$s" name="%2$s" type="number" value="%3$s" min="-1">',
				esc_attr( $id ),
				esc_attr( $name ),
				esc_attr( $value )
			);

			$form = sprintf(
				'<p>%1$s<br/>%2$s<br/>%3$s</p>',
				$label,
				$input,
				/* translators: A widget's form helper text on the admin screen */
				esc_html__( '(-1 displays all items)', 'mo-pro-theme' )
			);

			echo wp_kses( $form, $this->wp_kses );
		}

		/**
		 * Process the widget options to be saved
		 *
		 * @param array $new_instance The new widget instance.
		 * @param array $old_instance The old widget instance.
		 * @return array              An instance
		 */
		public function update( $new_instance, $old_instance ) {
			$instance = array();

			if ( ! empty( $new_instance['number_of_books'] ) ) {
				$instance['number_of_books'] = filter_var(
					$new_instance['number_of_books'],
					FILTER_SANITIZE_NUMBER_INT
				);
			} else {
				$instance['number_of_books'] = '0';
			}

			return $instance;
		}
	}
} // End if().
