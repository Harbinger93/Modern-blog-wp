<?php
/**
 * OVP Theme Functions and definitions
 *
 * @package ovp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'MODERN_BLOG_VERSION', '1.0.0' );
define( 'MODERN_BLOG_DIR', get_template_directory() );
define( 'MODERN_BLOG_URI', get_template_directory_uri() );

/**
 * Include modular logic (Zero Plugins Policy)
 */

// 1. Security & Hardening
require_once MODERN_BLOG_DIR . '/inc/security.php';

// 2. Theme Setup (Support, Menus, etc.)
require_once MODERN_BLOG_DIR . '/inc/setup.php';

// 3. Custom Post Types & News Logic
require_once MODERN_BLOG_DIR . '/inc/news.php';

// 4. Asset Management (Vite/Scripts)
require_once MODERN_BLOG_DIR . '/inc/scripts.php';

// 5. Custom Meta Boxes (Replacing ACF)
require_once MODERN_BLOG_DIR . '/inc/meta-boxes.php';

// 6. Post Views Logic (Most Viewed News)
require_once MODERN_BLOG_DIR . '/inc/post-views.php';
