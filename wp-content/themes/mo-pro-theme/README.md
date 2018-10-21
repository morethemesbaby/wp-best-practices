# Mo Pro Theme

A child theme of the `Mo Theme` using the `Mo Plugin` functionalities.

## Best practices

* [Decoupled from the plugin](https://github.com/morethemesbaby/wp-best-practices/blob/master/wp-content/plugins/mo-plugin/PHP.md#decouple-plugin-and-theme-using-add_theme_support)
* Extendable

## How it works?

1. Displays the shortcode added by the `Mo Plugin`.
2. Extends the homepage from `Mo Theme` by adding a sidebar.
3. Displays a widget in the sidebar with custom post types added by the `Mo Plugin`.

### Shortcode

Displaying the shortcode is done with a new template part for the `book` post type:
```bash
.
└── post-list
    └── post-list-with-external-query.php
```

### Sidebar

Adding the sidebar is done in `homep.php` by overwriting the old one:

```php
<section <?php $component->attributes->display( $attributes ); ?>>
	<?php
		$component->title->display( $title );
		get_template_part( 'template-parts/post-list/post-list', '' );
	?>
</section>

<?php
get_sidebar( 'sidebar-1' );
get_footer();
```

### Widget

Displaying the widget is done with a new class `/includes`:
```bash
.
├── class-moprotheme-setup.php
└── theme-functionalities
    ├── class-moprotheme-custom-widget.php
    └── class-moprotheme-functionalities.php
```

### CSS

In the same way like in the case of PHP / HTML code the child theme overwrites / extends the parent theme only with what's necessary.

The structure of the `scss` folder is:
```bash
.
└── parts
    ├── content
    │   └── content.scss
    ├── post-content
    │   └── post-content.scss
    └── sidebar
        └── sidebar.scss
```

* `content.scss` adds the `sidebar` entry.
* `post-content.scss` styles the shortcode.
* `sidebar.scss` styles the widget and the sidebar.
