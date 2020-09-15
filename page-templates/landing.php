<?php
/**
 * My Genesis
 *
 * This file adds the landing page template to the My Genesis Theme.
 *
 * Template Name: Landing
 *
 * @package My_Genesis
 * @author  Chris Tham
 * @license GPL-2.0-or-later
 * @link    https://christham.net
 */

add_filter( 'body_class', 'my_genesis_add_body_class' );
/**
 * Adds landing page body class.
 *
 * @since 1.0.0
 *
 * @param array $classes Original body classes.
 * @return array Modified body classes.
 */
function my_genesis_add_body_class( $classes ) {

	$classes[] = 'landing-page';
	return $classes;

}

// Removes skip links.
remove_action( 'genesis_before_header', 'genesis_skip_links', 5 );

add_action( 'wp_enqueue_scripts', 'my_genesis_dequeue_skip_links' );
/**
 * Dequeues Skip Links Script.
 *
 * @since 1.0.0
 */
function my_genesis_dequeue_skip_links() {

	wp_dequeue_script( 'skip-links' );

}

// Removes site header elements.
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

remove_action( 'genesis_header', 'my_genesis_header_right_menu', 9 );
remove_action( 'genesis_header', 'my_genesis_header_left_widget', 9 );

// Removes navigation.
remove_theme_support( 'genesis-menus' );

// Removes footer widgets.
remove_action( 'genesis_before_footer', 'my_genesis_footer_widgets' );

remove_action( 'genesis_before_footer', 'my_genesis_after_content_featured', 13 );
remove_action( 'genesis_before_footer', 'my_genesis_footer_cta', 17 );

// Removes site footer elements.
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

// Runs the Genesis loop.
genesis();
