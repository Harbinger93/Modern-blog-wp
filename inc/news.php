<?php
/**
 * Register Custom Post Type: Biblioteca
 * (Anteriormente 'informes', ahora unificado como 'biblioteca')
 */
function modern_blog_register_informes_cpt() {
    $labels = array(
        'name'                  => _x( 'Biblioteca', 'Post Type General Name', 'modern-blog-wp' ),
        'singular_name'         => _x( 'Publicación', 'Post Type Singular Name', 'modern-blog-wp' ),
        'menu_name'             => __( 'Biblioteca', 'modern-blog-wp' ),
        'name_admin_bar'        => __( 'Publicación', 'modern-blog-wp' ),
        'archives'              => __( 'Archivo de Biblioteca', 'modern-blog-wp' ),
        'attributes'            => __( 'Atributos de Publicación', 'modern-blog-wp' ),
        'parent_item_colon'     => __( 'Publicación Padre:', 'modern-blog-wp' ),
        'all_items'             => __( 'Todas las Publicaciones', 'modern-blog-wp' ),
        'add_new_item'          => __( 'Añadir Nueva Publicación', 'modern-blog-wp' ),
        'add_new'               => __( 'Añadir Nuevo', 'modern-blog-wp' ),
        'new_item'              => __( 'Nueva Publicación', 'modern-blog-wp' ),
        'edit_item'             => __( 'Editar Publicación', 'modern-blog-wp' ),
        'update_item'           => __( 'Actualizar Publicación', 'modern-blog-wp' ),
        'view_item'             => __( 'Ver Publicación', 'modern-blog-wp' ),
        'view_items'            => __( 'Ver Publicaciones', 'modern-blog-wp' ),
        'search_items'          => __( 'Buscar Publicación', 'modern-blog-wp' ),
        'not_found'             => __( 'No encontrado', 'modern-blog-wp' ),
        'not_found_in_trash'    => __( 'No encontrado en la papelera', 'modern-blog-wp' ),
        'featured_image'        => __( 'Imagen Destacada', 'modern-blog-wp' ),
        'set_featured_image'    => __( 'Establecer imagen destacada', 'modern-blog-wp' ),
        'remove_featured_image' => __( 'Eliminar imagen destacada', 'modern-blog-wp' ),
        'use_featured_image'    => __( 'Usar como imagen destacada', 'modern-blog-wp' ),
        'insert_into_item'      => __( 'Insertar en publicación', 'modern-blog-wp' ),
        'uploaded_to_this_item' => __( 'Subido a esta publicación', 'modern-blog-wp' ),
        'items_list'            => __( 'Lista de publicaciones', 'modern-blog-wp' ),
        'items_list_navigation' => __( 'Navegación de lista de publicaciones', 'modern-blog-wp' ),
        'filter_items_list'     => __( 'Filtrar lista de publicaciones', 'modern-blog-wp' ),
    );
    $args = array(
        'label'                 => __( 'Publicación', 'modern-blog-wp' ),
        'description'           => __( 'Centro de Documentación e Investigación OVP', 'modern-blog-wp' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'tipo_biblioteca' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-book-alt',
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

/**
 * Register Taxonomy: Tipo de Biblioteca
 * Permite clasificar las publicaciones por tipo: informe, infografía, boletín, etc.
 */
function modern_blog_register_tipo_biblioteca_taxonomy() {
    $labels = array(
        'name'              => _x( 'Tipos de Biblioteca', 'taxonomy general name', 'modern-blog-wp' ),
        'singular_name'     => _x( 'Tipo', 'taxonomy singular name', 'modern-blog-wp' ),
        'search_items'      => __( 'Buscar Tipo', 'modern-blog-wp' ),
        'all_items'         => __( 'Todos los Tipos', 'modern-blog-wp' ),
        'parent_item'       => __( 'Tipo Padre', 'modern-blog-wp' ),
        'parent_item_colon' => __( 'Tipo Padre:', 'modern-blog-wp' ),
        'edit_item'         => __( 'Editar Tipo', 'modern-blog-wp' ),
        'update_item'       => __( 'Actualizar Tipo', 'modern-blog-wp' ),
        'add_new_item'      => __( 'Añadir Nuevo Tipo', 'modern-blog-wp' ),
        'new_item_name'     => __( 'Nombre del Nuevo Tipo', 'modern-blog-wp' ),
        'menu_name'         => __( 'Tipos', 'modern-blog-wp' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'tipo-biblioteca' ),
        'show_in_rest'      => true,
    );
    register_taxonomy( 'tipo_biblioteca', array( 'informes' ), $args );
}
add_action( 'init', 'modern_blog_register_tipo_biblioteca_taxonomy', 0 );

/**
 * Insert default taxonomy terms on theme activation / init (only if empty)
 */
function modern_blog_insert_default_tipo_biblioteca_terms() {
    $default_terms = array(
        'informe'         => 'Informe',
        'infografia'      => 'Infografía',
        'boletin'         => 'Boletín',
        'folleto-guia'    => 'Folleto / Guía',
        'libro'           => 'Libro de Investigación',
        'lectura'         => 'Lectura de Interés',
    );
    foreach ( $default_terms as $slug => $name ) {
        if ( ! term_exists( $slug, 'tipo_biblioteca' ) ) {
            wp_insert_term( $name, 'tipo_biblioteca', array( 'slug' => $slug ) );
        }
    }
}
add_action( 'init', 'modern_blog_insert_default_tipo_biblioteca_terms', 1 );
