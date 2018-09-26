<?php
/**
 * Sets up the theme.
 *
 * Sets up the theme functionality and options.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MoTheme
 * @since 1.0.0
 */

// Define theme details
define( 'MO_THEME_TEXT_DOMAIN', 'mo-theme' );
define( 'MO_THEME_VERSION', '0.1.0' );

// Define theme structure
define( 'MO_THEME_TEMPLATE_URL', get_template_directory_uri() );
define( 'MO_THEME_PATH', get_template_directory() . '/' );
define( 'MO_THEME_INCLUDES', MO_THEME_PATH . 'includes/' );
define( 'MO_THEME_ASSETS', 'assets/' );

// Include main functions
require_once MO_THEME_INCLUDES . 'theme-setup.php';
require_once MO_THEME_INCLUDES . 'template-tags.php';

// Run the setup functions.
MoTheme\Setup\setup();
