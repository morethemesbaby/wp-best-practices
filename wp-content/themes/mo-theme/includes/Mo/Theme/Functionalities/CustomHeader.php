<?php
/**
 * The WordPress Custom Header functionality
 *
 * @package Mo\Theme\Functionalities
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_Functionalities_CustomHeader' ) ) {
	/**
	 * The WordPress Custom Header functionality class
	 *
	 * Adds theme background color and image support.
	 *
	 * @since 1.0.0
	 *
	 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
	 */
	class Mo_Theme_Functionalities_CustomHeader {
		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			$args = apply_filters(
				'mo_theme_custom_header_args',
				array(
					'default-image'      => '',
					'default-text-color' => '000000',
					'width'              => 1000,
					'height'             => 250,
					'flex-height'        => true,
					'wp-head-callback'   => array( $this, 'style_for_custom_header' ),
				)
			);

			add_theme_support( 'custom-header', $args );
		}

		/**
		 * Styles the custom header.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function style_for_custom_header() {
			$header_text_color = get_header_textcolor();

			if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
				return;
			}

			// If we get this far, we have custom styles. Let's do this.
			?>
			<style type="text/css">
				<?php
					// Has the text been hidden?
					if ( ! display_header_text() ) {
						?>
						.header-title,
						.header-subtitle {
							position: absolute;
							clip: rect(1px, 1px, 1px, 1px);
						}
						<?php
					} else {
						?>
						html body .header .header-title  .link .text,
						html body .header .header-subtitle .text {
						color: #<?php echo esc_attr( $header_text_color ); ?>;
						<?php
					}
				?>
			</style>
			<?php
		}
	}
} // End if().
