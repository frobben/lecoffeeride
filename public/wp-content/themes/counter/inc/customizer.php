<?php
/**
 * Counter Theme Customizer
 *
 * @package Counter
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function counter_customize_register( $wp_customize ) {
	/**
	 * Site Identity.
	 */
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_text' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'counter_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'counter_customize_partial_blogdescription',
	) );

	/**
	 * Colors.
	 */
	$color_scheme = counter_get_color_scheme();

	// Add color scheme setting and control.
	$wp_customize->add_setting( 'color_scheme', array(
		'default'           => 'default',
		'sanitize_callback' => 'counter_sanitize_color_scheme',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'color_scheme', array(
		'label'    => __( 'Color Scheme', 'counter' ),
		'section'  => 'colors',
		'type'     => 'select',
		'choices'  => counter_get_color_scheme_choices(),
		'priority' => 0,
	) );

	// Background color.
	$wp_customize->add_setting( 'color_bg', array(
		'default'           => $color_scheme[0],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_bg',
			array(
				'label'   => __( 'Background', 'counter' ),
				'section' => 'colors',
				'priority' => 80,
			)
		)
	);

	// Accent Color.
	$wp_customize->add_setting( 'color_accent', array(
		'default'           => $color_scheme[1],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_accent',
			array(
				'label'   => __( 'Accent', 'counter' ),
				'section' => 'colors',
				'priority' => 100,
			)
		)
	);

	// Headings Color.
	$wp_customize->add_setting( 'color_headings', array(
		'default'           => $color_scheme[2],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_headings',
			array(
				'label'   => __( 'Headings', 'counter' ),
				'section' => 'colors',
				'priority' => 120,
			)
		)
	);

	// Text Color.
	$wp_customize->add_setting( 'color_text', array(
		'default'           => $color_scheme[3],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_text',
			array(
				'label'   => __( 'Text', 'counter' ),
				'section' => 'colors',
				'priority' => 140,
			)
		)
	);

	/*
	 * Content Options.
	 */

	// Blog Layout.
	$wp_customize->add_setting( 'blog_layout', array(
		'default' => 'default',
		'sanitize_callback' => 'counter_sanitize_blog_layout',
	) );

	$wp_customize->add_control( 'blog_layout', array(
		'type' => 'select',
		'label' => __( 'Blog Layout', 'counter' ),
		'section' => 'jetpack_content_options',
		'choices' => array(
			'default' => __( 'Default', 'counter' ),
			'grid' => __( 'Grid', 'counter' ),
		),
	) );

	/*
	 * Theme Options.
	 */

	$wp_customize->add_panel( 'theme_options' , array(
		'title'    => __( 'Theme Options', 'counter' ),
		'priority' => 140,
	) );

	/**
	 * Front Page.
	 */

	for ( $i = 0; $i <= counter_get_panel_count(); $i++ ) :

	$wp_customize->add_section( 'panel_' . $i, array(
		'title'           => 0 == $i ? __( 'Hero Panel', 'counter' ) : __( 'Panel ', 'counter' ) . $i,
		'panel'           => 'theme_options',
		'active_callback' => 'counter_is_front_page',
	) );

	// Page Dropdown. Don't need it for Hero panel.
	if ( 0 !== $i ) :

		$wp_customize->add_setting( 'panel_content_' . $i, array(
			'default' => 0,
			'sanitize_callback' => 'absint',
			'transport' => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_content_' . $i, array(
			'label' => esc_html__( 'Content', 'counter' ),
			'section' => 'panel_' . $i,
			'type' => 'dropdown-pages',
			'allow_addition' => true,
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_content_' . $i, array(
			'selector' => '#panel-' . $i,
			'render_callback' => 'counter_panel',
			'container_inclusive' => true,
		) );

	endif;

	// Background image.
	$wp_customize->add_setting( 'panel_bg_image_' . $i, array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'panel_bg_image_' . $i,
			array(
				'label' => __( 'Background Image', 'counter' ),
				'section' => 'panel_' . $i,
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'panel_bg_image_' . $i, array(
		'selector' => '#panel-' . $i,
		'render_callback' => 'counter_panel',
		'container_inclusive' => true,
	) );

	// Background repeat.
	$wp_customize->add_setting( 'panel_bg_repeat_' . $i, array(
		'default'           => 'no-repeat',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'counter_sanitize_background_repeat',
	) );

	$wp_customize->add_control( 'panel_bg_repeat_' . $i, array(
		'label'   => __( 'Background Repeat', 'counter' ),
		'section' => 'panel_' . $i,
		'type'    => 'select',
		'choices' => array(
			'no-repeat' => __( 'No Repeat', 'counter' ),
			'repeat'    => __( 'Tile', 'counter' ),
			'repeat-x'  => __( 'Tile Horizontally', 'counter' ),
			'repeat-y'  => __( 'Tile Vertically', 'counter' ),
		),
	) );

	// Background position.
	$wp_customize->add_setting( 'panel_bg_position_' . $i, array(
		'default'           => 'left top',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'counter_sanitize_background_position',
	) );

	$wp_customize->add_control( 'panel_bg_position_' . $i, array(
		'label'   => __( 'Background Position', 'counter' ),
		'section' => 'panel_' . $i,
		'type'    => 'select',
		'choices' => array(
			'left top'      => __( 'Left Top', 'counter' ),
			'left center'   => __( 'Left Center', 'counter' ),
			'left bottom'   => __( 'Left Bottom', 'counter' ),
			'center top'    => __( 'Center Top', 'counter' ),
			'center center' => __( 'Center Center', 'counter' ),
			'center bottom' => __( 'Center Bottom', 'counter' ),
			'right top'     => __( 'Right Top', 'counter' ),
			'right center'  => __( 'Right Center', 'counter' ),
			'right bottom'  => __( 'Right Bottom', 'counter' ),
		),
	) );

	// Background attachment.
	$wp_customize->add_setting( 'panel_bg_attachment_' . $i, array(
		'default'           => 'scroll',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'counter_sanitize_background_attachment',
	) );

	$wp_customize->add_control( 'panel_bg_attachment_' . $i, array(
		'label'   => __( 'Background Attachment', 'counter' ),
		'section' => 'panel_' . $i,
		'type'    => 'select',
		'choices' => array(
			'scroll' => __( 'Scroll', 'counter' ),
			'fixed'  => __( 'Fixed', 'counter' ),
		),
	) );

	// Background size type.
	$wp_customize->add_setting( 'panel_bg_size_type_' . $i, array(
		'default'           => 'auto',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'counter_sanitize_background_size_type',
	) );

	$wp_customize->add_control( 'panel_bg_size_type_' . $i, array(
		'label'   => __( 'Background Size', 'counter' ),
		'section' => 'panel_' . $i,
		'type'    => 'select',
		'choices' => array(
			'auto'    => __( 'Auto', 'counter' ),
			'cover'   => __( 'Cover', 'counter' ),
			'percent' => __( 'Percent', 'counter' ),
		),
	) );

	// Background size in percent.
	$wp_customize->add_setting( 'panel_bg_size_' . $i, array(
		'default'           => 1,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'panel_bg_size_' . $i, array(
		'label'   => __( 'Background Size %', 'counter' ),
		'section' => 'panel_' . $i,
		'type'    => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
	) );

	// Background opacity.
	$wp_customize->add_setting( 'panel_bg_opacity_' . $i, array(
		'default'           => 1,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'counter_sanitize_opacity_range',
	) );

	$wp_customize->add_control( 'panel_bg_opacity_' . $i, array(
		'label'   => __( 'Background Opacity', 'counter' ),
		'section' => 'panel_' . $i,
		'type'    => 'range',
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 1,
			'step'  => 0.02,
		),
	) );

	// CSS class.
	$wp_customize->add_setting( 'panel_class_' . $i, array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( 'panel_class_' . $i, array(
		'type' => 'text',
		'label' => esc_html__( 'Additional CSS Classes', 'counter' ),
		'section' => 'panel_' . $i,
		'description' => sprintf(
			'%1$s <a href="https://docs.themepatio.com/counter-customizing-panels-front-page/" target="_blank">%2$s</a>',
			esc_html__( 'Space-separated list of CSS classes applied to the panel.', 'counter' ),
			esc_html__( 'Learn more &rarr;', 'counter' )
		),
	) );

	$wp_customize->selective_refresh->add_partial( 'panel_class_' . $i, array(
		'selector' => '#panel-' . $i,
		'render_callback' => 'counter_panel',
		'container_inclusive' => true,
	) );

	endfor;

	// Footer Text.
	$wp_customize->add_section( 'footer' , array(
		'title' => __( 'Footer', 'counter' ),
		'panel' => 'theme_options',
	) );

	$wp_customize->add_setting( 'footer_text', array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'footer_text', array(
		'label'       => __( 'Footer Text', 'counter' ),
		'section'     => 'footer',
		'type'        => 'textarea',
		'description' => __( 'Use [year] shortcode to display current year.', 'counter' ),
	) );

	$wp_customize->selective_refresh->add_partial( 'footer_text', array(
		'selector' => '.site-info',
		'render_callback' => 'counter_footer_text',
	) );
}
add_action( 'customize_register', 'counter_customize_register' );

/**
 * Binds js handlers to make theme customizer preview reload changes asynchronously.
 */
function counter_customize_preview_js() {
	wp_enqueue_script(
		'counter_customizer',
		get_template_directory_uri() . '/assets/js/customizer-preview.js',
		array( 'customize-preview' ),
		COUNTER_VERSION,
		true
	);
	wp_localize_script( 'counter_customizer', 'counterPanelCount', array( counter_get_panel_count() ) );
}
add_action( 'customize_preview_init', 'counter_customize_preview_js' );

/**
 * Enqueue custom scripts for customizer controls.
 */
function counter_customizer_scripts() {

	// Custom JavaScript for the Customizer controls.
	wp_register_script(
		'counter-customizer-controls',
		get_template_directory_uri() . '/assets/js/customizer-controls.js',
		array( 'jquery', 'customize-controls' ),
		COUNTER_VERSION,
		true
	);
	wp_localize_script( 'counter-customizer-controls', 'counterPanelCount', array( counter_get_panel_count() ) );

	// Color controls.
	wp_register_script(
		'counter-customizer-controls-color',
		get_template_directory_uri() . '/assets/js/customizer-controls-color.js',
		array( 'jquery', 'customize-controls', 'iris', 'wp-util' ),
		COUNTER_VERSION,
		true
	);
	wp_localize_script( 'counter-customizer-controls-color', 'colorScheme', counter_get_color_schemes() );

	wp_enqueue_script( 'counter-customizer-controls' );
	wp_enqueue_script( 'counter-customizer-controls-color' );

	// Custom CSS for the Customizer controls.
	wp_enqueue_style(
		'counter-customizer-styles',
		get_template_directory_uri() . '/assets/css/customizer.css'
	);
}
add_action( 'customize_controls_enqueue_scripts', 'counter_customizer_scripts' );
