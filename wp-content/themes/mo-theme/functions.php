<?php
/**
 * Sets up the theme.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MoTheme
 * @since 1.0.0
 */

// Include main function
require_once get_template_directory() . '/includes/class-motheme-setup.php';

// Run the setup.
$mo_theme = new MoTheme();
