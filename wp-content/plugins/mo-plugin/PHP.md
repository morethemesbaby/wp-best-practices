# PHP Principles

## Decouple plugin and theme using add_theme_support

   The implementation of a custom plugin should be decoupled from its use in a Theme. Disabling the plugin should not result in any errors in the Theme code. Similarly switching the Theme should not result in any errors in the Plugin code.

In practice this works like:

1. Every feature the theme needs from the plugin is requested via an `add_theme_support( 'custom-feature' );`. 
2. The plugin checks for a feature via `if ( current_theme_supports( 'custom-feature' ) ) {}`.
3. If the feature is requested the plugin enables it.

The above checks must be wrapped into an `after_setup_theme` hook. Where the priority in theme is less than the priority in plugin:

Theme:
```
add_action( 'after_setup_theme', 'define_theme_support', 10, 0 );
```

Plugin:
```
add_action( 'after_setup_theme', 'check_theme_support', 11, 0 );
```

This implies the entire plugin setup code must be put inside the `after_setup_hook`:
```
function check_theme_support() {
	if ( current_theme_supports( FEATURE ) ) {
		$cpt = new PluginCustomPostType();
		add_action( 'init', array( $cpt, 'register' ) );
		register_activation_hook( __FILE__, array( $plugin, 'activate_plugin' ) );
	} 
}
add_action( 'after_setup_theme', 'check_theme_support', 11, 0 );
```

To share custom feature descriptors