<?php
/**
 * Displays a link.
 *
 * @param string $link_url     The URL of the link.
 * @param string $link_title   The title of the link.
 * @param string $link_content The content of the link.
 * @param string $link_klass   The additional class of the link.
 *
 * @package LogLollaTheme
 * @since 1.0.0
 */

if ( empty( $link_url ) ) {
	$link_url = get_query_var( 'link-url' );
}

if ( empty( $link_title ) ) {
	$link_title = get_query_var( 'link-title' );
}

if ( empty( $link_content ) ) {
	$link_content = get_query_var( 'link-content' );
}

if ( empty( $link_klass ) ) {
	$link_klass = get_query_var( 'link-klass' );
}

if ( ! empty( $link_url ) ) {
	?>
	<a class="link <?php echo esc_attr( $link_klass ); ?>" href="<?php echo esc_url( $link_url ); ?>" title="<?php echo esc_attr( $link_title ); ?>">
	<?php
}

echo wp_kses_post( $link_content );

if ( ! empty( $link_url ) ) {
	?>
	</a>
	<?php
}
