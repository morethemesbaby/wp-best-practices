# CSS Best practices

## SCSS and BEM

Instead of plain CSS the [SCSS](http://sass-lang.com/) [best practice](https://morethemes.baby/2018/05/12/more-themes-baby-is-in-the-loop/) is used. SCSS is CSS with superpowers.

To comply with the [site-wide Component architecture](https://github.com/morethemesbaby/wp-best-practices/blob/master/wp-content/themes/mo-theme/HTML.md#components) SCSS class names follow the [BEM](http://getbem.com/) syntax.

The SCSS folder structure follows an old BEM recommendation:

* `framework` is a set of SCSS mixins reused across many different projects.
* `pages` is a set of mixins related to the pages of the site.
* `parts` is a set of mixins related to the components of the site.
* `themes` is a set of configuration files defining colors, fonts, vertical rhythm — anything describing how the theme looks.

## Coupled with HTML and PHP

All these *practices* above are meant to help developers easily locate and modify code. If there is a HTML class then it should be a same name SCSS mixin.

For example, if in the browser's web inspector there is a `<body class="home">` then there should be an `scss/pages/home.scss` mixin. For a `<header class="header">` there should be a `scss/parts/header.scss` mixin.

Beside this HTML / SCSS coupling there is also PHP coupling. For `<body class="home">` there is a `home.php` template. For `<header class="header">` there is a `template-parts/header/header.php` template part.
