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

    $pdf_url = get_post_meta( $post->ID, '_modern_blog_pdf_url', true );
    $doc_type = get_post_meta( $post->ID, '_modern_blog_doc_type', true );
    $pages_count = get_post_meta( $post->ID, '_modern_blog_pages_count', true );

    ?>
    <div class="modern-blog-metabox-wrapper" style="padding: 10px 0;">
        <p>
            <label for="modern_blog_pdf_url" style="display:block; font-weight:bold; margin-bottom:5px;">Enlace de Descarga (PDF/Archivo):</label>
            <input type="text" id="modern_blog_pdf_url" name="modern_blog_pdf_url" value="<?php echo esc_attr( $pdf_url ); ?>" style="width:100%; padding: 8px;">
            <span class="description">Pega el link directo al archivo PDF o súbelo a la biblioteca de medios.</span>
        </p>
        <div style="display: flex; gap: 20px; margin-top: 20px;">
            <p style="flex: 1;">
                <label for="modern_blog_doc_type" style="display:block; font-weight:bold; margin-bottom:5px;">Tipo de Documento:</label>
                <select id="modern_blog_doc_type" name="modern_blog_doc_type" style="width:100%; padding: 8px;">
                    <option value="informe" <?php selected( $doc_type, 'informe' ); ?>>Informe Técnico</option>
                    <option value="boletin" <?php selected( $doc_type, 'boletin' ); ?>>Boletín Digital</option>
                    <option value="infografia" <?php selected( $doc_type, 'infografia' ); ?>>Infografía</option>
                    <option value="lectura" <?php selected( $doc_type, 'lectura' ); ?>>Lectura de Interés</option>
                </select>
            </p>
            <p style="flex: 1;">
                <label for="modern_blog_pages_count" style="display:block; font-weight:bold; margin-bottom:5px;">Número de Páginas:</label>
                <input type="number" id="modern_blog_pages_count" name="modern_blog_pages_count" value="<?php echo esc_attr( $pages_count ); ?>" style="width:100%; padding: 8px;">
            </p>
        </div>
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
        update_post_meta( $post_id, '_modern_blog_doc_type', sanitize_text_field( $_POST['modern_blog_doc_type'] ) );
    }
    if ( isset( $_POST['modern_blog_pages_count'] ) ) {
        update_post_meta( $post_id, '_modern_blog_pages_count', sanitize_text_field( $_POST['modern_blog_pages_count'] ) );
    }
}
add_action( 'save_post_informes', 'modern_blog_save_informe_metabox' );
