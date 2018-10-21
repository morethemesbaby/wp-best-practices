# HTML Best Practices

* [Default WordPress theme files organization](#default-wordpress-theme-files-organization)
* [Components](#components)
	* [Auto-generated classnames](#auto-generated-classnames)
	* [BEM naming conventions](#bem-naming-conventions)
* [Extendable](#extendable)
	* [Filters](#filters)
	* [Template parts](#template-parts)
	* [Actions](#actions)
* [Single responsibility principle](#single-responsibility-principle)
	* [Don't replace HTML code with PHP code](#dont-replace-html-code-with-php-code)
	* [Replace ugly HTML code with PHP code](#replace-ugly-html-code-with-php-code)
* [Semantic and outlined](#semantic-and-outlined)



## Default WordPress theme files organization

WordPress has [a clear indication](https://developer.wordpress.org/themes/basics/organizing-theme-files/) how to organize templates, template parts and template tags.

To keep the theme developer friendly stick to this standard instead of reinventing the wheel.

## Components

Components are a way to organize code in such way developers can immediately realize where to look for a specific code part.

For example if a page has a `<header class="site-header">` structural element (a.k.a component) developers should be able to easily realize where the PHP, HTML, and CSS code responsible for this element is located.

There should be a:

* `template-parts/site-header/site-header.php` template part for HTML code
* `includes/template-tags/class-site-header.php` template tag for PHP code, and
* `assets/scss/parts/site-header.scss` for (S)CSS code.

When using components everything starts with HTML. Without HTML there is no need for PHP and CSS code.

HTML defines the structure of the page and the components building it. Uses class names to accomplish that. If class names are cleverly and intuitively set they can enable a component architecture.  

### Auto-generated classnames

To achieve consistency component class names and element identifiers are generated instead of being added manually. [Manual work is a bug. Always be automating](https://morethemes.baby/2018/04/05/manual-work-is-a-bug-always-be-automating-a-b-a/).

Manually one can make mistakes:
```html
<aside class="non-consistent-naming">
```

With an algorithm is harder:
```php
$attributes = array(
		'block'    => 'post',
		'element'  => 'excerpt',
	);

<aside <?php $component->attributes->display( $attributes ); ?>>
```

### BEM naming conventions

[BEM](http://getbem.com/introduction/) is a naming convention for components.

Here it is used with a small modification: instead of `block__element--modifier` there is `block-element--modifier`.

For usual WorPress projects this change enhances readability. There will be less folder nesting. More main folders provide better visibility.

Instead of:
```shell
block
|. __element
|.. --modifier-for-element
|. --modifier-for-block
```

There is:
```shell
block
|. --modifier-for-block
block-element
|. --modifier-for-element
```

If this is not the preferred way to work the original BEM naming syntax can be easily restored:
```php
class MoThemeHTMLComponentAttributes extends MoThemeHTMLComponent {
/**
 * Class arguments.
 *
 * Used to setup the class.
 *
 * @since 1.0.0
 *
 * @var array An array of arguments.
*/
public $arguments = array(
	...
	'element_prefix'  => '-',
	'modifier_prefix' => '--',
	...
);
```

More examples can be found in [CSS.md](CSS.md)

## Extendable

Use `apply_filters()` and `get_template_part()` extensively. They both can be overwritten in child themes.

### Filters

Filters receive data, modify data, and return data. They must be used when a piece of *data* has to be made extendable / customizable.

Since it is easy to add a filter it is recommended to be used as often as possible.

In parent theme:
```html
$attributes = apply_filters(
	'mo_theme_post_excerpt_attributes',
	array(
		'block'    => 'post',
		'element'  => 'excerpt',
	)
);

<aside <?php $component->attributes->display( $attributes ); ?>>
	<div>
		<?php the_excerpt(); ?>
	</div>
</aside>
```

In child theme:
```php
add_filter( 'mo_theme_post_excerpt_attributes', 'mo_theme_post_excerpt_attributes_filter' );

function mo_theme_post_excerpt_attributes_filter() {
	return array(
		'block'    => 'post-new-classname',
		'element'  => 'excerpt-new-classname',
	);
}
```

### Template parts

They are like mixins or partials in other coding frameworks. They do one small thing and they do it well. They are combined and reused freely to compose the user interface.

Template parts can be easily overwritten in child themes. A `home.php` in child theme will overwrite the same name template from the main theme.

`home.php` in the parent theme:
```php
<section <?php $component->attributes->display( $attributes ); ?>>
	<?php
		$component->title->display( $title );
		get_template_part( 'template-parts/post-list/post-list', '' );
	?>
</section>

<?php
get_footer();
```

`home.php` in the child theme:
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

In the child theme a sidebar is added which is not present in the parent theme.


### Actions

Actions are [more abstract](https://blog.teamtreehouse.com/hooks-wordpress-actions-filters-examples). They deal with *code* instead of data. They are used to let others insert code into an existing codebase.

The problem with actions is that no one knows a priori where others would like to insert their code.

A `before` and `after` action can be added for every element (logo, header, content, footer, post list, article title, ...) and still not everybody will be happy.

In this theme actions are used only when there is a concrete need for them. Empty actions are not inserted hoping they will be reused later.

## Single responsibility principle

### Don't replace HTML code with PHP code

There is a tendency to get rid of HTML code in template parts. And use more PHP code instead.

This is wrong:
```php
Hybrid\View\display( 'index' );
```
* It doesn't give a clue what that `index` template is: a `<section>`, a list (`<ul>`) or something else maybe?
* What is its class name or element id? How it can be located in the browser's web inspector? And how the associated style (CSS) or functionality (PHP) can be located?

This is better:
```html
<section class="home">
	<h3 class="hidden">Homepage</h3>

	<?php get_template_part( 'template-parts/post-list/post-list', 'with-comments' ); ?>
</section>
```
Only those HTML parts are replaced with PHP which are not significant regarding the global component architecture.

### Replace ugly HTML code with PHP code

This is ugly:
```html
<a class="link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo bloginfo( 'name' ); ?>">
	<span class="text">
		<?php bloginfo( 'name' ); ?>
	</span>
</a>
```

This is better:
```php
echo wp_kses_post(
	sprintf(
		'<a class="link" href="%1$s" title="%2$s"><span class="text">%2$s</span></a>',
		esc_url( home_url( '/' ) ),
		get_bloginfo( 'name' )
	)
);
```
No attributes of the link are hidden but made it better understandable and modifiable.

## Semantic and outlined

The HTML source and outline is validated with the [W3C validator](https://validator.w3.org/nu/)

Outlining is very important since it makes the code accessible.

If a site outlines well in the W3C validator it will get a 100% accessibility score in Google Lighthouse: https://imgur.com/a/MYSgMKH
