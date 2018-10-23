<?php
/**
 * Displays the title of a component.
 *
 * Notes:
 * * `<h3 hidden>` is invalid. `<h3 class="hidden">` has to be used instead.
 *
 * @link https://validator.w3.org/nu/ The W3C validator and outliner.
 *
 * @package MoTheme
 * @since 1.0.0
 */

$mo = new Mo_Theme_Base();

$component_title_query_vars = $mo->get_query_var(
	array(
		'name'     => 'component-title-query-vars',
		'defaults' => array(
			'klass' => 'hidden',
			'title' => 'Component title',
		),
	)
);

$component_title_klass = $component_title_query_vars['klass'];
$component_title_text  = $component_title_query_vars['title'];
?>

<h3 class="<?php echo esc_attr( $component_title_klass ); ?>">
	<?php echo esc_html( $component_title_text ); ?>
</h3>
