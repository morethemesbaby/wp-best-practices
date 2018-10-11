<div style="width:100%;display:flex;justify-content:space-around;alig-items:center;">
<img align="right" src="https://morethemes.baby/wp-content/uploads/2018/02/morethemesbaby-logo-transparent.png" title="More Themes Logo" width="100" height="100">
<img align="right" src="https://s.w.org/style/images/about/WordPress-logotype-simplified.png" title="WordPress logo" width="95" height="95">
</div>

# WordPress best practices

Boilerplate code for WordPress plugins and themes based on best practices.

## What's inside

1. A WordPress.org compatible theme: [Mo Theme](wp-content/themes/mo-theme)
2. A WordPress.org compatible plugin: [Mo Plugin](wp-content/plugins/mo-plugin) - work in progress.
3. A child theme using the plugin: [Mo Pro Theme](wp-content/themes/mo-pro-theme) - work in progress.

## How it works

* `Mo Theme` simply displays posts and comments as required by the WordPress.org theme store.
* `Mo Plugin` adds a custom post type together with a widget and shortcode.
* `Mo Pro Theme`: 
	* Displays the posts from `Mo Theme`, 
	* Displays the custom posts from `Mo Plugin`, 
	* Displays the widget and the shortcode from `Mo Plugin`, 
	* Overwrites the comments from `Mo Theme`.

## Inspiration

* The WordPress Theme and Plugin Handbook: https://developer.wordpress.org/
* 10up Engineering Best Practices: https://10up.github.io/Engineering-Best-Practices/
* A List Apart's Coding With Clarity: https://alistapart.com/article/coding-with-clarity
* Codular on PHP Classes: http://codular.com/introducing-php-classes
