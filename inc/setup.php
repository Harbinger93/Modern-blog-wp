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

/**
 * Change number of search results per page
 */
function ovp_search_posts_per_page( $query ) {
    if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
        $query->set( 'posts_per_page', 12 );
    }
}
add_action( 'pre_get_posts', 'ovp_search_posts_per_page' );

/**
 * Register Customizer Settings for Homepage Banner Styles
 */
function ovp_theme_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'ovp_banner_section', array(
        'title'    => 'Estilo de Banner Principal (Home)',
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'ovp_banner_style', array(
        'default'   => 'slider',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ovp_banner_style_control', array(
        'label'    => 'Selecciona el diseño del Banner',
        'section'  => 'ovp_banner_section',
        'settings' => 'ovp_banner_style',
        'type'     => 'select',
        'choices'  => array(
            'slider'    => 'Slider de Noticias Clásico',
            'glow'      => 'Diseño Premium con Resplandor (Glow)',
            'minimal'   => 'Diseño Minimalista con Imagen Estática',
            'netflix'   => 'Carrusel Estilo Netflix',
            'accordion' => 'Acordeón de Cards (Flex Cards)',
        ),
    ) );
}
add_action( 'customize_register', 'ovp_theme_customize_register' );
