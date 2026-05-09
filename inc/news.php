<?php
/**
 * Register Custom Post Type: Informes
 */
function modern_blog_register_informes_cpt() {
    $labels = array(
        'name'                  => _x( 'Informes', 'Post Type General Name', 'modern-blog-wp' ),
        'singular_name'         => _x( 'Informe', 'Post Type Singular Name', 'modern-blog-wp' ),
        'menu_name'             => __( 'Informes', 'modern-blog-wp' ),
        'name_admin_bar'        => __( 'Informe', 'modern-blog-wp' ),
        'archives'              => __( 'Archivo de Informes', 'modern-blog-wp' ),
        'attributes'            => __( 'Atributos de Informe', 'modern-blog-wp' ),
        'parent_item_colon'     => __( 'Informe Padre:', 'modern-blog-wp' ),
        'all_items'             => __( 'Todos los Informes', 'modern-blog-wp' ),
        'add_new_item'          => __( 'Añadir Nuevo Informe', 'modern-blog-wp' ),
        'add_new'               => __( 'Añadir Nuevo', 'modern-blog-wp' ),
        'new_item'              => __( 'Nuevo Informe', 'modern-blog-wp' ),
        'edit_item'             => __( 'Editar Informe', 'modern-blog-wp' ),
        'update_item'           => __( 'Actualizar Informe', 'modern-blog-wp' ),
        'view_item'             => __( 'Ver Informe', 'modern-blog-wp' ),
        'view_items'            => __( 'Ver Informes', 'modern-blog-wp' ),
        'search_items'          => __( 'Buscar Informe', 'modern-blog-wp' ),
        'not_found'             => __( 'No encontrado', 'modern-blog-wp' ),
        'not_found_in_trash'    => __( 'No encontrado en la papelera', 'modern-blog-wp' ),
        'featured_image'        => __( 'Imagen Destacada', 'modern-blog-wp' ),
        'set_featured_image'    => __( 'Establecer imagen destacada', 'modern-blog-wp' ),
        'remove_featured_image' => __( 'Eliminar imagen destacada', 'modern-blog-wp' ),
        'use_featured_image'    => __( 'Usar como imagen destacada', 'modern-blog-wp' ),
        'insert_into_item'      => __( 'Insertar en informe', 'modern-blog-wp' ),
        'uploaded_to_this_item' => __( 'Subido a este informe', 'modern-blog-wp' ),
        'items_list'            => __( 'Lista de informes', 'modern-blog-wp' ),
        'items_list_navigation' => __( 'Navegación de lista de informes', 'modern-blog-wp' ),
        'filter_items_list'     => __( 'Filtrar lista de informes', 'modern-blog-wp' ),
    );
    $args = array(
        'label'                 => __( 'Informe', 'modern-blog-wp' ),
        'description'           => __( 'Informes Técnicos de OVP', 'modern-blog-wp' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-media-document',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'informes', $args );
}
add_action( 'init', 'modern_blog_register_informes_cpt', 0 );
