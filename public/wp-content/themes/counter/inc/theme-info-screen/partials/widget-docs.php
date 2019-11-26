<?php
/**
 * Docs widget on the theme info screen.
 *
 * @package Counter
 */

?>

<div class="tp-theme-info-sidebar-widget card">
	<h2><?php esc_html_e( 'Have a question?', 'counter' ); ?></h2>
	<p><?php esc_html_e( 'Check out our easy-to-follow articles with screenshots about the theme at ThemePatio knowledge base.', 'counter' ); ?></p>
	<?php
		printf(
			'<p><a href="%s" target="_blank" class="button button-primary">%s</a></p>',
			'https://docs.themepatio.com/counter-getting-started/',
			esc_html__( 'View Docs', 'counter' )
		);
	?>
</div>
