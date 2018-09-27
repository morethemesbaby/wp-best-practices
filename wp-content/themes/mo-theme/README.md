# Mo Theme

A WordPress.org compatible boilerplate theme based on best practices.

## Features

* Full support for WordPress.org default [functionalities](https://developer.wordpress.org/themes/functionality/) and [customizations](https://developer.wordpress.org/themes/customize-api/)
* [Class based namespaces](https://10up.github.io/Engineering-Best-Practices/php/#design-patterns) for WordPress.org / PHP version <5.3 compatibility

## Principles

### Loose coupling

Passing arguments between functions, classes, template tags - you name it - is done using arrays.

This way the interface stays open, easily modifiable without breaking the code.

Also class variables are dynamically set and get through overloading.

### Command-query separation

Every function either executes a *command* or performs a *query*. No functions do both.

The role of the function is described by a prefix:
*

### Single responsibility principle

Every folder, file, class, function, mixin - you name it - is meant to do one thing and do it well.

### Don't repeat yourself / High cohesion

#### Classes instead standalone functions

#### Single source of truth

Make sure everything has a single origin.

For example `wp_get_theme()` gives us the theme version number. Instead of `define( 'THEME_VERSION', '0.1.0' );` use `wp_get_theme()->get('version')`.

### No hardwired data inside functions

This is incorrect:
```
$file_name     = 'js/' . $this->text_domain . '.js';
$file_location = get_theme_file_uri( '/' . $this->assets_folder );
```

Instead `js/`, `.js` and `/` all should be moved into variables.



## Dependencies

* [Node & NPM](https://www.npmjs.com/get-npm) - Used as the framework to build the theme style.
* [Gulp](https://gulpjs.com/) - Used as the task runner, to build CSS from SCSS.
* [Composer](https://getcomposer.org/) - Used to autoload PHP classes

## Commands

### SCSS to CSS

After any modifications to SCSS files run:

```
gulp scss
```

### Autoloading PHP classes

After any new class added run:
```
composer dump-autoload
```

## Inspiration

* Storefront theme: https://github.com/woocommerce/storefront
* 10up official starter theme: https://github.com/10up/theme-scaffold
