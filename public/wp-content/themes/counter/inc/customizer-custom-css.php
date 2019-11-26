<?php
/**
 * Counter Custom CSS
 *
 * @package Counter
 */

/**
 * Register color schemes for Counter.
 *
 * Can be filtered with {@see 'counter_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 0. Body Background
 * 1. Accent
 * 2. Headings
 * 3. Text
 * 4. Light Text
 *
 * @since Twenty Fifteen 1.0
 *
 * @return array An associative array of color scheme options.
 */
function counter_get_color_schemes() {
	return apply_filters( 'counter_color_schemes', array(
		'default' => array(
			'label'  => _x( 'Default', 'Color scheme', 'counter' ),
			'colors' => array(
				'#ffffff',
				'#d17d38',
				'#1e1e1e',
				'#555555',
				'#e6e6e6',
			),
		),
		'dark' => array(
			'label'  => _x( 'Dark', 'Color scheme', 'counter' ),
			'colors' => array(
				'#303030',
				'#d17d38',
				'#ffffff',
				'#d1d1d1',
				'#f8f8f8',
			),
		),
	) );
}

/**
 * Returns site color scheme.
 *
 * If passed 'actual' as a parameter, will return the actual color scheme of
 * of the website. That is the scheme stored in a database. Can return one of
 * standard color schemes defined by counter_get_color_schemes().
 *
 * @param  string $scheme_name The name of the scheme to return.
 * @return array               Multidimensional array of color values in HEX.
 */
function counter_get_color_scheme( $scheme_name = '' ) {

	// Get all standard color scheme.
	$schemes = counter_get_color_schemes();

	// Get default color scheme.
	$default = $schemes['default']['colors'];

	// If scheme name is not defined, try to get it from database.
	$scheme_name = $scheme_name ? $scheme_name : get_theme_mod( 'color_scheme', 'default' );

	// If we need actual scheme, defined by user.
	if ( 'actual' === $scheme_name ) {

		// Try to get the values from the database.
		$scheme[0] = get_theme_mod( 'color_bg', false );
		$scheme[1] = get_theme_mod( 'color_accent', false );
		$scheme[2] = get_theme_mod( 'color_headings', false );
		$scheme[3] = get_theme_mod( 'color_text', false );

		// We don't need to output the CSS if the values we get equal to the
		// defult color scheme. So filter them out.
		$scheme[0] = $default[0] !== $scheme[0] ? $scheme[0] : false;
		$scheme[1] = $default[1] !== $scheme[1] ? $scheme[1] : false;
		$scheme[2] = $default[2] !== $scheme[2] ? $scheme[2] : false;
		$scheme[3] = $default[3] !== $scheme[3] ? $scheme[3] : false;

		// Generate light text color if custom text color is set.
		$scheme[4] = $scheme[3] ? vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.15 )', counter_hex2rgb( $scheme[3] ) ) : false;

		// Return the scheme.
		return $scheme;
	}

	// If this color scheme exists assign it to $scheme variable.
	if ( array_key_exists( $scheme_name, $schemes ) ) {
		$scheme = $schemes[ $scheme_name ]['colors'];
	} else {
		$scheme = $default;
	}

	// Return the scheme.
	return $scheme;
}

/**
 * Returns an array of color scheme choices registered for Counter.
 */
function counter_get_color_scheme_choices() {
	$color_schemes                = counter_get_color_schemes();
	$color_scheme_control_options = array();

	foreach ( $color_schemes as $color_scheme => $value ) {
		$color_scheme_control_options[ $color_scheme ] = $value['label'];
	}

	return $color_scheme_control_options;
}

/**
 * Returns CSS for the color schemes.
 *
 * @param array $colors Color scheme colors.
 *
 * @return string Color scheme CSS.
 */
function counter_get_color_scheme_css( $colors = array() ) {

$css = '';

/*
 * Site Background.
 * ========================================================================= *
 */
if ( $colors[0] ) :

$css .= <<<CSS
/* Site background */
.site,
.main-navigation,
.menu-toggle,
.menu-toggle:hover,
.menu-toggle:focus,
.main-navigation,
.main-navigation ul ul,
.post-navigation .nav-link,
.lead-dots span:first-child,
.lead-dots span + span {
    background-color: {$colors[0]};
}

CSS;
endif;

/*
 * Accent Color.
 * ========================================================================= *
 */
if ( $colors[1] ) :

$css .= <<<CSS
/* Accent color */
a,
a:hover,
a:active,
a:focus,
.main-navigation a:hover,
.main-navigation a:focus,
.main-navigation a:active
{
	color: {$colors[1]};
}

.btn.btn-accent,
#content .mejs-time-current {
	background-color: {$colors[1]};
}

.btn.btn-accent,
input[type='text']:focus,
input[type='email']:focus,
input[type='url']:focus,
input[type='password']:focus,
input[type='search']:focus,
input[type='date']:focus,
input[type='datetime']:focus,
input[type='datetime-local']:focus,
input[type='month']:focus,
input[type='time']:focus,
input[type='week']:focus,
input[type='number']:focus,
input[type='tel']:focus,
textarea:focus
{
	border-color: {$colors[1]};
}

CSS;
endif;

/*
 * Headings.
 * ========================================================================= *
 */
if ( $colors[2] ) :

$css .= <<<CSS
/* Headings */
h1,
h2,
h3,
h4,
h5,
h6,
.dropcap,
.site-title a,
.site-description,
.entry-title a
{
	color: {$colors[2]};
}

.menu-toggle.toggled .menu-toggle-icon:before,
.menu-toggle.toggled .menu-toggle-icon:after,
.menu-toggle-icon,
.menu-toggle-icon:before,
.menu-toggle-icon:after,
.posts-navigation .nav-previous a,
.posts-navigation .nav-next a
{
	background-color: {$colors[2]};
}

.posts-navigation .nav-previous a,
.posts-navigation .nav-next a
{
	border-color: {$colors[2]};
}

CSS;
endif;

/*
 * Text.
 * ========================================================================= *
 */
if ( $colors[3] ) :

// Text color. Placeholders only work as separate selectors!!!
$css .= <<<CSS
/* Text color */
body,
mark,
ins,
input[type='text'],
input[type='email'],
input[type='url'],
input[type='password'],
input[type='search'],
input[type='date'],
input[type='datetime'],
input[type='datetime-local'],
input[type='month'],
input[type='time'],
input[type='week'],
input[type='number'],
input[type='tel'],
textarea,
.main-navigation a,
.menu-social-container a:before,
.entry-meta-item,
.entry-meta-item a,
.wpcf7 .placeheld,
.post-navigation .nav-link a:before,
.post-navigation .nav-link a:hover
{
	color: {$colors[3]};
}

.wpcf7 .ajax-loader
{
	background-color: {$colors[3]};
}

::-webkit-input-placeholder { color: {$colors[3]}; }
::-moz-placeholder          { color: {$colors[3]}; }/* Firefox 19+ */
:-moz-placeholder           { color: {$colors[3]}; }/* Firefox 18- */
input:-ms-input-placeholder { color: {$colors[3]}; }

CSS;
endif;

/*
 * Light Text.
 * ========================================================================= *
 */
if ( $colors[4] ) :

$css .= <<<CSS
mark,
ins,
thead th,
code,
hr,
#content .wp-playlist-playing,
.pingback .comment-body
{
	background-color: {$colors[4]};
}

fieldset,
input[type='text'],
input[type='email'],
input[type='url'],
input[type='password'],
input[type='search'],
input[type='date'],
input[type='datetime'],
input[type='datetime-local'],
input[type='month'],
input[type='time'],
input[type='week'],
input[type='number'],
input[type='tel'],
textarea,
.widget-area .widget,
.post-navigation .nav-link
{
	border-color: {$colors[4]};
}

#content .wp-playlist-tracks,
.site-info,
.comment-list,
.site-footer-widgets
{
	border-top-color: {$colors[4]};
}

td,
th,
#content .wp-playlist-item,
.site-header,
.main-navigation,
.comment-body,
.widget.widget_recent_comments li,
.widget.widget_recent_entries li,
.widget.widget_rss li,
.panel
{
	border-bottom-color: {$colors[4]};
}

.main-navigation ul ul
{
	outline-color: {$colors[4]};
}

CSS;
endif;

// Phew. Looks like this is it.
return $css;

}

/**
 * Return an Underscore template for generating CSS for the color scheme.
 *
 * The template generates the css dynamically for instant display in the
 * Customizer preview.
 */
function counter_color_scheme_css_template() {
	$scheme = array(
		'{{ data.color_bg }}',
		'{{ data.color_accent }}',
		'{{ data.color_headings }}',
		'{{ data.color_text }}',
		'{{ data.color_text_light }}',
	);

	// Build color scheme for panels.
	for ( $i = 1; $i <= counter_get_panel_count(); $i++ ) {
		$scheme[5][ $i ] = array(
			'{{ data.panel_color_bg_' . $i . ' }}',
			'{{ data.panel_color_accent_' . $i . ' }}',
			'{{ data.panel_color_headings_' . $i . ' }}',
			'{{ data.panel_color_text_' . $i . ' }}',
			'{{ data.panel_color_text_light_' . $i . ' }}',
		);
	}
	?>
	<script type="text/html" id="tmpl-counter-color-scheme">
		<?php echo counter_get_color_scheme_css( $scheme ); // WPCS: XSS OK. ?>
	</script>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'counter_color_scheme_css_template' );

/**
 * Adds inline CSS with custom CSS.
 */
function counter_color_scheme_css() {
	wp_add_inline_style( 'counter-style', counter_get_color_scheme_css( counter_get_color_scheme( 'actual' ) ) );
}
add_action( 'wp_enqueue_scripts', 'counter_color_scheme_css', 11 );
