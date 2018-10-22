<?php
/**
 * Tests for the Mo Assets class
 *
 * @since 1.0.0
 *
 * @link https://phpunit.de/getting-started/phpunit-7.html
 * @package MoTheme
 */

declare( strict_types = 1 );
use PHPUnit\Framework\TestCase;

if ( ! class_exists( 'MoAssetsTest' ) ) {
	/**
	 * The main test class.
	 *
	 * @since 1.0.0
	 */
	final class MoAssetsTest extends TestCase {
		/**
		 * Tests if Javascript can be added in the footer on Admin.
		 *
		 * When `admin_folder` is not empty `false` is returned. 
		 *
		 * @since 1.0.0
		 */
		public function testJavascriptCannotBeAddedInTheFooterOnAdminWhenAdminFolderIsNotEmpty() : void {
			$mo_assets = new MoAssets(
				array(
					'admin_folder' => 'notempty',
				)
			);

			$this->assertEquals(
				false,
				$mo_assets->javascript_in_footer()
			);
		}

		/**
		 * Tests if Javascript can be added in the footer on Admin.
		 *
		 * When `admin_folder` is empty the `javascript_in_footer` argument decides. 
		 *
		 * @since 1.0.0
		 */
		public function testJavascriptCanBeAddedInTheFooterOnAdminWhenAdminFolderIsEmpty() : void {
			$mo_assets = new MoAssets(
				array(
					'admin_folder' => '',
				)
			);

			$this->assertEquals(
				$mo_assets->javascript_in_footer,
				$mo_assets->javascript_in_footer()
			);
		}
	}
}
