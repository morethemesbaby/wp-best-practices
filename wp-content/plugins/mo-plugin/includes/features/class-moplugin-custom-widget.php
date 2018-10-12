<?php
/**
 * The Custom Widget class
 *
 * @package MoPlugin
 * @since 1.0.0
 */

if ( ! class_exists( 'MoPluginCustomWidget' ) ) {
	/**
	 * The Custom Widget class.
	 *
	 * @since 1.0.0
	 */
	class MoPluginCustomWidget extends WP_Widget {

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
					'description'     => esc_html__( 'Display most popular books', 'mo-plugin' ),
					/* translators: The Book widget `number of books to display` text on the admin screen */
					'number_of_books' => esc_html__( 'Number of books to display', 'mo-plugin' ),
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

			$cpt->display_books(
				array(
					'number_of_books' => $instance['number_of_books'],
				)
			);
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
				esc_html__( '(-1 displays all items)', 'mo-plugin' )
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
