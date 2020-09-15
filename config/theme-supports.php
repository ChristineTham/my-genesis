<?php
/**
 * My Genesis
 *
 * Theme supports.
 *
 * @package My_Genesis
 * @author  Chris Tham
 * @license GPL-2.0-or-later
 * @link    https://christham.net
 */

return [
	'genesis-accessibility'           => [
		'drop-down-menu',
		'headings',
		'search-form',
		'skip-links',
	],
	'genesis-custom-logo'             => [
		'flex-height' => true,
		'flex-width'  => true,
		'height'      => 160,
		'width'       => 600,
	],
	'html5'                           => [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
		'script',
		'style',
	],
	'custom-header'                   => [
		'default-image'    => my_genesis_get_default_hero_background_image(),
		'header-text'      => false,
		'header-selector'  => '.header-hero',
		'flex-height'      => true,
		'flex-width'       => true,
		'height'           => 800,
		'width'            => 1600,
		'wp-head-callback' => 'my_genesis_header_style',
	],
	'genesis-after-entry-widget-area' => '',
	'genesis-lazy-load-images'        => '',
	'genesis-menus'                   => [
		'primary'    => __( 'Header Menu', 'my-genesis' ),
		'secondary'  => __( 'Footer Menu', 'my-genesis' ),
		'off-screen' => __( 'Off Screen', 'my-genesis' ),
	],
];
