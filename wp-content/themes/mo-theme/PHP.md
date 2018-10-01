# PHP Principles

## Class based namespacing

WordPress supports three techniques to avoid naming collisions - prefixing, OOP classes, PHP namespaces - of which WordPress.org / PHP < 5.2 supports only the first two.

According to [best practices](https://developer.wordpress.org/plugins/the-basics/best-practices/#oop) OOP classes are the easier way to tackle this problem.

## No HTML in PHP code

HTML code belongs to templates and template tags.

When a PHP function needs to return a HTML chunk the [output buffering](https://secure.php.net/manual/en/function.ob-start.php) method with a `get_template_part` call is used. 


## Loose coupling

Passing arguments between functions, classes, template tags - you name it - is done using arrays.

This way the interface stays open, easily modifiable without breaking the code.

Also class variables are dynamically set and get through overloading.

## Command-query separation

Every function either executes a *command* or performs a *query*. No functions do both at the same time.

The role of the function is described by a prefix. Either is a `get_` for a query or another verb for a command like `set_`, `add_`, `create_` and so on.

There should be no functions which have no prefix.

## Single responsibility principle

Every folder, file, class, function, mixin - you name it - is meant to do one thing and do it well.

## Single source of truth

Make sure everything has a single origin.

For example `wp_get_theme()` gives us the theme version number. Instead of `define( 'THEME_VERSION', '0.1.0' );` use `wp_get_theme()->get('version')`.

## No hardwired data inside functions

This is incorrect:
```
$file_name     = 'js/' . $this->text_domain . '.js';
$file_location = get_theme_file_uri( '/' . $this->assets_folder );
```
Instead `js/`, `.js` and `/` all should be moved into variables.

## The open / close principle

The code should be open for extension but closed for modification.

This means:
* We need a stable API for both PHP, HTML, CSS and JS components
* Use callback functions whenever necessary: https://alistapart.com/article/coding-with-clarity-part-ii#section3
