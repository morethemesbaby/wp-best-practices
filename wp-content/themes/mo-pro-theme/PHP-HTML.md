# PHP and HTML Best practices

By definition `Mo Pro Theme` extends `Mo Theme` and uses `Mo Plugin` by:

1. Displaying the shortcode added by the `Mo Plugin`.
2. Extending the homepage from `Mo Theme` by adding a sidebar.
3. Displaying a widget in the sidebar with custom post types added by the `Mo Plugin`.

These features, and only these features are present in this child theme:

1. Displaying the shortcode is done with [CSS](CSS.md) and a new template part for the `book` post type:
```bash
.
└── post-list
    └── post-list-with-external-query.php
```
2. Adding sidebar is done in `homep.php`
3. Displaying the widget is done is `/includes`:
```bash
.
├── class-moprotheme-setup.php
└── theme-functionalities
    ├── class-moprotheme-custom-widget.php
    └── class-moprotheme-functionalities.php
```
