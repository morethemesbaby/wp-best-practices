# PHP Best Practices

* [Class based namespacing](#class-based-namespacing)
* [Loose coupling](#loose-coupling)
	* [Class variables](#class-variables)
	* [Function arguments](#function-arguments)
	* [Template variables](#template-variables)
* [Single responsibility principle](#single-responsibility-principle)
	* [Single source of truth](#single-source-of-truth)
	* [No hardwired data inside functions](#no-hardwired-data-inside-functions)
	* [No HTML in PHP code](#no-html-in-php-code)
	* [Command-query separation](#command-query-separation)


## Class based namespacing

WordPress supports three techniques to avoid naming collisions:

* Prefixing
* OOP classes
* PHP namespaces

WordPress.org / PHP < 5.3 supports only the first two.

According to [best practices](https://developer.wordpress.org/plugins/the-basics/best-practices/#oop) OOP classes are the easier way to tackle this problem.

### How to name and organize classes

According to the [WordPress.org source code](https://core.trac.wordpress.org/browser/trunk/src/wp-includes?order=name) and a [Stack Overflow thread](https://softwareengineering.stackexchange.com/questions/149303/naming-classes-methods-functions-and-variables#149321) WordPress has no clear rules how to name classes, methods, attributes and variables. It's quite unique in this comparing to peers.

[PHPCS](https://github.com/squizlabs/PHP_CodeSniffer) offers a highly unusable naming convention set:

> Filenames should be all lowercase with hyphens as word separators. Expected moassetstest.php, but found MoAssetsTest.php.

> Class file names should be based on the class name with "class-" prepended. Expected class-moassetstest.php, but found MoAssetsTest.php.

In some parts of the WordPress.org source code one can find a consistent naming convention: https://core.trac.wordpress.org/browser/trunk/src/wp-includes/Requests/Auth/Basic.php
```php
/**
 * Basic Authentication provider
 *
 * Provides a handler for Basic HTTP authentication via the Authorization
 * header.
 *
 * @package Requests
 * @subpackage Authentication
 */
class Requests_Auth_Basic implements Requests_Auth {
```

The rules are:

1. Organize classes in folders and subfolders following their `@package` and `@subpackage` structure 
2. Reflect folder structure in the class name: `Package_Subpackage_Classname`

The [upcoming PSR-5 documentation standard](https://make.wordpress.org/core/handbook/best-practices/inline-documentation-standards/php/#deprecated-tags) will get rid of `@subpackage` in favor of a unified package tag: `@package Package\Subpackage`.

Therefore the updated rules are:

1. Organize classes in folders and subfolders
2. Reflect folder structure in the class name: `Parent_Subfolder_Classname`
3. Tag it with `@package Parent\Subfolder`


## Loose coupling

[Loose coupling](https://alistapart.com/article/coding-with-clarity#section3) makes sure code is open, easily modifiable without breaking the site.

For different types of code different techniques are used.

### Class variables

Class variables are [dynamically set and get](http://codular.com/introducing-php-classes) through overloading / magic methods.

This is not recommended.
```php
/**
* Class arguments.
*
* Used to setup the class.
*
* @since 1.0.0
*
*/
public $block    = string;
public $element  = string;
public $modifier = string;
```
If an argument is removed / renamed the old version of the code might broke.
For example if `$modifier` is removed an `$object->modifier` call breaks the code.

This is better:
```php
/**
* Class arguments.
*
* Used to setup the class.
*
* @since 1.0.0
*
* @var array An array of arguments.
*/
public $arguments = array(
	'block'                   => '',
	'element'                 => '',
	'modifier'                => '',
	....
);

public function __set( $variable, $value ) {}
...

public function __get( $variable, $value ) {}
```
Arguments are a dynamic array with any number of items. They are get and set with software and managed when an argument item is not found .

If `$modifier` is removed the `_get` method can manage what happens on an '$object->modifier` call.


### Function arguments

Function arguments are passed as arrays instead of lists of arguments.

This is not recommended:
```php
function display( $title, $description, $author ) { ... }
```
When one argument is removed, argument name or order is changed the old versions of the code might break.

This is recommended:
```php
$default_arguments = array(
	'title'      => '',
	'description => '',
	'author'     => '',
);
function display( $arguments = array() ) {
	$arguments = array_merge( $default_arguments, $arguments );
}
```
Arguments are a dynamic array with any number of items in any order. They are easily replaceable and modifiable.

When a new kind of author is needed it can be simply added:
```php
$default_arguments = array(
	'title'      => '',
	'description => '',
	'author'     => '',
	'author2'    => array(),
);
```

### Template variables

Templates are [communicating](https://developer.wordpress.org/reference/functions/get_template_part/#comment-2349) with each other through the `get_template_part` and `set_query_var` / `get_query_var`.

Passing arguments between template parts is done with an array instead of a list of arguments.

This is not recommended:
```php
set_query_var( 'post-list-title', theme_get_archive_label( 'Posts' ) );
set_query_var( 'post-list-klass', 'for-archive' );
set_query_var( 'post-list-content', theme_get_archive_content() );
get_template_part( 'template-parts/post-list/post-list', '' );
```

This is recommended:
```php
$post_list_query_vars = array(
	'title'   => theme_get_archive_label( 'Posts' ),
	'klass'   => 'for-archive',
	'content' => theme_get_archive_content(),
);
set_query_var( 'post-list-query-vars', $post_list_query_vars );
get_template_part( 'template-parts/post-list/post-list', '' );
```

The logic is the same: pass an array of arguments which can be handled dynamic instead of a list of arguments which are handled static.

## Single responsibility principle

Every folder, file, class, function, mixin is meant to [do one thing and do it well](https://alistapart.com/article/coding-with-clarity#section1).

### Single source of truth

Make sure everything has a single origin.

For example `wp_get_theme()`returns the theme version number which must be set in `style.css`.

Instead of a later `define( 'THEME_VERSION', '0.1.0' );` in `functions.php` the `wp_get_theme()->get('version')` can be used.

### No hardwired data inside functions

This is not recommended:
```php
$file_name = 'js/' . $text_domain . '.js';
```

Instead `js/`, `.js` should be moved into class arguments.
```php
/**
* Theme arguments.
*
* @since 1.0.0
*
* @var array $arguments An Array of arguments.
*/
public $arguments = array(
	'javascript_folder'      => 'js/',
	'javascript_extension'   => '.js',
);

$file_name = $arguments['javascript_folder'] . $text_domain . $arguments['javascript_extension']
```

### No HTML in PHP code

HTML code belongs to templates and template tags.

When a PHP function needs to return HTML the [output buffering](https://secure.php.net/manual/en/function.ob-start.php) method with a `get_template_part` call should be used.

This is not recommended:
```php
function theme_get_arrow_html( $direction ) {
	return
		'<span class="arrow-with-triangle arrow-with-triangle--' . $direction . '">
 		<span class="arrow-with-triangle__line"></span>
 		<span class="triangle triangle-- arrow-with-triangle__triangle"></span>
 		</span>';
 }
```

This is better:
```php
function theme_get_arrow_html( $query_vars ) {
	$arguments = array(
		'query_var_name'     => 'arrow-with-triangle-query-vars',
		'query_var_value'    => $query_vars,
		'template_part_slug' => 'template-parts/html-component/arrow-with-triangle/arrow-with-triangle',
		'template_part_name' => '',
	);

	return get_template_part( $arguments );
}
```

### Command-query separation

Every function [either](https://alistapart.com/article/coding-with-clarity#section2) executes a *command* or performs a *query*. No functions do both at the same time.

The role of the function is described by a prefix. Either is a `get_` for a query, or, another verb for a command like `set_`, `add_`, `create_` and so on.

There should be no functions which have no prefix, except when the function name is a verb, and the function is a member of a class.

This is not recommended:
```php
function content_width() { ... }
```

This is better:
```php
function get_content_width() { ... }
function set_content_width() { ... }
```

Or for classes:
```php
$content = new ThemeContent();
$width   = $content->width->get();
```
