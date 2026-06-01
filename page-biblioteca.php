<?php
/**
 * Template Name: Biblioteca
 * Description: Portal de documentación, informes e investigaciones con filtrado dinámico.
 *
 * @package ovp-theme
 */

get_header();

// 1. Core Demo Catalog representing the reference mockup exactly
$demo_posts = array();

// 2. Fetch actual database posts (biblioteca CPT)
$args = array(
    'post_type' => 'informes',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
);
$query = new WP_Query($args);

$posts_list = array();

// Add database CPT posts first
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $pdf_url = get_post_meta($post_id, '_modern_blog_pdf_url', true);
        $doc_type = get_post_meta($post_id, '_modern_blog_doc_type', true);
        $custom_author = get_post_meta($post_id, '_modern_blog_doc_author', true);
        $custom_year = get_post_meta($post_id, '_modern_blog_doc_year', true);
        $featured = get_post_meta($post_id, '_modern_blog_featured_badge', true);

        // Try taxonomy first, fallback to meta
        $tipo_terms = wp_get_post_terms($post_id, 'tipo_biblioteca', array('fields' => 'slugs'));
        if (!empty($tipo_terms) && !is_wp_error($tipo_terms)) {
            $doc_type = $tipo_terms[0];
        }
        if (!$doc_type)
            $doc_type = 'informe';

        $author = $custom_author ? $custom_author : 'OVP';
        $year = $custom_year ? $custom_year : get_the_date('Y');

        $posts_list[] = array(
            'post_id' => $post_id,
            'title' => get_the_title(),
            'excerpt' => wp_strip_all_tags(get_the_excerpt()),
            'doc_type' => $doc_type,
            'author' => $author,
            'year' => $year,
            'date' => get_post_time('U'),
            'pdf_url' => get_permalink(), // always link to single post
            'raw_pdf' => $pdf_url,        // actual PDF file if set
            'categories' => array($doc_type),
            'is_demo' => false
        );
    }
    wp_reset_postdata();
}

// 2b. Fetch standard posts ('post') from specific categories: boletin, informe, infografia, tematicos
$args_posts = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'category_name' => 'boletin,informe,infografia,tematicos',
    'orderby' => 'date',
    'order' => 'DESC',
);
$query_posts = new WP_Query($args_posts);

if ($query_posts->have_posts()) {
    while ($query_posts->have_posts()) {
        $query_posts->the_post();
        $post_id = get_the_ID();
        
        // Map standard post category to doc_type
        $doc_type = 'informe'; // fallback
        $post_categories = get_the_category($post_id);
        $mapped_cats = array();
        if (!empty($post_categories)) {
            foreach ($post_categories as $cat_obj) {
                $slug = $cat_obj->slug;
                $mapped_cats[] = $slug;
                if (in_array($slug, array('boletin', 'informe', 'infografia', 'tematicos'))) {
                    $doc_type = $slug;
                }
            }
        }

        // Fetch custom meta if any, fallback to standard post values
        $custom_author = get_post_meta($post_id, '_modern_blog_doc_author', true);
        $custom_year = get_post_meta($post_id, '_modern_blog_doc_year', true);
        $pdf_url = get_post_meta($post_id, '_modern_blog_pdf_url', true);

        $author = $custom_author ? $custom_author : 'OVP';
        $year = $custom_year ? $custom_year : get_the_date('Y');

        $posts_list[] = array(
            'post_id' => $post_id,
            'title' => get_the_title(),
            'excerpt' => wp_strip_all_tags(get_the_excerpt()),
            'doc_type' => $doc_type,
            'author' => $author,
            'year' => $year,
            'date' => get_post_time('U'),
            'pdf_url' => get_permalink(),
            'raw_pdf' => $pdf_url,
            'categories' => $mapped_cats,
            'is_demo' => false
        );
    }
    wp_reset_postdata();
}


$total_pubs = count($posts_list);

// Extract unique years
$available_years = array();
foreach ($posts_list as $p) {
    if (!in_array($p['year'], $available_years)) {
        $available_years[] = $p['year'];
    }
}
rsort($available_years);

// Extract unique categories (Fixing undefined $categories_map bug)
$categories_map = array();
foreach ($posts_list as $p) {
    if (isset($p['categories']) && is_array($p['categories'])) {
        foreach ($p['categories'] as $cat) {
            if (!empty($cat) && !in_array($cat, array_keys($categories_map))) {
                $categories_map[$cat] = ucfirst(str_replace('-', ' ', $cat));
            }
        }
    }
}
asort($categories_map);

// Fetch tipo_biblioteca terms for filter tabs
$tipo_terms_all = get_terms(array(
    'taxonomy' => 'tipo_biblioteca',
    'hide_empty' => false,
));

// Build tab list: always include all demo types + taxonomy terms
$tab_types = array();
if (!is_wp_error($tipo_terms_all)) {
    foreach ($tipo_terms_all as $t) {
        $tab_types[$t->slug] = $t->name;
    }
}
// Ensure demo types are represented
$demo_type_labels = array(
    'informe' => 'Informe',
    'infografia' => 'Infografía',
    'boletin' => 'Boletín',
    'tematicos' => 'Temático',
    'folleto-guia' => 'Folleto / Guía',
    'libro' => 'Libro de Investigación',
    'lectura' => 'Lectura de Interés',
);
foreach ($demo_type_labels as $slug => $label) {
    if (!isset($tab_types[$slug])) {
        $tab_types[$slug] = $label;
    }
}

// URL param for auto-filter (from home page buttons)
$filter_tipo_param = isset($_GET['tipo']) ? sanitize_text_field($_GET['tipo']) : '';
?>

<!-- =====================================================================
     BIBLIOTECA PAGE — Light/Dark mode adaptive + Blurred hero image
     ===================================================================== -->
<main id="primary"
    class="site-main min-h-screen bg-slate-100 dark:bg-[#02060f] text-slate-800 dark:text-slate-100 font-sans pb-20 overflow-hidden transition-colors duration-300 relative"
    style="padding-top: 7rem;">

    <!-- Decorative background glows (dark mode only) -->
    <div
        class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px] pointer-events-none -z-10 animate-pulse-slow dark:block hidden">
    </div>
    <div
        class="absolute top-[40vh] right-1/4 w-[400px] h-[400px] bg-indigo-600/10 rounded-full blur-[120px] pointer-events-none -z-10 dark:block hidden">
    </div>

    <div class="container mx-auto px-4 md:px-6">

        <!-- ============================================================
             1. HERO SECTION — with blurred background image
             ============================================================ -->
        <section class="mb-12 relative mt-4">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative overflow-hidden
                        bg-white/80 dark:bg-[#070e1e]/60
                        backdrop-blur-2xl
                        border border-slate-200 dark:border-slate-800/60
                        rounded-[2.5rem] p-8 md:p-12 shadow-2xl">

                <!-- ── Blurred background image (fades into the bg color) ── -->
                <div class="absolute inset-0 rounded-[2.5rem] overflow-hidden pointer-events-none z-0">
                    <img src="https://cdn.imgchest.com/files/a9658977f1ec.jpg" alt=""
                        class="w-full h-full object-cover object-center scale-110" style="filter: blur(4px);">
                    <!-- Light mode overlay -->
                    <div class="absolute inset-0 bg-gradient-to-r from-white/95 via-white/80 to-white/40 dark:hidden">
                    </div>
                    <!-- Dark mode overlay -->
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-[#020814]/95 via-[#020814]/80 to-[#020814]/40 hidden dark:block">
                    </div>
                    <!-- Bottom fade to merge with background -->
                    <div
                        class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-slate-100 dark:from-[#02060f] to-transparent">
                    </div>
                </div>
                <!-- ─────────────────────────────────────────────────────── -->

                <!-- Text info -->
                <div class="lg:col-span-8 space-y-6 relative z-10">
                    <span
                        class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-blue-500/10 border border-blue-500/20 text-blue-600 dark:text-blue-400 text-xs font-bold uppercase tracking-wider rounded-full">
                        <span class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-ping"></span>
                        Prototipo de Presentación
                    </span>
                    <h1
                        class="text-3xl md:text-5xl lg:text-6xl font-black text-slate-900 dark:text-white tracking-tight leading-tight">
                        Centro de Documentación e <br class="hidden md:inline">Investigación OVP
                    </h1>
                    <p
                        class="text-slate-600 dark:text-slate-400 text-base md:text-lg font-light leading-relaxed max-w-3xl">
                        Accede a nuestro catálogo completo de informes de derechos humanos, infografías pedagógicas,
                        libros de investigación y folletos informativos sobre el sistema penitenciario en Venezuela.
                    </p>
                    <!-- Badges -->
                    <div class="flex flex-wrap gap-3 pt-2">
                        <span
                            class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-500/5 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 text-xs font-bold rounded-xl">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                            Acceso Abierto
                        </span>
                        <span
                            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-500/5 border border-blue-500/20 text-blue-600 dark:text-blue-400 text-xs font-bold rounded-xl">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Descargas en PDF
                        </span>
                        <!--<span class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500/5 border border-amber-500/20 text-amber-600 dark:text-amber-400 text-xs font-bold rounded-xl">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Licencia CC BY 4.0
                        </span>-->
                    </div>
                </div>

                <!-- Stats panel -->
                <div class="lg:col-span-4 grid grid-cols-2 gap-4 relative z-10">
                    <div
                        class="bg-slate-50 dark:bg-[#0c162e] border border-slate-200 dark:border-slate-800 rounded-3xl p-6 text-center space-y-1 shadow-lg">
                        <span
                            class="block text-3xl font-black text-slate-900 dark:text-white"><?php echo esc_html($total_pubs); ?></span>
                        <span
                            class="block text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest">Publicaciones</span>
                    </div>
                    <div
                        class="bg-slate-50 dark:bg-[#0c162e] border border-slate-200 dark:border-slate-800 rounded-3xl p-6 text-center space-y-1 shadow-lg">
                        <span class="block text-3xl font-black text-blue-500 dark:text-blue-400">100%</span>
                        <span
                            class="block text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest">Acceso
                            Libre</span>
                    </div>
                    <div
                        class="bg-slate-50 dark:bg-[#0c162e] border border-slate-200 dark:border-slate-800 rounded-3xl p-6 text-center space-y-1 shadow-lg">
                        <span class="block text-3xl font-black text-indigo-500 dark:text-indigo-400">3</span>
                        <span
                            class="block text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest">Informes
                        </span>
                    </div>
                    <div
                        class="bg-slate-50 dark:bg-[#0c162e] border border-slate-200 dark:border-slate-800 rounded-3xl p-6 text-center space-y-1 shadow-lg">
                        <span class="block text-3xl font-black text-emerald-500 dark:text-emerald-400">+15k</span>
                        <span
                            class="block text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest">Descargas</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================
             2. FILTER & SEARCH CONTROL SYSTEM
             ============================================================ -->
        <section class="mb-12">
            <div
                class="bg-white/80 dark:bg-[#070e1e]/60 backdrop-blur-2xl border border-slate-200 dark:border-slate-800/60 rounded-[2rem] p-6 md:p-8 shadow-xl space-y-6">
                <!-- Search bar input -->
                <div class="relative group">
                    <input type="text" id="lib-search-input"
                        placeholder="Buscar por título, palabras clave, temas o autores..."
                        class="w-full bg-slate-50 dark:bg-[#030914] border border-slate-300 dark:border-slate-800 focus:border-blue-500 rounded-2xl pl-14 pr-6 py-4 text-base text-slate-800 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 outline-none transition-all duration-300 shadow-inner">
                    <svg class="absolute left-5 top-1/2 -translate-y-1/2 w-6 h-6 text-slate-400 dark:text-slate-500 group-focus-within:text-blue-500 transition-colors"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>

                <!-- Tabs & Advanced filter trigger -->
                <div class="flex flex-col xl:flex-row justify-between items-start xl:items-center gap-6 pt-2">
                    <!-- Tabs for Document Types -->
                    <div class="space-y-2 w-full xl:w-auto">
                        <span
                            class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Sección
                            / Tipo de Recurso</span>
                        <div class="flex flex-wrap gap-2.5" id="lib-type-tabs">
                            <button data-type="all"
                                class="lib-tab active px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-lg shadow-blue-500/20 hover:scale-105 transition-all duration-300">
                                Todos
                            </button>
                            <?php foreach ($tab_types as $slug => $label): ?>
                                <button data-type="<?php echo esc_attr($slug); ?>"
                                    class="lib-tab lib-tab-inactive px-5 py-2.5 text-xs font-bold uppercase tracking-wider rounded-xl hover:scale-105 transition-all duration-300">
                                    <?php echo esc_html($label); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Advanced Filter Trigger -->
                    <button id="lib-adv-trigger"
                        class="flex items-center gap-2 px-5 py-3.5 bg-slate-100 dark:bg-[#0b1326] border border-slate-300 dark:border-slate-800 hover:border-slate-400 dark:hover:border-slate-700 text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white text-xs font-bold uppercase tracking-wider rounded-xl transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                        Filtros Avanzados
                        <svg class="w-3.5 h-3.5 transform transition-transform duration-300" id="lib-adv-chevron"
                            fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>

                <!-- Expanded Advanced Filters container -->
                <div id="lib-adv-panel"
                    class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-slate-200 dark:border-slate-800/40 hidden overflow-hidden transition-all duration-300">
                    <!-- Year selector -->
                    <div class="space-y-2">
                        <label for="lib-filter-year"
                            class="block text-[10px] font-bold uppercase tracking-widest text-slate-500 dark:text-slate-400">Filtrar
                            por Año</label>
                        <select id="lib-filter-year"
                            class="w-full bg-slate-50 dark:bg-[#030914] border border-slate-300 dark:border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-700 dark:text-slate-300 outline-none focus:border-blue-500 transition-colors">
                            <option value="all">Todos los años</option>
                            <?php foreach ($available_years as $year): ?>
                                <option value="<?php echo esc_attr($year); ?>"><?php echo esc_html($year); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Category selector -->
                    <div class="space-y-2">
                        <label for="lib-filter-category"
                            class="block text-[10px] font-bold uppercase tracking-widest text-slate-500 dark:text-slate-400">Filtrar
                            por Categoría</label>
                        <select id="lib-filter-category"
                            class="w-full bg-slate-50 dark:bg-[#030914] border border-slate-300 dark:border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-700 dark:text-slate-300 outline-none focus:border-blue-500 transition-colors">
                            <option value="all">Todas las categorías</option>
                            <?php foreach ($categories_map as $slug => $name): ?>
                                <option value="<?php echo esc_attr($slug); ?>"><?php echo esc_html($name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Sorter -->
                    <div class="space-y-2">
                        <label for="lib-sort-by"
                            class="block text-[10px] font-bold uppercase tracking-widest text-slate-500 dark:text-slate-400">Ordenar
                            por</label>
                        <select id="lib-sort-by"
                            class="w-full bg-slate-50 dark:bg-[#030914] border border-slate-300 dark:border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-700 dark:text-slate-300 outline-none focus:border-blue-500 transition-colors">
                            <option value="recent">Más recientes</option>
                            <option value="oldest">Más antiguos</option>
                            <option value="alpha-asc">Título: A-Z</option>
                            <option value="alpha-desc">Título: Z-A</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================
             3. PUBLICATIONS GRID
             ============================================================ -->
        <section class="space-y-8">
            <!-- Grid Title -->
            <div class="flex items-center gap-4">
                <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Publicaciones Recientes
                </h2>
                <span id="lib-count-badge"
                    class="px-3 py-1 bg-blue-500/10 border border-blue-500/20 text-blue-600 dark:text-blue-400 text-xs font-black rounded-full">
                    <?php echo esc_html($total_pubs); ?>
                </span>
            </div>

            <!-- Empty Results message -->
            <div id="lib-empty-results"
                class="hidden py-24 text-center space-y-4 bg-white/60 dark:bg-[#070e1e]/40 border border-dashed border-slate-300 dark:border-slate-800 rounded-[2rem]">
                <div
                    class="w-16 h-16 mx-auto bg-slate-200 dark:bg-slate-800/40 rounded-full flex items-center justify-center text-slate-400 dark:text-slate-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h4 class="text-lg font-bold text-slate-800 dark:text-white">No se encontraron publicaciones</h4>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-light max-w-md mx-auto">Prueba a modificar los
                    términos de búsqueda o a desactivar algunos de los filtros avanzados seleccionados.</p>
                <button id="lib-reset-filters"
                    class="px-5 py-2.5 bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition-all">Limpiar
                    Filtros</button>
            </div>

            <!-- Documents Grid — Portrait Format -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="lib-grid-container">
                <?php
                foreach ($posts_list as $p):
                    $pdf_url = $p['pdf_url'];
                    $doc_type = $p['doc_type'];
                    $author = $p['author'];
                    $year = $p['year'];
                    $cat_slugs_str = implode(',', $p['categories']);

                    // Get featured image for real posts
                    $thumb_url = '';
                    if (!$p['is_demo'] && isset($p['post_id'])) {
                        $thumb_url = get_the_post_thumbnail_url($p['post_id'], 'medium_large');
                    }
                    // Also try via pdf link to match by ID stored in p
                    // For real posts, we stored the permalink as pdf_url or a real url
                    // We need to extract the post ID — let's check p for it
                    if (!$thumb_url && !$p['is_demo']) {
                        // Try to get from permalink matching
                        $maybe_id = url_to_postid($pdf_url);
                        if ($maybe_id) {
                            $thumb_url = get_the_post_thumbnail_url($maybe_id, 'medium_large');
                        }
                    }

                    // Card type-specific color mappings
                    $badge_label = 'Documento';
                    $badge_color = 'text-slate-200';
                    $accent_rgb = '59, 130, 246';       // blue fallback
                    $gradient_from = '#1e3a5f';
                    $gradient_to = '#0f172a';

                    switch ($doc_type) {
                        case 'informe':
                        case 'informe_tematico':
                            $badge_label = 'Informe';
                            $badge_color = 'text-emerald-300';
                            $accent_rgb = '16, 185, 129';
                            $gradient_from = '#064e3b';
                            $gradient_to = '#0f172a';
                            break;
                        case 'infografia':
                            $badge_label = 'Infografía';
                            $badge_color = 'text-amber-300';
                            $accent_rgb = '245, 158, 11';
                            $gradient_from = '#451a03';
                            $gradient_to = '#0f172a';
                            break;
                        case 'libro':
                        case 'libro_investigacion':
                            $badge_label = 'Libro';
                            $badge_color = 'text-violet-300';
                            $accent_rgb = '139, 92, 246';
                            $gradient_from = '#2e1065';
                            $gradient_to = '#0f172a';
                            break;
                        case 'folleto-guia':
                        case 'folletos_guias':
                            $badge_label = 'Folleto / Guía';
                            $badge_color = 'text-sky-300';
                            $accent_rgb = '14, 165, 233';
                            $gradient_from = '#0c4a6e';
                            $gradient_to = '#0f172a';
                            break;
                        case 'boletin':
                            $badge_label = 'Boletín';
                            $badge_color = 'text-rose-300';
                            $accent_rgb = '244, 63, 94';
                            $gradient_from = '#4c0519';
                            $gradient_to = '#0f172a';
                            break;
                        case 'tematicos':
                            $badge_label = 'Temático';
                            $badge_color = 'text-indigo-300';
                            $accent_rgb = '99, 102, 241';
                            $gradient_from = '#1e1b4b';
                            $gradient_to = '#0f172a';
                            break;
                        case 'lectura':
                            $badge_label = 'Lectura';
                            $badge_color = 'text-indigo-300';
                            $accent_rgb = '99, 102, 241';
                            $gradient_from = '#1e1b4b';
                            $gradient_to = '#0f172a';
                            break;
                        default:
                            $tax_term = get_term_by('slug', $doc_type, 'tipo_biblioteca');
                            if ($tax_term && !is_wp_error($tax_term)) {
                                $badge_label = $tax_term->name;
                            }
                            break;
                    }

                    // Determine link
                    $card_link = $p['is_demo'] ? '#' : esc_url($pdf_url);

                    // Border-top accent color for light mode fallback cards
                    $border_top_css = "border-top: 3px solid rgba({$accent_rgb}, 0.5);";
                    ?>

                    <!-- Portrait Card -->
                    <article
                        class="lib-card group relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 cursor-pointer"
                        style="aspect-ratio: 3/4; <?php echo $border_top_css; ?>"
                        data-title="<?php echo esc_attr(mb_strtolower($p['title'])); ?>"
                        data-excerpt="<?php echo esc_attr(mb_strtolower($p['excerpt'])); ?>"
                        data-type="<?php echo esc_attr($doc_type); ?>" data-year="<?php echo esc_attr($year); ?>"
                        data-category="<?php echo esc_attr($cat_slugs_str); ?>"
                        data-author="<?php echo esc_attr(mb_strtolower($author)); ?>"
                        data-date="<?php echo esc_attr($p['date']); ?>">

                        <!-- Background: image or colored gradient -->
                        <?php if ($thumb_url): ?>
                            <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($p['title']); ?>"
                                class="absolute inset-0 w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700">
                        <?php else: ?>
                            <!-- Gradient fallback when no image -->
                            <div class="absolute inset-0"
                                style="background: linear-gradient(160deg, <?php echo $gradient_from; ?> 0%, <?php echo $gradient_to; ?> 100%);">
                            </div>
                            <!-- Document icon watermark -->
                            <div class="absolute inset-0 flex items-center justify-center opacity-10">
                                <svg class="w-28 h-28 text-white" fill="none" stroke="currentColor" stroke-width="0.5"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                        <?php endif; ?>

                        <!-- Gradient overlay: stronger at bottom for readability -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-black/10 group-hover:from-black/95 transition-all duration-500">
                        </div>

                        <!-- Subtle color accent glow at bottom -->
                        <div class="absolute bottom-0 left-0 right-0 h-1/3 opacity-30 group-hover:opacity-50 transition-opacity duration-500"
                            style="background: linear-gradient(to top, rgba(<?php echo $accent_rgb; ?>, 0.4), transparent);">
                        </div>

                        <!-- Spotlight glow on hover -->
                        <div class="lib-spotlight absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"
                            style="background: radial-gradient(280px circle at var(--x) var(--y), rgba(<?php echo $accent_rgb; ?>, 0.15), transparent 60%);">
                        </div>

                        <!-- Card Content (bottom) -->
                        <div class="absolute inset-0 flex flex-col justify-between p-5">

                            <!-- Top: Type badge & Year -->
                            <div class="flex items-start justify-between">
                                <span
                                    class="inline-block px-2.5 py-1 rounded-lg text-[9px] font-black uppercase tracking-[0.18em] <?php echo esc_attr($badge_color); ?> backdrop-blur-md"
                                    style="background: rgba(0,0,0,0.45); border: 1px solid rgba(<?php echo $accent_rgb; ?>, 0.35);">
                                    <?php echo esc_html($badge_label); ?>
                                </span>
                                <span
                                    class="text-[11px] font-bold text-white/60 tabular-nums"><?php echo esc_html($year); ?></span>
                            </div>

                            <!-- Bottom: Title + Author + Button -->
                            <div
                                class="space-y-3 transform translate-y-1 group-hover:translate-y-0 transition-transform duration-400">
                                <!-- Title -->
                                <h3
                                    class="text-sm md:text-base font-black text-white leading-snug tracking-tight line-clamp-3 drop-shadow-lg">
                                    <?php echo esc_html($p['title']); ?>
                                </h3>

                                <!-- Author -->
                                <p class="text-[11px] text-white/55 font-medium truncate flex items-center gap-1.5">
                                    <svg class="w-3 h-3 shrink-0 opacity-70" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <?php echo esc_html($author); ?>
                                </p>

                                <!-- CTA Button -->
                                <?php if (!$p['is_demo']): ?>
                                    <a href="<?php echo esc_url($pdf_url); ?>"
                                        class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-black uppercase tracking-wider text-white transition-all duration-300 group-hover:gap-2.5 opacity-0 group-hover:opacity-100 transform translate-y-1 group-hover:translate-y-0"
                                        style="background: rgba(<?php echo $accent_rgb; ?>, 0.85); backdrop-filter: blur(4px);"
                                        onclick="event.stopPropagation()">
                                        Leer más
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5"
                                            viewBox="0 0 24 24">
                                            <path d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                <?php else: ?>
                                    <span
                                        class="inline-flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-white/40">Demo</span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Full card link overlay (behind content) -->
                        <?php if (!$p['is_demo']): ?>
                            <a href="<?php echo esc_url($pdf_url); ?>" class="absolute inset-0 z-0"
                                aria-label="<?php echo esc_attr($p['title']); ?>"></a>
                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>
            </div>

            <!-- Paginator -->
            <div id="lib-pagination" class="flex items-center justify-center gap-2.5 mt-12 pb-6"></div>
        </section>
    </div>
</main>


<!-- =====================================================================
     STYLES: Card light/dark hover shadows + filter transitions
     ===================================================================== -->
<style>
    /* ── Light mode card top-border accent ── */
    .light-card-emerald {
        border-top: 3px solid rgba(16, 185, 129, 0.4);
    }

    .light-card-amber {
        border-top: 3px solid rgba(245, 158, 11, 0.4);
    }

    .light-card-violet {
        border-top: 3px solid rgba(139, 92, 246, 0.4);
    }

    .light-card-sky {
        border-top: 3px solid rgba(14, 165, 233, 0.4);
    }

    .light-card-rose {
        border-top: 3px solid rgba(244, 63, 94, 0.4);
    }

    .light-card-indigo {
        border-top: 3px solid rgba(99, 102, 241, 0.4);
    }

    .light-card-slate {
        border-top: 3px solid rgba(100, 116, 139, 0.3);
    }

    /* ── Dark mode hover glows ── */
    .dark .light-card-emerald:hover {
        box-shadow: 0 20px 40px -15px rgba(16, 185, 129, 0.15);
    }

    .dark .light-card-amber:hover {
        box-shadow: 0 20px 40px -15px rgba(245, 158, 11, 0.15);
    }

    .dark .light-card-violet:hover {
        box-shadow: 0 20px 40px -15px rgba(139, 92, 246, 0.15);
    }

    .dark .light-card-sky:hover {
        box-shadow: 0 20px 40px -15px rgba(14, 165, 233, 0.15);
    }

    .dark .light-card-rose:hover {
        box-shadow: 0 20px 40px -15px rgba(244, 63, 94, 0.15);
    }

    .dark .light-card-indigo:hover {
        box-shadow: 0 20px 40px -15px rgba(99, 102, 241, 0.15);
    }

    /* ── Light mode hover shadows ── */
    .light-card-emerald:hover {
        box-shadow: 0 12px 30px -10px rgba(16, 185, 129, 0.12);
    }

    .light-card-amber:hover {
        box-shadow: 0 12px 30px -10px rgba(245, 158, 11, 0.12);
    }

    .light-card-violet:hover {
        box-shadow: 0 12px 30px -10px rgba(139, 92, 246, 0.12);
    }

    .light-card-sky:hover {
        box-shadow: 0 12px 30px -10px rgba(14, 165, 233, 0.12);
    }

    .light-card-rose:hover {
        box-shadow: 0 12px 30px -10px rgba(244, 63, 94, 0.12);
    }

    .light-card-indigo:hover {
        box-shadow: 0 12px 30px -10px rgba(99, 102, 241, 0.12);
    }

    /* ── Inactive tabs — light & dark ── */
    .lib-tab-inactive {
        background-color: #f1f5f9;
        border: 1px solid #e2e8f0;
        color: #64748b;
    }

    .dark .lib-tab-inactive {
        background-color: #0b1326;
        border: 1px solid rgba(30, 41, 59, 1);
        color: #94a3b8;
    }

    .lib-tab-inactive:hover {
        background-color: #e2e8f0;
        color: #1e293b;
    }

    .dark .lib-tab-inactive:hover {
        background-color: #0f1c38;
        border-color: rgba(51, 65, 85, 1);
        color: #ffffff;
    }

    /* ── Filter transitions for cards ── */
    .lib-card {
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1),
            opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1),
            border-color 0.3s ease,
            box-shadow 0.3s ease;
    }

    .lib-card.card-hidden {
        opacity: 0 !important;
        transform: scale(0.92) translateY(10px) !important;
        pointer-events: none !important;
        position: absolute !important;
        width: 0 !important;
        height: 0 !important;
        padding: 0 !important;
        margin: 0 !important;
        border: none !important;
        overflow: hidden !important;
    }
</style>

<!-- =====================================================================
     CLIENT-SIDE JAVASCRIPT FILTER ENGINE
     ===================================================================== -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Spotlight Card mouse position tracker
        const cards = document.querySelectorAll('.lib-card');
        cards.forEach(card => {
            card.addEventListener('mousemove', function (e) {
                const rect = card.getBoundingClientRect();
                card.style.setProperty('--x', (e.clientX - rect.left) + 'px');
                card.style.setProperty('--y', (e.clientY - rect.top) + 'px');
            });
        });

        // Elements
        const searchInput = document.getElementById('lib-search-input');
        const tabs = document.querySelectorAll('.lib-tab');
        const filterYear = document.getElementById('lib-filter-year');
        const filterCategory = document.getElementById('lib-filter-category');
        const sortBy = document.getElementById('lib-sort-by');
        const advTrigger = document.getElementById('lib-adv-trigger');
        const advChevron = document.getElementById('lib-adv-chevron');
        const advPanel = document.getElementById('lib-adv-panel');
        const countBadge = document.getElementById('lib-count-badge');
        const emptyResults = document.getElementById('lib-empty-results');
        const btnReset = document.getElementById('lib-reset-filters');
        const gridContainer = document.getElementById('lib-grid-container');

        // Advanced Filters Panel Toggle
        if (advTrigger && advPanel) {
            advTrigger.addEventListener('click', function () {
                advPanel.classList.toggle('hidden');
                advChevron.classList.toggle('rotate-180');
            });
        }

        // Active Filters State
        let activeFilters = { search: '', type: 'all', year: 'all', category: 'all', sort: 'recent' };
        let currentPage = 1;
        const itemsPerPage = 12;
        const paginationContainer = document.getElementById('lib-pagination');

        // Filter Logic
        function applyFilters() {
            let visibleCount = 0;
            const visibleCardsList = [];

            cards.forEach(card => {
                const title = card.getAttribute('data-title') || '';
                const excerpt = card.getAttribute('data-excerpt') || '';
                const type = card.getAttribute('data-type') || '';
                const year = card.getAttribute('data-year') || '';
                const categories = card.getAttribute('data-category') || '';
                const author = card.getAttribute('data-author') || '';

                const matchesSearch = activeFilters.search === '' || title.includes(activeFilters.search) || excerpt.includes(activeFilters.search) || author.includes(activeFilters.search);
                const matchesType = activeFilters.type === 'all' || type === activeFilters.type;
                const matchesYear = activeFilters.year === 'all' || year === activeFilters.year;
                const matchesCategory = activeFilters.category === 'all' || categories.split(',').includes(activeFilters.category);

                if (matchesSearch && matchesType && matchesYear && matchesCategory) {
                    visibleCount++;
                    visibleCardsList.push(card);
                } else {
                    card.classList.add('card-hidden');
                }
            });

            // Apply Sorter to DOM & Paginate
            if (visibleCardsList.length > 0) {
                const sortedCards = [...visibleCardsList].sort((a, b) => {
                    if (activeFilters.sort === 'recent') return parseInt(b.getAttribute('data-date')) - parseInt(a.getAttribute('data-date'));
                    if (activeFilters.sort === 'oldest') return parseInt(a.getAttribute('data-date')) - parseInt(b.getAttribute('data-date'));
                    if (activeFilters.sort === 'alpha-asc') return a.getAttribute('data-title').localeCompare(b.getAttribute('data-title'));
                    if (activeFilters.sort === 'alpha-desc') return b.getAttribute('data-title').localeCompare(a.getAttribute('data-title'));
                    return 0;
                });

                // Re-append sorted cards in DOM
                sortedCards.forEach(card => gridContainer.appendChild(card));

                // Paginate: Select slice for currentPage
                const totalPages = Math.ceil(visibleCardsList.length / itemsPerPage) || 1;
                if (currentPage > totalPages) {
                    currentPage = totalPages;
                }

                const startIndex = (currentPage - 1) * itemsPerPage;
                const endIndex = startIndex + itemsPerPage;

                sortedCards.forEach((card, index) => {
                    if (index >= startIndex && index < endIndex) {
                        card.classList.remove('card-hidden');
                    } else {
                        card.classList.add('card-hidden');
                    }
                });

                renderPagination(totalPages);
            } else {
                if (paginationContainer) paginationContainer.innerHTML = '';
            }

            if (countBadge) countBadge.textContent = visibleCount;
            emptyResults.classList.toggle('hidden', visibleCount > 0);
        }

        // Render paginator buttons dynamically
        function renderPagination(totalPages) {
            if (!paginationContainer) return;
            paginationContainer.innerHTML = '';

            if (totalPages <= 1) {
                paginationContainer.classList.add('hidden');
                return;
            }
            paginationContainer.classList.remove('hidden');

            const btnClass = "px-4 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider transition-all duration-300 hover:scale-105";
            const activeBtnClass = "bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-500/20";
            const inactiveBtnClass = "bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-white/10";

            // Previous Button
            const prevBtn = document.createElement('button');
            prevBtn.className = `${btnClass} ${currentPage === 1 ? 'opacity-40 cursor-not-allowed' : ''} ${inactiveBtnClass}`;
            prevBtn.innerHTML = "&larr; Ant";
            prevBtn.disabled = currentPage === 1;
            prevBtn.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    applyFilters();
                    const tabsEl = document.getElementById('lib-type-tabs');
                    if (tabsEl) window.scrollTo({ top: tabsEl.offsetTop - 100, behavior: 'smooth' });
                }
            });
            paginationContainer.appendChild(prevBtn);

            // Page Numbers
            for (let i = 1; i <= totalPages; i++) {
                const pageBtn = document.createElement('button');
                pageBtn.className = `${btnClass} ${i === currentPage ? activeBtnClass : inactiveBtnClass}`;
                pageBtn.textContent = i;
                pageBtn.addEventListener('click', () => {
                    currentPage = i;
                    applyFilters();
                    const tabsEl = document.getElementById('lib-type-tabs');
                    if (tabsEl) window.scrollTo({ top: tabsEl.offsetTop - 100, behavior: 'smooth' });
                });
                paginationContainer.appendChild(pageBtn);
            }

            // Next Button
            const nextBtn = document.createElement('button');
            nextBtn.className = `${btnClass} ${currentPage === totalPages ? 'opacity-40 cursor-not-allowed' : ''} ${inactiveBtnClass}`;
            nextBtn.innerHTML = "Sig &rarr;";
            nextBtn.disabled = currentPage === totalPages;
            nextBtn.addEventListener('click', () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    applyFilters();
                    const tabsEl = document.getElementById('lib-type-tabs');
                    if (tabsEl) window.scrollTo({ top: tabsEl.offsetTop - 100, behavior: 'smooth' });
                }
            });
            paginationContainer.appendChild(nextBtn);
        }

        // Search
        if (searchInput) {
            searchInput.addEventListener('input', function () {
                activeFilters.search = this.value.trim().toLowerCase();
                currentPage = 1;
                applyFilters();
            });
        }

        // Tabs
        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                tabs.forEach(t => {
                    t.classList.remove('active', 'bg-gradient-to-r', 'from-blue-600', 'to-indigo-600', 'text-white', 'shadow-lg', 'shadow-blue-500/20');
                    t.classList.add('lib-tab-inactive');
                });
                this.classList.remove('lib-tab-inactive');
                this.classList.add('active', 'bg-gradient-to-r', 'from-blue-600', 'to-indigo-600', 'text-white', 'shadow-lg', 'shadow-blue-500/20');
                activeFilters.type = this.getAttribute('data-type');
                currentPage = 1;
                applyFilters();
            });
        });

        if (filterYear) filterYear.addEventListener('change', function () { activeFilters.year = this.value; currentPage = 1; applyFilters(); });
        if (filterCategory) filterCategory.addEventListener('change', function () { activeFilters.category = this.value; currentPage = 1; applyFilters(); });
        if (sortBy) sortBy.addEventListener('change', function () { activeFilters.sort = this.value; currentPage = 1; applyFilters(); });

        // Auto-filter from URL ?tipo= parameter (used by home page publication buttons)
        var urlParams = new URLSearchParams(window.location.search);
        var tipoParam = urlParams.get('tipo');
        if (tipoParam && tipoParam !== 'all') {
            var matchingTab = document.querySelector('.lib-tab[data-type="' + tipoParam + '"]');
            if (matchingTab) {
                tabs.forEach(function (t) {
                    t.classList.remove('active', 'bg-gradient-to-r', 'from-blue-600', 'to-indigo-600', 'text-white', 'shadow-lg', 'shadow-blue-500/20');
                    t.classList.add('lib-tab-inactive');
                });
                matchingTab.classList.remove('lib-tab-inactive');
                matchingTab.classList.add('active', 'bg-gradient-to-r', 'from-blue-600', 'to-indigo-600', 'text-white', 'shadow-lg', 'shadow-blue-500/20');
                activeFilters.type = tipoParam;
                currentPage = 1;
                applyFilters();
                // Scroll to the filter section smoothly
                setTimeout(function () {
                    var filterSection = document.getElementById('lib-type-tabs');
                    if (filterSection) filterSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 200);
            }
        }

        // Reset
        if (btnReset) {
            btnReset.addEventListener('click', function () {
                if (searchInput) searchInput.value = '';
                if (filterYear) filterYear.value = 'all';
                if (filterCategory) filterCategory.value = 'all';
                if (sortBy) sortBy.value = 'recent';

                activeFilters = { search: '', type: 'all', year: 'all', category: 'all', sort: 'recent' };
                currentPage = 1;

                tabs.forEach((tab, index) => {
                    if (index === 0) {
                        tab.classList.remove('lib-tab-inactive');
                        tab.classList.add('active', 'bg-gradient-to-r', 'from-blue-600', 'to-indigo-600', 'text-white', 'shadow-lg', 'shadow-blue-500/20');
                    } else {
                        tab.classList.remove('active', 'bg-gradient-to-r', 'from-blue-600', 'to-indigo-600', 'text-white', 'shadow-lg', 'shadow-blue-500/20');
                        tab.classList.add('lib-tab-inactive');
                    }
                });

                applyFilters();
            });
        }
    });
</script>

<?php
get_footer();
