# CSS Best practices

In the same way like in the case of [PHP / HTML](PHP-HTML.md) code the child theme overwrites / extends the parent theme only with what's necessary.

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

The child theme adds two additional functionalities to the parent theme: displays a shortcode inside a post and a widget in the sidebar.

* In `content.scss` we add the `sidebar` entry.
* In `post-content.scss` we style the shortcode.
* In `sidebar.scss` we style the widget and the sidebar.