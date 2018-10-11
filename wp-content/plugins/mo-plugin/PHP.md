# PHP Principles

## Decouple plugin and theme using add_theme_support

   The implementation of a custom plugin should be decoupled from its use in a Theme. Disabling the plugin should not result in any errors in the Theme code. Similarly switching the Theme should not result in any errors in the Plugin code.

In practice this works like:

1. Every feature the theme needs from the plugin is requested via an `add_theme_support( 'custom-feature' );`. 
2. The plugin checks for a feature via `if ( current_theme_supports( 'custom--feature' ) ) {}`.
3. If the feature is requested the plugin implements it.