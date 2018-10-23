<div style="width:100%;display:flex;justify-content:space-around;alig-items:center;">
<img align="right" src="https://morethemes.baby/wp-content/uploads/2018/02/morethemesbaby-logo-transparent.png" title="More Themes Logo" width="100" height="100">
<img align="right" src="https://s.w.org/style/images/about/WordPress-logotype-simplified.png" title="WordPress logo" width="95" height="95">
</div>

# WordPress best practices

Boilerplate code for WordPress plugins and themes based on best practices.

## What's inside

1. A WordPress.org compatible theme: [Mo Theme](wp-content/themes/mo-theme).
2. A WordPress.org 'compatible' plugin: [Mo Plugin](wp-content/plugins/mo-plugin).
3. A child theme using the plugin: [Mo Pro Theme](wp-content/themes/mo-pro-theme).

## How it works

* `Mo Theme` simply displays posts and comments as required by the WordPress.org theme store without styling.
* `Mo Plugin` adds a custom post type together with a shortcode.
* `Mo Pro Theme` extends `Mo Theme` and uses `Mo Plugin`:
	* Displays the shortcode added by the `Mo Plugin`.
	* Extends the homepage from `Mo Theme` by adding a sidebar.
	* Displays a widget in the sidebar with custom post types added by the `Mo Plugin`.

## Why another boilerplate?

The answer is two fold.

### There is no official alternative

WordPress has no such thing like this. They provide boilerplate themes but no plugins, no child themes, and no integration between. And their boilerplate theme is not class based, as they suggest as a best practice in the Theme Developer Handbook.

Others perhaps have such a combo or maybe not. One of the best WordPress agencies 10up has nothing like this in their public Github repository.

Even if other shops have &mdash; finding it, learning it, mixing it with best practices from another shop might be more time consuming than this *learning by doing* approach.

### Components

Components are a web development best practice (see Google Material Design) not yet adapted by WordPress.

More Theme Baby has an [award winning](http://brutalistwebsites.com/metamn.io_gust/) framework-agnostic component set  which should work with WordPress too when WordPress follows the component model.

## Best practices

* Default WordPress files organization
* Class based namespaces
* Components
* Loose coupling
* Single responsibility principle
* Optimized database operations
* Documentation
* Testing (Work in progress)

For details please check each theme's and the plugin's `README.md`.

## Inspiration

* The WordPress Theme and Plugin Handbook: https://developer.wordpress.org/
* 10up Engineering Best Practices: https://10up.github.io/Engineering-Best-Practices/
* A List Apart's Coding With Clarity: https://alistapart.com/article/coding-with-clarity
* Codular on PHP Classes: http://codular.com/introducing-php-classes
