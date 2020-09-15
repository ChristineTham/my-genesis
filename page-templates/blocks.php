<?php
/**
 * My Genesis
 *
 * This file adds the blocks page template to the My Genesis Theme.
 *
 * Template Name: Blocks
 *
 * @package My_Genesis
 * @author  Chris Tham
 * @license GPL-2.0-or-later
 * @link    https://christham.net
 */

add_action( 'genesis_meta', 'my_genesis_blocks_genesis_meta' );
/**
 * Adds widget support for homepage. If no widgets active, displays the default loop.
 *
 * @since 1.0.0
 */
function my_genesis_blocks_genesis_meta() {

	// Adds the front page intro description text.
	add_action( 'my_genesis_entry_header', 'my_genesis_intro_description', 11 );

	// Removes the half-width-entries body class.
	remove_filter( 'body_class', 'my_genesis_half_width_entry_class' );

	// Forces full width content layout.
	add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

	// Removes breadcrumbs.
	remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

	// Removes structural wrap from site-inner.
	add_theme_support(
		'genesis-structural-wraps',
		[
			'header',
			'menu-primary',
			'menu-secondary',
			'footer-widgets',
			'footer',
		]
	);

}

/**
 * Adds front page description text.
 *
 * @since 1.2.0
 */
function my_genesis_intro_description() {

	$my_genesis_description   = get_theme_mod( 'essence-description-text', my_genesis_get_default_desc_text() );
	$button_primary_text   = get_theme_mod( 'essence-button-primary-text', my_genesis_get_default_button_primary_text() );
	$button_primary_url    = get_theme_mod( 'essence-button-primary-url', my_genesis_get_default_button_primary_url() );
	$button_secondary_text = get_theme_mod( 'essence-button-secondary-text', my_genesis_get_default_button_secondary_text() );
	$button_secondary_url  = get_theme_mod( 'essence-button-secondary-url', my_genesis_get_default_button_secondary_url() );

	if ( $my_genesis_description && is_front_page() ) {
		echo '<p class="hero-description">' . wp_kses_post( $my_genesis_description ) . '</p>';
	}

	if ( $button_primary_text && is_front_page() ) {
		echo '<a class="button primary" href="' . esc_url( $button_primary_url ) . '">' . wp_kses_post( $button_primary_text ) . '</a>';
	}
	if ( $button_secondary_text && is_front_page() ) {
		echo '<a class="button" href="' . esc_url( $button_secondary_url ) . '">' . wp_kses_post( $button_secondary_text ) . '</a>';
	}

}

// Repositions the breadcrumbs.
remove_action( 'genesis_after_header', 'genesis_do_breadcrumbs', 90 );
add_action( 'genesis_after_header', 'genesis_do_breadcrumbs', 12 );

// Runs the Genesis loop.
genesis();
