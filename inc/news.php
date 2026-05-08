<?php
/**
 * News & Custom Post Types Logic
 *
 * @package ovp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Custom Post Type: Informes
 */
function ovp_register_informes_cpt() {
    $labels = array(
        'name'                  => 'Informes',
        'singular_name'         => 'Informe',
        'menu_name'             => 'Informes Técnicos',
        'add_new'               => 'Nuevo Informe',
        'add_new_item'          => 'Agregar Nuevo Informe',
        'edit_item'             => 'Editar Informe',
        'new_item'              => 'Nuevo Informe',
        'view_item'             => 'Ver Informe',
        'all_items'             => 'Todos los Informes',
        'search_items'          => 'Buscar Informes',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'show_in_rest'       => true, // Enable Gutenberg
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
        'menu_icon'          => 'dashicons-media-document',
        'rewrite'            => array( 'slug' => 'informes' ),
        'capability_type'    => 'post',
    );

    register_post_type( 'informes', $args );
}
add_action( 'init', 'ovp_register_informes_cpt' );

/**
 * Register Taxonomy: Tipo de Informe
 */
function ovp_register_informes_taxonomy() {
    register_taxonomy( 'tipo_informe', 'informes', array(
        'label'        => 'Categoría de Informe',
        'rewrite'      => array( 'slug' => 'tipo-informe' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    ));
}
add_action( 'init', 'ovp_register_informes_taxonomy' );
