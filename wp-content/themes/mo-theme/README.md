# Mo Theme

A WordPress.org compatible boilerplate theme based on best practices.

## Features

* Full support for WordPress.org default [functionalities](https://developer.wordpress.org/themes/functionality/) and [customizations](https://developer.wordpress.org/themes/customize-api/)
* [Class based namespaces](https://10up.github.io/Engineering-Best-Practices/php/#design-patterns) for WordPress.org / PHP version <5.3 compatibility

## Principles

See [PRINCIPLES.md](PRINCIPLES.md)

## Dependencies

* [Node & NPM](https://www.npmjs.com/get-npm) - Used as the framework to build the theme style.
* [Gulp](https://gulpjs.com/) - Used as the task runner, to build CSS from SCSS.
* [Composer](https://getcomposer.org/) - Used to autoload PHP classes.

## Tools

* [PHPDoc](https://phpdoc.org/) - Used to generate documentation for the PHP code.
* [WPCS](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards) - Used to make sure the code quality is up to WordPress standards

## Commands

### SCSS to CSS

After any modifications to SCSS files run:

```
gulp scss
```

### Autoloading PHP classes

After any new class added run:
```
composer dump-autoload
```

### Generating documentation
```
rm -Rf /tmp/phpdoc-twig-cache/ && phpdoc -d . -t doc -i vendor/
```

### Checking code quality
```
phpcs --standard=WordPress-Docs,WordPress-VIP,WordPress,Wordpress-Core,WordPres
s-Extra <filename or foldername>
```

## Inspiration

* Storefront theme: https://github.com/woocommerce/storefront
* 10up official starter theme: https://github.com/10up/theme-scaffold
