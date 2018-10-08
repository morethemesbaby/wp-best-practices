<?php
/**
 * Displays the title of a component.
 *
 * @link https://github.com/metamn/log-lolla/issues/2 The requirement.
 * @link https://validator.w3.org/nu/ The W3C validator / outliner.
 *
 * Notes:
 * * `<h3 hidden>` is invalid. `<h3 class="hidden">` has to be used instead.
 *
 * @param array component_title Argument list.
 *
 * @package MoTheme
 * @since 1.0.0
 */

$mo = new MoThemeBase();

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
