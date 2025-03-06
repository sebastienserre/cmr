<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/assets/css/cmr.css' );
}

add_action( 'after_setup_theme', 'cmr_init' );
function cmr_init() {
	require 'inc/shortcodes.php';
}
