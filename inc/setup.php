<?php
/**
 * Theme Setup
 *
 * @package ovp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ovp_theme_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Register Navigation Menus
    register_nav_menus( array(
        'primary' => 'Menú Principal (Inicio, Noticias, Nosotros, etc.)',
        'footer'  => 'Menú del Pie de Página',
    ) );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'ovp_theme_setup' );
