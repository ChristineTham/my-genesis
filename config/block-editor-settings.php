<?php
/**
 * Block Editor settings specific to My Genesis
 *
 * @package My Genesis
 * @author  Chris Tham
 * @license GPL-2.0-or-later
 * @link    https://christham.net/
 */

$my_genesis_link_color            = get_theme_mod( 'my_genesis_link_color', my_genesis_customizer_get_default_link_color() );
$my_genesis_link_color_contrast   = my_genesis_color_contrast( $my_genesis_link_color );
$my_genesis_link_color_brightness = my_genesis_color_brightness( $my_genesis_link_color, 35 );

return [
	'admin-fonts-url'              => 'https://fonts.googleapis.com/css?family=Alegreya+Sans:400,400i,700|Lora:400,700&display=swap',
	'content-width'                => 860,
	'default-button-bg'            => $my_genesis_link_color,
	'default-button-color'         => $my_genesis_link_color_contrast,
	'default-button-outline-hover' => $my_genesis_link_color_brightness,
	'default-link-color'           => $my_genesis_link_color,
	'default-accent-color'         => $my_genesis_link_color,
	'editor-color-palette'         => [
		[
			'name'  => __( 'Custom color', 'my-genesis' ),
			'slug'  => 'theme-primary',
			'color' => $my_genesis_link_color,
		],
	],
	'editor-font-sizes'            => [
		[
			'name' => __( 'Small', 'my-genesis' ),
			'size' => 16,
			'slug' => 'small',
		],
		[
			'name' => __( 'Normal', 'my-genesis' ),
			'size' => 20,
			'slug' => 'normal',
		],
		[
			'name' => __( 'Large', 'my-genesis' ),
			'size' => 24,
			'slug' => 'large',
		],
		[
			'name' => __( 'Larger', 'my-genesis' ),
			'size' => 28,
			'slug' => 'larger',
		],
	],
];
