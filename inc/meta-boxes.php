<?php
/**
 * Custom Meta Boxes (Replacing ACF)
 * Native implementation for Publicaciones/Informes.
 *
 * @package modern-blog-wp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Meta Box for Informes
 */
function modern_blog_add_informe_metabox() {
    add_meta_box(
        'modern_blog_informe_details',
        'Detalles del Informe / Publicación',
        'modern_blog_informe_metabox_callback',
        'informes',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'modern_blog_add_informe_metabox' );

/**
 * Meta Box Callback
 */
function modern_blog_informe_metabox_callback( $post ) {
    // Add nonce for security
    wp_nonce_field( 'modern_blog_informe_nonce', 'modern_blog_informe_nonce_field' );

    $pdf_url     = get_post_meta( $post->ID, '_modern_blog_pdf_url', true );
    $doc_type    = get_post_meta( $post->ID, '_modern_blog_doc_type', true );
    $pages_count = get_post_meta( $post->ID, '_modern_blog_pages_count', true );
    $doc_author  = get_post_meta( $post->ID, '_modern_blog_doc_author', true );
    $doc_year    = get_post_meta( $post->ID, '_modern_blog_doc_year', true );
    $featured    = get_post_meta( $post->ID, '_modern_blog_featured_badge', true );
    $is_annual   = get_post_meta( $post->ID, '_modern_blog_is_annual_report', true );
    $show_img    = get_post_meta( $post->ID, '_modern_blog_show_featured_image', true );
    // Default: show featured image
    if ( $show_img === '' ) $show_img = '1';

    ?>
    <div class="modern-blog-metabox-wrapper" style="padding: 10px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;">
        <p>
            <label for="modern_blog_pdf_url" style="display:block; font-weight:bold; margin-bottom:5px;">Enlace de Descarga (PDF/Archivo):</label>
            <input type="text" id="modern_blog_pdf_url" name="modern_blog_pdf_url" value="<?php echo esc_attr( $pdf_url ); ?>" style="width:100%; padding: 8px;">
            <span class="description">Pega el link directo al archivo PDF o súbelo a la biblioteca de medios.</span>
        </p>
        
        <div style="display: flex; gap: 20px; margin-top: 20px; flex-wrap: wrap;">
        <p>
            <label for="modern_blog_doc_type" style="display:block; font-weight:bold; margin-bottom:5px;">Tipo de Publicación (Categoría):</label>
            <?php
            // Get current assigned tipo_biblioteca terms
            $current_tipos = wp_get_post_terms( $post->ID, 'tipo_biblioteca', array( 'fields' => 'slugs' ) );
            $current_tipo  = ! empty( $current_tipos ) && ! is_wp_error( $current_tipos ) ? $current_tipos[0] : '';
            // Also check legacy meta for backwards compat
            if ( empty( $current_tipo ) ) {
                $current_tipo = $doc_type;
            }
            $tipos = get_terms( array(
                'taxonomy'   => 'tipo_biblioteca',
                'hide_empty' => false,
            ) );
            ?>
            <select id="modern_blog_doc_type" name="modern_blog_doc_type" style="width:100%; padding: 8px;">
                <option value="">-- Selecciona un tipo --</option>
                <?php if ( ! is_wp_error( $tipos ) ) : foreach ( $tipos as $tipo ) : ?>
                    <option value="<?php echo esc_attr( $tipo->slug ); ?>" <?php selected( $current_tipo, $tipo->slug ); ?>>
                        <?php echo esc_html( $tipo->name ); ?>
                    </option>
                <?php endforeach; endif; ?>
            </select>
            <span class="description">Se asignará como Tipo en la Biblioteca y se usará para filtrar en la página de Biblioteca.</span>
        </p>
            <p style="flex: 1; min-width: 200px;">
                <label for="modern_blog_pages_count" style="display:block; font-weight:bold; margin-bottom:5px;">Número de Páginas:</label>
                <input type="number" id="modern_blog_pages_count" name="modern_blog_pages_count" value="<?php echo esc_attr( $pages_count ); ?>" style="width:100%; padding: 8px;">
            </p>
        </div>

        <div style="display: flex; gap: 20px; margin-top: 20px; flex-wrap: wrap;">
            <p style="flex: 1; min-width: 200px;">
                <label for="modern_blog_doc_author" style="display:block; font-weight:bold; margin-bottom:5px;">Autor Personalizado:</label>
                <input type="text" id="modern_blog_doc_author" name="modern_blog_doc_author" value="<?php echo esc_attr( $doc_author ); ?>" style="width:100%; padding: 8px;" placeholder="Ej. Equipo de Investigación / Humberto Prado">
                <span class="description">Si se deja vacío se mostrará "OVP".</span>
            </p>
            <p style="flex: 1; min-width: 200px;">
                <label for="modern_blog_doc_year" style="display:block; font-weight:bold; margin-bottom:5px;">Año de Publicación:</label>
                <input type="number" id="modern_blog_doc_year" name="modern_blog_doc_year" value="<?php echo esc_attr( $doc_year ); ?>" style="width:100%; padding: 8px;" placeholder="Ej. 2026">
                <span class="description">Si se deja vacío tomará el año real del post.</span>
            </p>
        </div>

        <p style="margin-top: 20px; border-top: 1px solid #eee; padding-top: 15px;">
            <label for="modern_blog_featured_badge" style="font-weight:bold; cursor: pointer;">
                <input type="checkbox" id="modern_blog_featured_badge" name="modern_blog_featured_badge" value="1" <?php checked( $featured, '1' ); ?> style="margin-right: 8px;">
                Destacar esta publicación (Badge de "Destacado" / "Actualizado Hoy" en Biblioteca)
            </label>
        </p>
        <p style="margin-top: 12px;">
            <label for="modern_blog_is_annual_report" style="font-weight:bold; cursor: pointer; color: #b45309;">
                <input type="checkbox" id="modern_blog_is_annual_report" name="modern_blog_is_annual_report" value="1" <?php checked( $is_annual, '1' ); ?> style="margin-right: 8px;">
                ★ Es el <strong>Informe Anual</strong> (se destacará en la página de inicio)
            </label>
            <span class="description" style="display:block; margin-top:4px; color:#777;">Solo un informe debe tener esta opción activa a la vez. Activa este en el nuevo y desactiva el anterior.</span>
        </p>
        <p style="margin-top: 12px;">
            <label for="modern_blog_show_featured_image" style="font-weight:bold; cursor: pointer;">
                <input type="checkbox" id="modern_blog_show_featured_image" name="modern_blog_show_featured_image" value="1" <?php checked( $show_img, '1' ); ?> style="margin-right: 8px;">
                Mostrar imagen destacada dentro de la página del documento
            </label>
            <span class="description" style="display:block; margin-top:4px; color:#777;">Si está desmarcado, la página de visualización usará una imagen genérica en el encabezado.</span>
        </p>
    </div>
    <?php
}

/**
 * Save Meta Box Data
 */
function modern_blog_save_informe_metabox( $post_id ) {
    // Security checks
    if ( ! isset( $_POST['modern_blog_informe_nonce_field'] ) || ! wp_verify_nonce( $_POST['modern_blog_informe_nonce_field'], 'modern_blog_informe_nonce' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Save fields
    if ( isset( $_POST['modern_blog_pdf_url'] ) ) {
        update_post_meta( $post_id, '_modern_blog_pdf_url', esc_url_raw( $_POST['modern_blog_pdf_url'] ) );
    }
    if ( isset( $_POST['modern_blog_doc_type'] ) ) {
        $tipo_slug = sanitize_text_field( $_POST['modern_blog_doc_type'] );
        // Save as meta (legacy compatibility)
        update_post_meta( $post_id, '_modern_blog_doc_type', $tipo_slug );
        // Also assign as taxonomy term
        if ( ! empty( $tipo_slug ) ) {
            $term = get_term_by( 'slug', $tipo_slug, 'tipo_biblioteca' );
            if ( $term && ! is_wp_error( $term ) ) {
                wp_set_post_terms( $post_id, array( $term->term_id ), 'tipo_biblioteca', false );
            }
        }
    }
    if ( isset( $_POST['modern_blog_pages_count'] ) ) {
        update_post_meta( $post_id, '_modern_blog_pages_count', sanitize_text_field( $_POST['modern_blog_pages_count'] ) );
    }
    if ( isset( $_POST['modern_blog_doc_author'] ) ) {
        update_post_meta( $post_id, '_modern_blog_doc_author', sanitize_text_field( $_POST['modern_blog_doc_author'] ) );
    }
    if ( isset( $_POST['modern_blog_doc_year'] ) ) {
        update_post_meta( $post_id, '_modern_blog_doc_year', sanitize_text_field( $_POST['modern_blog_doc_year'] ) );
    }
    
    // Save checkbox (handle empty value when unchecked)
    $featured_val   = isset( $_POST['modern_blog_featured_badge'] )        ? '1' : '0';
    $annual_val     = isset( $_POST['modern_blog_is_annual_report'] )      ? '1' : '0';
    $show_img_val   = isset( $_POST['modern_blog_show_featured_image'] )   ? '1' : '0';
    update_post_meta( $post_id, '_modern_blog_featured_badge',        $featured_val );
    update_post_meta( $post_id, '_modern_blog_is_annual_report',      $annual_val );
    update_post_meta( $post_id, '_modern_blog_show_featured_image',   $show_img_val );
}
add_action( 'save_post_informes', 'modern_blog_save_informe_metabox' );
