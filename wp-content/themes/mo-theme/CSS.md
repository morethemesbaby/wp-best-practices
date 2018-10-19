# CSS Best practices

## Standards

Instead of plain CSS the [SCSS](http://sass-lang.com/) [best practice](https://morethemes.baby/2018/05/12/more-themes-baby-is-in-the-loop/) is used. SCSS is CSS with superpowers.

To comply with the [site-wide Component architecture](https://github.com/morethemesbaby/wp-best-practices/blob/master/wp-content/themes/mo-theme/HTML.md#components) SCSS class names follow the [BEM](http://getbem.com/) syntax.

Moreover the SCSS folder structure follows an old BEM recommendation:

* `framework` is a set of SCSS mixins reused across many different projects.
* `pages` is a set of mixins related to the pages of the site.
* `parts` is a set of mixins related to the components of the site.
* `themes` is a set of configuration files defining colors, fonts, vertical rhythm — anything describing how the theme looks.

## Coupling

All these *practices* above are meant to help developers easily locate and modify code. If there is a HTML class then it should be a same name SCSS mixin.

For example, if in the browser's web inspector we have a `<body class="home">` then we should have an `scss/pages/home.scss` mixin. For a `<header class="header">` we should have a `scss/parts/header.scss` mixin.

Beside this HTML / SCSS coupling we also have PHP coupling. For `home` we have a `home.php` template. For `header` we have a `template-parts/header/header.php` template part. 