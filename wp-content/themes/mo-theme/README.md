# Mo Theme

A WordPress.org compatible boilerplate theme based on best practices.

## Dependencies

* [Node & NPM](https://www.npmjs.com/get-npm) - Build packages and 3rd party dependencies are managed through NPM, so you will need that installed globally
* [Gulp](https://gulpjs.com/) - Gulp is used as the main task runner, it runs PostCSS, SASS, Autoprefixer, and more.

## Features

* Full support for WordPress.org default [functionalities](https://developer.wordpress.org/themes/functionality/) and [customizations](https://developer.wordpress.org/themes/customize-api/)
* [Class based namespaces](https://10up.github.io/Engineering-Best-Practices/php/#design-patterns) for WordPress.org / PHP version <5.3 compatibility

## Principles

### Don't repeat yourself

### No hardwired data inside functions

This is incorrect:
```
$file_name     = 'js/' . $this->text_domain . '.js';
$file_location = get_theme_file_uri( '/' . $this->assets_folder );
```

Instead `js/`, `.js` and `/` all should be moved into variables.

### Single source of truth

Make sure everything has a single origin.

For example `wp_get_theme()` gives us the theme version number. Instead of `define( 'THEME_VERSION', '0.1.0' );` use `wp_get_theme()->get('version')`.

## Inspiration

* Storefront theme: https://github.com/woocommerce/storefront
* 10up official starter theme: https://github.com/10up/theme-scaffold
