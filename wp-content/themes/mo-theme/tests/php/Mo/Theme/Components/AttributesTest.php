<?php
/**
 * Tests for the Mo\Theme\Components\Attributes class
 *
 * @since 1.0.0
 *
 * @link https://phpunit.de/getting-started/phpunit-7.html
 *
 * @package Mo\Test\Theme\Components
 */

declare( strict_types = 1 );
use PHPUnit\Framework\TestCase;

if ( ! class_exists( 'Mo_Theme_Components_Attributes_Test' ) ) {
	/**
	 * The main test class.
	 *
	 * @since 1.0.0
	 */
	final class Mo_Theme_Components_Attributes_Test extends TestCase {
		/**
		 * Tests if an element ID is a single value.
		 *
		 * @since 1.0.0
		 */
		public function testHtmlElementIdIsASingleValue() : void {
			$mo_components = new Mo_Theme_Components_Attributes(
				array(
					'block'      => 'block',
					'element'    => '',
					'modifier'   => 'modifier',
					'custom_id'  => '',
					'display_id' => true,
				)
			);

			$id = $mo_components->create_id();

			$this->assertEquals(
				'block',
				$id['values']
			);
		}
	}
}
