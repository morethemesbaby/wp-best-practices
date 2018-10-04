# PHP Principles

## Class based namespacing

WordPress supports three techniques to avoid naming collisions:

* Prefixing
* OOP classes
* PHP namespaces

WordPress.org / PHP < 5.2 supports only the first two.

According to [best practices](https://developer.wordpress.org/plugins/the-basics/best-practices/#oop) OOP classes are the easier way to tackle this problem.

## No HTML in PHP code

HTML code belongs to templates and template tags.

When a PHP function needs to return a HTML chunk the [output buffering](https://secure.php.net/manual/en/function.ob-start.php) method with a `get_template_part` call is used. 

This is wrong:
```
function theme_get_arrow_html( $direction ) {
   return '<span class="arrow-with-triangle arrow-with-triangle--' . $direction . '">
 					  	<span class="arrow-with-triangle__line"></span>
 					  	<span class="triangle triangle-- arrow-with-triangle__triangle"></span>
 						</span>';
 }
```

This is better:
```
function theme_get_arrow_html() {
	$arguments = array(
		'query_var_name'     => 'component-title-query-vars',
		'query_var_value'    => $query_vars,
		'template_part_slug' => 'template-parts/html-component/arrow-with-triangle/arrow-with-triangle',
		'template_part_name' => '',
	);

	return get_template_part( $arguments );;
}
```


## Loose coupling

[Loose coupling](https://alistapart.com/article/coding-with-clarity#section3) makes sure components are open, easily modifiable without breaking the code. 

For different types of components different techniques are used.

### Class variables

Class variables are [dynamically set and get](http://codular.com/introducing-php-classes) through overloading / magic methods.

This is not recommended:
```
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

This is better:
```
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
```

### Function arguments

Function arguments are passed as arrays instead of lists of arguments.

This way they can stay open and extendable without the modifications breaking the other functions depending on them.

This is not recommended:
```
function display( $title, $description, $author ) { ... }
```

This is recommended:
```
function display( $arguments = array() ) { ... }
```

### Template variables

Templates are communicating with each other through the `get_template_part` and `set_query_var` / `get_query_var`.

Passing arguments between template parts is done with an array instead of a list of arguments.

This is wrong:
```
set_query_var( 'post-list-title', theme_get_archive_label( 'Posts' ) );
set_query_var( 'post-list-klass', 'for-archive' );
set_query_var( 'post-list-content', theme_get_archive_content() );
get_template_part( 'template-parts/post-list/post-list', '' );
```

This is recommended:
```
$post_list_query_vars = array(
	'title'   => theme_get_archive_label( 'Posts' ),
	'klass'   => 'for-archive',
	'content' => theme_get_archive_content(),
);
set_query_var( 'post-list-query-vars', $post_list_query_vars );
get_template_part( 'template-parts/post-list/post-list', '' );
```

## Command-query separation

Every function either executes a *command* or performs a *query*. No functions do both at the same time.

The role of the function is described by a prefix. Either is a `get_` for a query or another verb for a command like `set_`, `add_`, `create_` and so on.

There should be no functions which have no prefix, except when the prefix is a verb.

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
