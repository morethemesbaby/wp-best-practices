# Mo Theme

A [WordPress.org compatible](https://make.wordpress.org/themes/handbook/review/required/) boilerplate theme based on best practices.

## Best practices

* Default WordPress theme files organization
* Class based namespaces
* Components
* Loose coupling
* Single responsibility principle
* Extendable
* Semantic and outlined HTML structure
* Documentation for the PHP API, the templates and template parts

Details:

* [PHP](PHP.md)
* [HTML](HTML.md)
* [CSS](CSS.md)

## Dependencies

* [Node & NPM](https://www.npmjs.com/get-npm) - Used as the framework to build the theme style.
* [Gulp](https://gulpjs.com/) - Used as the task runner, to build CSS from SCSS.
* [Composer](https://getcomposer.org/) - Used to autoload PHP classes.

## Tools

* [PHPDoc](https://phpdoc.org/) - Used to generate documentation for the PHP code.
* [WPCS](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards) - Used to make sure the code quality is up to WordPress standards
* [Theme Sniffer](https://github.com/WPTRT/theme-sniffer) - Used to run tests to verify WordPress coding standards
* [Theme Check](https://github.com/Otto42/theme-check) - Used to run tests to verify all requirements are satisfied to make the theme to be accepted in the WordPress.org theme store.

## Tests

The following tests were all completed manually:

* Theme Sniffer
* Theme Check
* W3C Validator and Outliner

## Commands

### SCSS to CSS

After any modifications to SCSS files run:

```shell
gulp scss
```

### Autoloading PHP classes

After any new class is added run:
```shell
composer dump-autoload
```

### Generating documentation

#### Template tags

For the PHP API documentation (classes) run:
```shell
rm -Rf /tmp/phpdoc-twig-cache/ && phpdoc -d . -t doc/api -i vendor/
```

#### Template parts

For the WordPres template tags and functions documentation run:
```shell
rm -Rf /tmp/phpdoc-twig-cache/ && phpdoc -d . -t doc/template -i vendor/ --template=phpdocumentor-wordpress-theme
```
Make sure the [PHPDocumentor WordPress Theme](https://github.com/morethemesbaby/phpdocumentor-wordpress-theme) is installed first.

#### SCSS

Tbd.

### Checking code quality

#### Command line
```shell
phpcs --standard=WordPress-Docs,WordPress-VIP,WordPress,Wordpress-Core,WordPres
s-Extra <filename or foldername>
```

#### WordPress dashboard

* Run the NS Theme Checker (Theme Sniffer) plugin against all tests except `WordPress VIP`.
* Run the Theme Check plugin. All `REQUIRED` and `RECOMMENDED` errors must be fixed.

## Inspiration

* Storefront theme: https://github.com/woocommerce/storefront
* 10up official starter theme: https://github.com/10up/theme-scaffold
* PHP Documentation standards: https://make.wordpress.org/core/handbook/best-practices/inline-documentation-standards/php/
