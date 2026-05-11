<?php
/**
 * Asset Management (Vite)
 *
 * @package ovp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ovp_enqueue_assets() {
    // Production Assets
    wp_enqueue_style( 'modern-blog-style', MODERN_BLOG_URI . '/assets/css/style.css', array(), time() );
    wp_enqueue_script( 'modern-blog-scripts', MODERN_BLOG_URI . '/assets/js/main.js', array(), time(), true );
}
add_action( 'wp_enqueue_scripts', 'ovp_enqueue_assets' );
