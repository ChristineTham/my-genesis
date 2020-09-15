<?php
/**
 * My Genesis
 *
 * This file adds the Customizer additions to the My Genesis Theme.
 *
 * @package My_Genesis
 * @author  Chris Tham
 * @license GPL-2.0-or-later
 * @link    https://christham.net
 */

add_action( 'customize_register', 'my_genesis_customizer_register' );
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function my_genesis_customizer_register( $wp_customize ) {

	// Main settings panel.
	$wp_customize->add_panel(
		'essence-settings',
		[
			'description' => __( 'Set up the My Genesis settings and defaults.', 'my-genesis' ),
			'priority'    => 80,
			'title'       => __( 'My Genesis Settings', 'my-genesis' ),
		]
	);

	// Basic settings section.
	$wp_customize->add_section(
		'essence-basic-settings',
		[
			'description' => sprintf( '<strong>%s</strong>', __( 'Modify the My Genesis Theme basic settings.', 'my-genesis' ) ),
			'title'       => __( 'Basic Settings', 'my-genesis' ),
			'panel'       => 'essence-settings',
		]
	);

	// Styled paragraph settings.
	$wp_customize->add_setting(
		'essence-use-paragraph-styling',
		[
			'default'           => 1,
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'essence-use-paragraph-styling',
		[
			'label'       => __( 'Enable the "intro" paragraph style on single posts?', 'my-genesis' ),
			'description' => __( 'Check the box to automatically apply the "intro" font size and style to the first paragraph of all single posts.', 'my-genesis' ),
			'section'     => 'essence-basic-settings',
			'settings'    => 'essence-use-paragraph-styling',
			'type'        => 'checkbox',
		]
	);

	$wp_customize->add_section(
		'header_image',
		[
			'title'       => __( 'Header Background Image', 'my-genesis' ),
			'description' => sprintf( '<p><strong>%1$s</strong></p><p>%2$s</p>', __( 'The default header background image is displayed on the front page and all posts and pages where a unique featured image is not available.', 'my-genesis' ), __( 'A default image is included with the theme, but you may choose a different default image below.', 'my-genesis' ) ),
			'panel'       => 'essence-settings',
		]
	);

	// Front Page Hero Section.
	$wp_customize->add_section(
		'essence-front-page-hero-section',
		[
			'active_callback' => 'is_front_page',
			'description'     => sprintf( '<strong>%s</strong>', __( 'Modify the settings for the front page hero section.', 'my-genesis' ) ),
			'title'           => __( 'Front Page Hero Section', 'my-genesis' ),
			'panel'           => 'essence-settings',
		]
	);

	// Hero Intro Paragraph.
	$wp_customize->add_setting(
		'essence-description-text',
		[
			'default'           => my_genesis_get_default_desc_text(),
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
		]
	);

	$wp_customize->add_control(
		'essence-description-text',
		[
			'description' => __( 'Change the introductory description text for the front page hero section.', 'my-genesis' ),
			'label'       => __( 'Front Page Intro Paragraph', 'my-genesis' ),
			'section'     => 'essence-front-page-hero-section',
			'settings'    => 'essence-description-text',
			'type'        => 'textarea',
		]
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'essence-description-text',
			[
				'selector'        => '.hero-description',
				'settings'        => [ 'essence-description-text' ],
				'render_callback' => function() {
					return get_theme_mod( 'essence-description-text' );
				},
			]
		);
	}

	// Front Page Buttons.
	$wp_customize->add_setting(
		'essence-button-primary-text',
		[
			'default'           => my_genesis_get_default_button_primary_text(),
			'sanitize_callback' => 'esc_html',
			'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
		]
	);

	$wp_customize->add_control(
		'essence-button-primary-text',
		[
			'description' => __( 'Change the text for the white button in the front page hero section.', 'my-genesis' ),
			'label'       => __( 'Hero White Button Text', 'my-genesis' ),
			'section'     => 'essence-front-page-hero-section',
			'settings'    => 'essence-button-primary-text',
		]
	);

	$wp_customize->add_setting(
		'essence-button-primary-url',
		[
			'default'           => my_genesis_get_default_button_primary_url(),
			'sanitize_callback' => 'esc_url',
			'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
		]
	);

	$wp_customize->add_control(
		'essence-button-primary-url',
		[
			'description' => __( 'Change the URL for the white button in the front page hero section.', 'my-genesis' ),
			'label'       => __( 'Hero White Button URL', 'my-genesis' ),
			'section'     => 'essence-front-page-hero-section',
			'settings'    => 'essence-button-primary-url',
		]
	);

	$wp_customize->add_setting(
		'essence-button-secondary-text',
		[
			'default'           => my_genesis_get_default_button_secondary_text(),
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
		]
	);

	$wp_customize->add_control(
		'essence-button-secondary-text',
		[
			'description' => __( 'Change the text for the colored button in the front page hero section.', 'my-genesis' ),
			'label'       => __( 'Hero Colored Button Text', 'my-genesis' ),
			'section'     => 'essence-front-page-hero-section',
			'settings'    => 'essence-button-secondary-text',
		]
	);

	$wp_customize->add_setting(
		'essence-button-secondary-url',
		[
			'default'           => my_genesis_get_default_button_secondary_url(),
			'sanitize_callback' => 'esc_url',
			'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
		]
	);

	$wp_customize->add_control(
		'essence-button-secondary-url',
		[
			'description' => __( 'Change the URL for the colored button in the front page hero section.', 'my-genesis' ),
			'label'       => __( 'Hero Colored Button URL', 'my-genesis' ),
			'section'     => 'essence-front-page-hero-section',
			'settings'    => 'essence-button-secondary-url',
		]
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'essence-button-primary-text',
			[
				'selector'        => '.hero-section .button.primary',
				'settings'        => [ 'essence-button-primary-text' ],
				'render_callback' => function() {
					return get_theme_mod( 'essence-button-primary-text' );
				},
			]
		);
	}

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'essence-button-secondary-text',
			[
				'selector'        => '.hero-section .button.text',
				'settings'        => [ 'essence-button-secondary-text' ],
				'render_callback' => function() {
					return get_theme_mod( 'essence-button-secondary-text' );
				},
			]
		);
	}

	// Link Colors.
	$wp_customize->add_setting(
		'my_genesis_link_color',
		[
			'default'           => my_genesis_customizer_get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_genesis_link_color',
			[
				'description' => __( 'Change the default color for linked titles, buttons, post info links and more.', 'my-genesis' ),
				'label'       => __( 'Link Color', 'my-genesis' ),
				'section'     => 'colors',
				'settings'    => 'my_genesis_link_color',
			]
		)
	);

}
