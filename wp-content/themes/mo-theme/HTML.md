# HTML Principles

## Preserve WordPress theme files organization

WordPress has [a clear indication](https://developer.wordpress.org/themes/basics/organizing-theme-files/) how to organize templates, template parts and template tags.

To keep the theme developer friendly this structure is used instead of reinventing the wheel.

## Semantic and outlined

The HTML source and outline is validated with the [W3C validator](https://validator.w3.org/nu/)


## Extendable

Use `apply_filters()` and `get_template_part()` extensively. They both can be overwritten in child themes.

Filters must be used when a piece of *data* has to be made extendable / customizable. When something is set up (class, variable) or a small content chunk is displayed (the classname of an element, for example.)
Filters receive data, modify data, and return data.

Template parts must be used when large monolithic HTML code is split into small components.

Example:
```
<header <?php apply_filters( 'mo_theme_header_attributes', $component->attributes->display( ... ) ); ?>>
	<?php get_template_part( 'template-parts/header/parts/header', 'image' ); ?>
	<?php get_template_part( 'template-parts/header/parts/header', 'logo' ); ?>
	<?php get_template_part( 'template-parts/header/parts/header', 'title' ); ?>
</header>
```

Actions are [more abstract].(https://blog.teamtreehouse.com/hooks-wordpress-actions-filters-examples)They deal with *code*. Use them to let others insert code into your own code.

The problem with actions is that you don't known apriori where others would like to insert their code. 

You can add a `before` and `after` action for every element on your webpage (logo, header, content, footer, post list, article title, ...) and still you can't make everybody happy.

## Keep as much HTML code as possible

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

As a corollary, when a HTML code chunk is often used and reused, refactoring it into PHP code is highly recommended.

This is better:
```
<?php $components->link->display( array( 'url' => ..., 'title' => ...) ); ?>
```

Than this:
```
<a class="link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo bloginfo( 'name' ); ?>">
	<span class="text">
		<?php bloginfo( 'name' ); ?>
	</span>
</a>
```

## Use `sprintf` instead of nested `echo`

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

## Consistent naming

HTML class names and identifiers, template part names, and template tags are stable and consistent. 

One can easily find all related code to a component.

For the `header.php` template there is a `template-parts/header/header.php`, an `includes/template-tags/class-header.php` and an `assets/scss/parts/header.scss` file or folder.

To achieve this consistency class names, element identifiers of a component are generated instead of being added manually. Manual work is a bug. [Always be automating](https://morethemes.baby/2018/04/05/manual-work-is-a-bug-always-be-automating-a-b-a/).

The format follows the [BEM standard](http://getbem.com/introduction/) with a small modification: instead of `block__element--modifier` we use `block-element--modifier`.

This can be re-configured if your project is huge. For usual WorPress projects this change enhances readability. There will be less nesting, more folders and better transparency.

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