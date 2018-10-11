# PHP Principles

## Decouple plugin and theme using add_theme_support

> The implementation of a custom plugin should be decoupled from its use in a Theme. Disabling the plugin should not result in any errors in the Theme code. Similarly switching the Theme should not result in any errors in the Plugin code.

> from 10up Engineering Best Practices

### How it works?

1. Features the theme needs from the plugin can be declared via an `add_theme_support( 'custom-features' );` call. 
2. The plugin checks for these features via `if ( current_theme_supports( 'custom-features' ) ) {}`.
3. If features are requested the plugin enables and implements it.

The above checks must be wrapped into an `after_setup_theme` hook where the execution priority in the plugin must be higher than in the theme. 

Theme:
```php
add_action( 'after_setup_theme', 'define_theme_support', 10, 0 );
```

Plugin:
```php
add_action( 'after_setup_theme', 'check_theme_support', 11, 0 );
```

### The naming convention

The `custom-features` variable must be shared between the theme and the plugin. For that we have the default `global $_wp_theme_features` array. This makes it easy to add custom features into this array in the theme, then query them in the plugin.

To mimic the [WordPress default `post-formats` feature](https://developer.wordpress.org/themes/functionality/post-formats/) we pass the custom features as an array:

Theme:
```php
add_theme_support(
	'custom-features',
	array(
		'feature-1',
		'feature-2'
		)
	)
);
```

Plugin:
```php
if ( current_theme_supports( 'custom-features' ) ) {
	$features = get_theme_support( 'custom-features' );
	if ( $features['feature-1'] ) {
		....
	}
}
```

### The activation hook workaround

Every plugin has a `register_activation_hook` where the plugin features are set up.
This hook is executed before any theme code is executed making the `custom-features` coming from the theme unavaialble at the moment of the plugin activation.

A workaround is to re-call the plugin activation code after the theme sets up and pass the `custom-features` variable to the plugin.
