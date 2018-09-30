<?php
/**
 * The header class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeHeader' ) ) {
    /**
     * The header class.
     *
     * @since 1.0.0
     */
    class MoThemeHeader extends MoThemeBase {
        public function __construct( $arguments = array() ) {
           // 
        }

        public function get_class() {
            return 'test';
        }
    }
}