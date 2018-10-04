# HTML Principles

## Preserve WordPress theme files organization

WordPress has [a clear indication](https://developer.wordpress.org/themes/basics/organizing-theme-files/) how to organize templates, template parts and template tags.

To keep the theme developer friendly instead of reinventing the wheel.

## Components

HTML defines the structure of the page. It should define also the structure of the code. 

For example if a page has a `<header class="site-header>` structural element (component) developers should be able to easily realize where the PHP, HTML, and CSS code responsible for this element is located.

There should be a:

* `template-parts/site-header/site-header.php` template part for HTML code
* `includes/template-tags/class-site-header.php` template tag for PHP code, and
* `assets/scss/parts/site-header.scss` for (S)CSS code.

### Generated classnames

To achieve this consistency component class names and element identifiers are generated instead of being added manually. Manual work is a bug. [Always be automating](https://morethemes.baby/2018/04/05/manual-work-is-a-bug-always-be-automating-a-b-a/).

Manually we can make mistakes:
```
```

### Naming conventions

Follow the [BEM standard](http://getbem.com/introduction/) with a small modification: instead of `block__element--modifier` use `block-element--modifier`.

For usual WorPress projects this change enhances readability. There will be less nesting, more folders and better transparency.

Instead of:
```
block
|. __element
|.. --modifier-for-element
|. --modifier-for-block
```

We have:
```
block
|. --modifier-for-block
block-element
|. --modifier-for-element
```

## Extendable

Use `apply_filters()` and `get_template_part()` extensively. They both can be overwritten in child themes.

### Filters

Filters receive data, modify data, and return data. They must be used when a piece of *data* has to be made extendable / customizable.

Since it is easy to add a filter it is recommended to be used as often as possible.

Example: (in theme)
```
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
```
add_filter( 'mo_theme_post_excerpt_attributes', ''mo_theme_post_excerpt_attributes_filter' );

function mo_theme_post_excerpt_attributes_filter() {
	return array(
		'block'    => 'post-new-classname',
		'element'  => 'excerpt-new-classname',
	);
}
```

### Template parts

It fails silently: If the theme contains no {slug}.php file then no template will be included.

### Actions

Actions are [more abstract](https://blog.teamtreehouse.com/hooks-wordpress-actions-filters-examples). They deal with *code* instead of data. They are used to let others insert code into an existing codebase.

The problem with actions is that you don't known apriori where others would like to insert their code. 

You can add a `before` and `after` action for every element on your webpage (logo, header, content, footer, post list, article title, ...) and still you can't make everybody happy.

## Don't replace HTML code with PHP code

There is a tendency to get rid of HTML code in template parts. And use more PHP code instead.

This is wrong:
```
Hybrid\View\display( 'index' );
```

This is better:
```
<section class="home">
	<h3 class="hidden">Homepage</h3>

	<?php get_template_part( 'template-parts/post-list/post-list', 'with-comments' ); ?>
</section>
```

## Replace ugly HTML code with PHP code

This is ugly:
```
<a class="link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo bloginfo( 'name' ); ?>">
	<span class="text">
		<?php bloginfo( 'name' ); ?>
	</span>
</a>
```

This is better:
```
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

