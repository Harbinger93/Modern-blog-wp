<?php
/**
 * Template for displaying single Biblioteca items
 * - Full width, no sidebar
 * - Centered content as document viewer
 * - Featured image toggle (meta)
 * - Related posts at bottom
 *
 * @package modern-blog-wp
 */

get_header();

// Color map for taxonomy type badges (subtle, matching biblioteca grid)
$tipo_color_map = array(
    'informe'      => array('text' => 'text-emerald-600 dark:text-emerald-400', 'bg' => 'bg-emerald-500/10 border-emerald-500/20'),
    'informe_tematico' => array('text' => 'text-emerald-600 dark:text-emerald-400', 'bg' => 'bg-emerald-500/10 border-emerald-500/20'),
    'infografia'   => array('text' => 'text-amber-600 dark:text-amber-400',   'bg' => 'bg-amber-500/10 border-amber-500/20'),
    'boletin'      => array('text' => 'text-rose-600 dark:text-rose-400',     'bg' => 'bg-rose-500/10 border-rose-500/20'),
    'folleto-guia' => array('text' => 'text-sky-600 dark:text-sky-400',       'bg' => 'bg-sky-500/10 border-sky-500/20'),
    'folletos_guias' => array('text' => 'text-sky-600 dark:text-sky-400',     'bg' => 'bg-sky-500/10 border-sky-500/20'),
    'libro'        => array('text' => 'text-violet-600 dark:text-violet-400', 'bg' => 'bg-violet-500/10 border-violet-500/20'),
    'libro_investigacion' => array('text' => 'text-violet-600 dark:text-violet-400', 'bg' => 'bg-violet-500/10 border-violet-500/20'),
    'lectura'      => array('text' => 'text-indigo-600 dark:text-indigo-400', 'bg' => 'bg-indigo-500/10 border-indigo-500/20'),
);
?>

<main id="primary" class="site-main min-h-screen bg-white dark:bg-[#050b18] transition-colors duration-300">


<?php while ( have_posts() ) : the_post();
    $post_id    = get_the_ID();
    $pdf_url    = get_post_meta( $post_id, '_modern_blog_pdf_url', true );
    $doc_type   = get_post_meta( $post_id, '_modern_blog_doc_type', true );
    $pages_count = get_post_meta( $post_id, '_modern_blog_pages_count', true );
    $doc_author = get_post_meta( $post_id, '_modern_blog_doc_author', true );
    $doc_year   = get_post_meta( $post_id, '_modern_blog_doc_year', true );
    $show_img   = get_post_meta( $post_id, '_modern_blog_show_featured_image', true );
    if ( $show_img === '' ) $show_img = '1'; // default: show

    // Resolve tipo from taxonomy first, then meta
    $tipo_terms = wp_get_post_terms( $post_id, 'tipo_biblioteca', array('fields' => 'slugs') );
    if ( ! empty( $tipo_terms ) && ! is_wp_error( $tipo_terms ) ) {
        $doc_type = $tipo_terms[0];
    }
    if ( ! $doc_type ) $doc_type = 'informe';

    $tipo_term_obj = get_term_by( 'slug', $doc_type, 'tipo_biblioteca' );
    $tipo_label    = $tipo_term_obj ? $tipo_term_obj->name : ucfirst( str_replace( '-', ' ', $doc_type ) );
    $tipo_colors   = isset( $tipo_color_map[$doc_type] ) ? $tipo_color_map[$doc_type] : array('text' => 'text-blue-600 dark:text-blue-400', 'bg' => 'bg-blue-500/10 border-blue-500/20');

    $author  = $doc_author ? $doc_author : 'OVP';
    $year    = $doc_year   ? $doc_year   : get_the_date('Y');
    $thumb   = get_the_post_thumbnail_url( $post_id, 'full' );
    $default_img = 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&q=80&w=2000';

    // Biblioteca page URL
    $biblioteca_page = get_page_by_path('biblioteca');
    $biblioteca_url  = $biblioteca_page ? get_permalink($biblioteca_page->ID) : home_url('/biblioteca');
?>

    <!-- ── HERO HEADER — adaptativo, sin patrón de puntos, sin bordes divisores, centrado ── -->
    <div class="relative w-full overflow-hidden bg-white dark:bg-[#050b18] transition-colors duration-300" style="padding-top: 7rem;">

        <!-- Hero Content (Centered) -->
        <div class="relative z-10 container mx-auto px-6 pt-12 pb-14 flex flex-col items-center text-center">

            <!-- Breadcrumb -->
            <nav class="flex flex-wrap items-center justify-center gap-2 text-[11px] font-bold uppercase tracking-widest text-slate-500 dark:text-white/40 mb-8 transition-colors duration-300">
                <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-slate-800 dark:hover:text-white/70 transition-colors">Inicio</a>
                <svg class="w-3 h-3 text-slate-400 dark:text-white/40" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                <a href="<?php echo esc_url( $biblioteca_url ); ?>" class="hover:text-slate-800 dark:hover:text-white/70 transition-colors">Biblioteca</a>
                <svg class="w-3 h-3 text-slate-400 dark:text-white/40" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                <span class="text-slate-700 dark:text-white/60 truncate max-w-[200px]"><?php echo esc_html( get_the_title() ); ?></span>
            </nav>

            <!-- Type badge -->
            <div class="mb-5 flex justify-center">
                <span class="inline-flex items-center gap-2 px-4 py-2 border <?php echo esc_attr($tipo_colors['bg']); ?> <?php echo esc_attr($tipo_colors['text']); ?> text-[10px] font-black uppercase tracking-[0.2em] rounded-full backdrop-blur-sm">
                    <?php echo esc_html( $tipo_label ); ?>
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl md:text-5xl xl:text-6xl font-black text-slate-900 dark:text-white tracking-tight leading-tight mb-6 max-w-4xl mx-auto transition-colors duration-300 text-center">
                <?php the_title(); ?>
            </h1>

            <!-- Meta row -->
            <div class="flex flex-wrap items-center justify-center gap-6 text-sm text-slate-500 dark:text-white/50 transition-colors duration-300">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <?php echo esc_html( $author ); ?>
                </span>
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <?php echo esc_html( $year ); ?>
                </span>
                <?php if ( $pages_count ) : ?>
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"/></svg>
                    <?php echo esc_html( $pages_count ); ?> páginas
                </span>
                <?php endif; ?>
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Publicado el <?php echo get_the_date(); ?>
                </span>
            </div>
        </div>
    </div>


    <!-- ── ACTION BAR ── -->
    <div class="bg-white dark:bg-[#050b18] transition-colors duration-300">
        <div class="container mx-auto px-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 py-4">
                <div class="flex flex-wrap gap-3">
                    <?php if ( $pdf_url && strpos( $pdf_url, 'http' ) === 0 ) : ?>
                    <a href="<?php echo esc_url( $pdf_url ); ?>" target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold rounded-xl transition-all shadow-lg shadow-blue-600/20 group">
                        <svg class="w-4 h-4 group-hover:translate-y-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        Descargar PDF
                    </a>
                    <?php endif; ?>
                    <!-- Share -->
                    <button onclick="navigator.share ? navigator.share({title: document.title, url: window.location.href}) : navigator.clipboard.writeText(window.location.href).then(()=>alert('Enlace copiado'))"
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-50 hover:bg-slate-100 dark:bg-white/5 dark:hover:bg-white/10 border border-slate-200 dark:border-white/10 text-slate-700 hover:text-slate-900 dark:text-white/70 dark:hover:text-white text-xs font-bold rounded-xl transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                        Compartir
                    </button>
                </div>
                <a href="<?php echo esc_url( $biblioteca_url ); ?>"
                   class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-slate-800 dark:text-white/50 dark:hover:text-white/80 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
                    Volver a Biblioteca
                </a>
            </div>
        </div>
    </div>

    <!-- ── DOCUMENT CONTENT ── -->
    <div class="bg-white dark:bg-[#050b18] py-10 md:py-16">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto">

                <!-- Post Content -->
                <div class="prose prose-lg dark:prose-invert max-w-none
                            prose-headings:font-black prose-headings:tracking-tight
                            prose-p:text-slate-600 dark:prose-p:text-slate-400 prose-p:leading-relaxed prose-p:font-light
                            prose-a:text-blue-600 dark:prose-a:text-blue-400
                            prose-strong:text-slate-800 dark:prose-strong:text-white
                            prose-blockquote:border-blue-500 prose-blockquote:bg-blue-50 dark:prose-blockquote:bg-blue-900/10
                            prose-img:rounded-2xl">
                    <?php the_content(); ?>
                </div>

                <!-- PDF Embed (if PDF URL) -->
                <?php if ( $pdf_url && strpos( $pdf_url, 'http' ) === 0 ) : ?>
                <div class="mt-16 pt-10 border-t border-slate-100 dark:border-slate-800">
                    <h3 class="text-xl font-black text-slate-900 dark:text-white tracking-tight mb-6 flex items-center gap-3">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Visualizador de Documento
                    </h3>
                    <div class="rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-xl" style="height: 90vh; min-height: 850px;">
                        <iframe src="<?php echo esc_url( $pdf_url ); ?>#toolbar=1&navpanes=0"
                                style="width:100%; height:100%; display:block;"
                                type="application/pdf"
                                title="<?php echo esc_attr( get_the_title() ); ?>">
                            <div class="flex flex-col items-center justify-center h-full gap-4 bg-slate-50 dark:bg-slate-900 p-8 text-center">
                                <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                <p class="text-slate-500 text-sm">Tu navegador no puede mostrar el PDF en línea.</p>
                                <a href="<?php echo esc_url( $pdf_url ); ?>" target="_blank"
                                   class="px-6 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-xl hover:bg-blue-500 transition-colors">
                                    Descargar PDF
                                </a>
                            </div>
                        </iframe>
                    </div>
                    <div class="flex justify-center mt-4">
                        <a href="<?php echo esc_url( $pdf_url ); ?>" target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 text-xs font-bold text-blue-600 dark:text-blue-400 hover:underline">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            Abrir en pantalla completa
                        </a>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <!-- ── RELATED PUBLICATIONS ── -->
    <?php
    $related_args = array(
        'post_type'      => 'informes',
        'posts_per_page' => 3,
        'post_status'    => 'publish',
        'post__not_in'   => array( $post_id ),
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    // Try same taxonomy term first
    if ( ! empty( $tipo_terms ) && ! is_wp_error( $tipo_terms ) ) {
        $related_args['tax_query'] = array(
            array(
                'taxonomy' => 'tipo_biblioteca',
                'field'    => 'slug',
                'terms'    => $tipo_terms,
            ),
        );
    }

    $related_query = new WP_Query( $related_args );

    // If less than 3, get any recent ones
    if ( $related_query->post_count < 3 ) {
        $related_query = new WP_Query( array(
            'post_type'      => 'informes',
            'posts_per_page' => 3,
            'post_status'    => 'publish',
            'post__not_in'   => array( $post_id ),
            'orderby'        => 'date',
            'order'          => 'DESC',
        ) );
    }

    if ( $related_query->have_posts() ) :
    ?>
    <div class="bg-slate-50 dark:bg-[#070e1e] py-16 border-t border-slate-100 dark:border-slate-800/60">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <span class="text-blue-600 text-xs font-bold uppercase tracking-wider">Biblioteca</span>
                    <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight mt-1">Otras Publicaciones</h2>
                </div>
                <a href="<?php echo esc_url( $biblioteca_url ); ?>"
                   class="text-sm font-semibold text-blue-600 hover:text-blue-500 transition-colors hidden sm:block">
                    Ver todas →
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while ( $related_query->have_posts() ) : $related_query->the_post();
                    $r_id      = get_the_ID();
                    $r_type    = get_post_meta( $r_id, '_modern_blog_doc_type', true );
                    $r_terms   = wp_get_post_terms( $r_id, 'tipo_biblioteca', array('fields' => 'slugs') );
                    if ( ! empty( $r_terms ) && ! is_wp_error( $r_terms ) ) $r_type = $r_terms[0];
                    if ( ! $r_type ) $r_type = 'informe';
                    $r_term    = get_term_by('slug', $r_type, 'tipo_biblioteca');
                    $r_label   = $r_term ? $r_term->name : ucfirst(str_replace('-', ' ', $r_type));
                    $r_colors  = isset($tipo_color_map[$r_type]) ? $tipo_color_map[$r_type] : array('text' => 'text-blue-600 dark:text-blue-400', 'bg' => 'bg-blue-500/10 border-blue-500/20');
                    $r_year    = get_post_meta($r_id, '_modern_blog_doc_year', true);
                    if (!$r_year) $r_year = get_the_date('Y');
                    $r_thumb   = get_the_post_thumbnail_url($r_id, 'medium_large');
                    $r_pdf     = get_post_meta($r_id, '_modern_blog_pdf_url', true);
                    $r_link    = get_permalink($r_id);

                    // Border color for related cards (top accent)
                    $r_border_top_map = array(
                        'informe' => 'rgba(16,185,129,0.4)', 'informe_tematico' => 'rgba(16,185,129,0.4)',
                        'infografia' => 'rgba(245,158,11,0.4)', 'boletin' => 'rgba(244,63,94,0.4)',
                        'folleto-guia' => 'rgba(14,165,233,0.4)', 'folletos_guias' => 'rgba(14,165,233,0.4)',
                        'libro' => 'rgba(139,92,246,0.4)', 'libro_investigacion' => 'rgba(139,92,246,0.4)',
                        'lectura' => 'rgba(99,102,241,0.4)',
                    );
                    $r_border_color = isset($r_border_top_map[$r_type]) ? $r_border_top_map[$r_type] : 'rgba(59,130,246,0.4)';
                ?>
                <article class="group bg-white dark:bg-[#070e1e]/80 rounded-2xl overflow-hidden shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-200 dark:border-white/5"
                         style="border-top: 3px solid <?php echo $r_border_color; ?>;">

                    <!-- Thumbnail -->
                    <?php if ( $r_thumb ) : ?>
                    <div class="relative aspect-[16/9] overflow-hidden bg-slate-100 dark:bg-slate-800">
                        <img src="<?php echo esc_url($r_thumb); ?>"
                             alt="<?php echo esc_attr(get_the_title()); ?>"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <?php else : ?>
                    <div class="aspect-[16/9] bg-gradient-to-br from-slate-100 to-slate-200 dark:from-slate-800 dark:to-slate-900 flex items-center justify-center">
                        <svg class="w-12 h-12 text-slate-300 dark:text-slate-600" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <?php endif; ?>

                    <!-- Body -->
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-[10px] font-black uppercase tracking-[0.15em] <?php echo esc_attr($r_colors['text']); ?>">
                                <?php echo esc_html($r_label); ?>
                            </span>
                            <span class="text-[11px] text-slate-400 font-medium"><?php echo esc_html($r_year); ?></span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white leading-snug mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors line-clamp-2">
                            <a href="<?php echo esc_url($r_link); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-2 mb-4 leading-relaxed font-light">
                            <?php echo esc_html( wp_trim_words( get_the_excerpt(), 16 ) ); ?>
                        </p>
                        <a href="<?php echo esc_url($r_link); ?>"
                           class="inline-flex items-center gap-1.5 text-xs font-black uppercase tracking-widest text-blue-600 dark:text-blue-400 hover:text-blue-500 transition-colors group/btn">
                            Ver publicación
                            <svg class="w-3.5 h-3.5 group-hover/btn:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

        </div>
    </div>
    <?php endif; ?>

<?php endwhile; ?>

</main>
<?php get_footer(); ?>
