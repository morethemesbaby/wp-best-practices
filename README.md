<div style="width:100%;display:flex;justify-content:space-around;alig-items:center;">
<img align="right" src="https://morethemes.baby/wp-content/uploads/2018/02/morethemesbaby-logo-transparent.png" title="More Themes Logo" width="100" height="100">
<img align="right" src="https://s.w.org/style/images/about/WordPress-logotype-simplified.png" title="WordPress logo" width="95" height="95">
</div>

# WordPress best practices

Boilerplate code for WordPress plugins and themes based on best practices.

## What's inside

1. A WordPress.org compatible theme: [Mo Theme](wp-content/themes/mo-theme)
2. A WordPress.org compatible plugin: [Mo Plugin](wp-content/plugins/mo-plugin)
3. A child theme using the plugin: [Mo Pro Theme](wp-content/themes/mo-pro-theme)

## How it works

* `Mo Theme` simply displays posts and comments as required by the WordPress.org theme store.
* `Mo Plugin` adds a custom post type together with a shortcode.
* `Mo Pro Theme` extends the `Mo Theme` with: 
	* Displaying the shortcode added by the `Mo Plugin`.
	* Overwriting the homepage from `Mo Theme` by adding a sidebar.
	* Displaying in the sidebar a widget with custom post types added by the `Mo Plugin`. 

## Features

* Default WordPress theme files organization.
* Class based namespaces.
* Optimized and cached queries.
* Reusable and extendable components.
* Decoupled yet interactive parts.
* Documentation.

## Inspiration

* The WordPress Theme and Plugin Handbook: https://developer.wordpress.org/
* 10up Engineering Best Practices: https://10up.github.io/Engineering-Best-Practices/
* A List Apart's Coding With Clarity: https://alistapart.com/article/coding-with-clarity
* Codular on PHP Classes: http://codular.com/introducing-php-classes
