# PHP Principles

## Decouple plugin and heme using add_theme_support

   The implementation of a custom plugin should be decoupled from its use in a Theme. Disabling the plugin should not result in any errors in the Theme code. Similarly switching the Theme should not result in any errors in the Plugin code.

Every feature the plugin adds is advertised to others via an `add_theme_support( 'custom-feature' );`. Consequently others can check for a feature via `if ( current_theme_supports( 'custom--feature' ) ) {}`.