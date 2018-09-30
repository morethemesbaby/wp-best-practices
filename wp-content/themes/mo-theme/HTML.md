# HTML Principles

## Preserve WordPress theme files organization

WordPress has [a clear indication](https://developer.wordpress.org/themes/basics/organizing-theme-files/) how to organize templates, template parts and template tags.

To keep the theme developer friendly this structure is used instead of reinventing the wheel.

## Extendable

Use `apply_filters()` and `get_template_part()` extensively. They both can be overwritten in child themes.

Example:
```
<header <?php apply_filters( 'mo_theme_header_attributes', $component->attributes->display( ... ) ); ?>>
	<?php get_template_part( 'template-parts/header/parts/header', 'image' ); ?>
	<?php get_template_part( 'template-parts/header/parts/header', 'logo' ); ?>
	<?php get_template_part( 'template-parts/header/parts/header', 'title' ); ?>
</header>
```

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

This is not recommended:
```
<a class="link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo bloginfo( 'name' ); ?>">
	<span class="text">
		<?php bloginfo( 'name' ); ?>
	</span>
</a>
```

This is better:
```
<?php $components->link->display( array( 'url' => ..., 'title' => ...) ); ?>
```

Refactor often used HTML code into PHP otherwise keep as much HTML code as possible.

## Semantic and outlined

The HTML source and outline is validated with the [W3C validator](https://validator.w3.org/nu/)

## Consistent naming

HTML class names and identifiers, template part names, and template tags are stable and consistent. 

One can easily find all related code to a component.

For the `header.php` template there is a `template-parts/header/header.php`, an `includes/template-tags/class-header.php` and an `assets/scss/parts/header.scss` file or folder.

### HTML element attributes are generated

Every class name, element identifier, data attribute is generated instead of being added manually. Manual work is a bug. [Always be automating](https://morethemes.baby/2018/04/05/manual-work-is-a-bug-always-be-automating-a-b-a/).

The format follows the [BEM standard](http://getbem.com/introduction/) with a small cosmetic modification.

Instead of `block__element--modifier` we use `block-element--modifier` for the sake of readability. (However this can be configured)

This also makes the SCSS folder structure more straightforward.

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