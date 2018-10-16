# HTML Best Practices

* [Default WordPress theme files organization](#default-wordpress-theme-files-organization)
* [Components](#components)
	* [Auto-generated classnames](#auto-generated-classnames)
	* [BEM naming conventions](#bem-naming-conventions)
* [Extendable](#extendable)
	* [Filters](#filters)
	* [Template parts](#template-parts)
	* [Actions](#actions)
* [Don't replace HTML code with PHP code](#dont-replace-html-code-with-php-code)
* [Replace ugly HTML code with PHP code](#replace-ugly-html-code-with-php-code)
* [Semantic and outlined](#semantic-and-outlined)


## Default WordPress theme files organization

WordPress has [a clear indication](https://developer.wordpress.org/themes/basics/organizing-theme-files/) how to organize templates, template parts and template tags.

To keep the theme developer friendly stick to this standard instead of reinventing the wheel.

## Components

HTML defines the structure of the page. It should define also the structure of the code. 

For example if a page has a `<header class="site-header>` structural element (component) developers should be able to easily realize where the PHP, HTML, and CSS code responsible for this element is located.

There should be a:

* `template-parts/site-header/site-header.php` template part for HTML code
* `includes/template-tags/class-site-header.php` template tag for PHP code, and
* `assets/scss/parts/site-header.scss` for (S)CSS code.

### Auto-generated classnames

To achieve this consistency component class names and element identifiers are generated instead of being added manually. [Manual work is a bug. Always be automating](https://morethemes.baby/2018/04/05/manual-work-is-a-bug-always-be-automating-a-b-a/).

Manually we can make mistakes:
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

Follow the [BEM standard](http://getbem.com/introduction/) with a small modification: instead of `block__element--modifier` use `block-element--modifier`.

For usual WorPress projects this change enhances readability. There will be less nesting, more folders and better transparency.

Instead of:
```shell
block
|. __element
|.. --modifier-for-element
|. --modifier-for-block
```

We have:
```shell
block
|. --modifier-for-block
block-element
|. --modifier-for-element
```

If this is not working the original BEM method can be switched on:
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
	'element_prefix'          => '-',
	'modifier_prefix'         => '--',
	...
);
```

## Extendable

Use `apply_filters()` and `get_template_part()` extensively. They both can be overwritten in child themes.

### Filters

Filters receive data, modify data, and return data. They must be used when a piece of *data* has to be made extendable / customizable.

Since it is easy to add a filter it is recommended to be used as often as possible.

Example: (in theme)
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

They are like mixins or partials in other coding framework. They do one small thing and they do it well. They are combined and reused freely to compose the user interface.

Template parts can be easily overwritten in child themes. If you have a `header.php` in your child theme it will overwrite the same template from the main theme.

### Actions

Actions are [more abstract](https://blog.teamtreehouse.com/hooks-wordpress-actions-filters-examples). They deal with *code* instead of data. They are used to let others insert code into an existing codebase.

The problem with actions is that you don't known apriori where others would like to insert their code. 

You can add a `before` and `after` action for every element on your webpage (logo, header, content, footer, post list, article title, ...) and still you can't make everybody happy.

In this theme actions are used only when there is a concrete need for them. We don't insert empty actions hoping they will be reused later.

## Don't replace HTML code with PHP code

There is a tendency to get rid of HTML code in template parts. And use more PHP code instead.

This is wrong:
```php
Hybrid\View\display( 'index' );
```

This is better:
```html
<section class="home">
	<h3 class="hidden">Homepage</h3>

	<?php get_template_part( 'template-parts/post-list/post-list', 'with-comments' ); ?>
</section>
```

## Replace ugly HTML code with PHP code

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

## Semantic and outlined

The HTML source and outline is validated with the [W3C validator](https://validator.w3.org/nu/)

