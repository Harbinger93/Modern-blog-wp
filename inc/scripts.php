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
    wp_enqueue_style( 'modern-blog-style', MODERN_BLOG_URI . '/assets/css/style.css', array(), MODERN_BLOG_VERSION );
    wp_enqueue_script( 'modern-blog-js', MODERN_BLOG_URI . '/assets/js/main.js', array(), MODERN_BLOG_VERSION, true );

    // Inline Dark Mode & Header Script
    wp_add_inline_script( 'modern-blog-js', "
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('dark-mode-toggle');
            const header = document.getElementById('masthead');
            
            // Dark Mode
            toggle?.addEventListener('click', () => {
                document.documentElement.classList.toggle('dark');
                localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
            });
            
            // Header Scroll
            window.addEventListener('scroll', () => {
                if (window.scrollY > 20) {
                    header?.classList.add('py-2');
                } else {
                    header?.classList.remove('py-2');
                }
            });
        });
    " );
}
add_action( 'wp_enqueue_scripts', 'ovp_enqueue_assets' );
