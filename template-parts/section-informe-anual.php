<?php
/**
 * Template part: Sección Informe Anual
 * Prioridad:
 * 1. Última publicación con taxonomía tipo_biblioteca = 'informe-anual'
 * 2. Meta flag _modern_blog_is_annual_report = '1'
 * 3. Cualquier publicación reciente del CPT (último recurso)
 */

// 1. Buscar por taxonomía 'informe-anual' (slug que WordPress genera automáticamente)
$annual_query = new WP_Query(array(
    'post_type' => 'informes',
    'posts_per_page' => 1,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => array(
        array(
            'taxonomy' => 'tipo_biblioteca',
            'field' => 'slug',
            'terms' => array('informe-anual', 'informe_anual', 'annual-report'),
            'operator' => 'IN',
        ),
    ),
));

// 2. Fallback: meta flag
if (!$annual_query->have_posts()) {
    $annual_query = new WP_Query(array(
        'post_type' => 'informes',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'meta_query' => array(
            array(
                'key' => '_modern_blog_is_annual_report',
                'value' => '1',
            ),
        ),
    ));
}

// 3. Fallback: publicación más reciente
if (!$annual_query->have_posts()) {
    $annual_query = new WP_Query(array(
        'post_type' => 'informes',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    ));
}

if (!$annual_query->have_posts()) {
    wp_reset_postdata();
    return;
}

$annual_query->the_post();
$annual_id = get_the_ID();
$annual_title = get_the_title();
$annual_year = get_post_meta($annual_id, '_modern_blog_doc_year', true);
$annual_year = $annual_year ? $annual_year : get_the_date('Y');
$annual_author = get_post_meta($annual_id, '_modern_blog_doc_author', true);
$annual_author = $annual_author ? $annual_author : 'OVP';
$annual_excerpt = wp_trim_words(get_the_excerpt(), 30);
$annual_pdf = get_post_meta($annual_id, '_modern_blog_pdf_url', true);
$annual_thumb = get_the_post_thumbnail_url($annual_id, 'large');
wp_reset_postdata();
?>

<section class="py-20 bg-slate-50 dark:bg-[#070e1e] relative overflow-hidden transition-colors duration-300">

    <!-- Ambient glow (no background image, completely flat with subtle glows to not interfere) -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div
            class="absolute -top-32 -right-32 w-[600px] h-[600px] bg-blue-600/5 dark:bg-blue-600/10 rounded-full blur-[100px]">
        </div>
        <div
            class="absolute -bottom-32 -left-32 w-[400px] h-[400px] bg-amber-500/5 dark:bg-amber-500/8 rounded-full blur-[80px]">
        </div>
    </div>

    <div class="container mx-auto px-6 relative z-10">

        <!-- Section Header -->
        <div class="flex items-center gap-4 mb-10">
            <div class="h-px flex-1 bg-gradient-to-r from-transparent via-slate-300 dark:via-slate-700 to-transparent">
            </div>
            <span class="text-blue-600 text-xs font-black uppercase tracking-[0.3em]">Publicación Destacada</span>
            <div class="h-px flex-1 bg-gradient-to-r from-transparent via-slate-300 dark:via-slate-700 to-transparent">
            </div>
        </div>

        <!-- Main Card with Animated Border -->
        <div class="annual-report-card relative rounded-[2.5rem] overflow-hidden">

            <!-- Animated border wrapper -->
            <div class="annual-border-ring" aria-hidden="true"></div>

            <!-- Inner card (Flex order: Content on left, standalone Cover Image on right) -->
            <div
                class="inner-card relative z-10 m-[3px] rounded-[2.4rem] overflow-hidden bg-white/95 dark:bg-[#0d1527]/95 backdrop-blur-md flex flex-col lg:flex-row items-center gap-10 lg:gap-16 p-8 md:p-12 lg:p-16 min-h-[460px] transition-colors duration-300">

                <!-- Content (Left side on desktop) -->
                <div class="lg:w-3/5 w-full order-1 lg:order-1 flex flex-col justify-between">
                    <div class="space-y-6">
                        <!-- Label -->
                        <div class="flex items-center gap-3">
                            <span
                                class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-500/10 border border-blue-500/20 text-blue-600 dark:text-blue-400 text-[10px] font-black uppercase tracking-[0.2em] rounded-full">
                                <span class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-pulse"></span>
                                Informe Anual
                            </span>
                        </div>

                        <!-- Title -->
                        <h2
                            class="text-2xl md:text-3xl lg:text-4xl font-black text-slate-900 dark:text-white tracking-tight leading-tight transition-colors duration-300">
                            <?php echo esc_html($annual_title); ?>
                        </h2>

                        <!-- Excerpt / Invitation text -->
                        <p
                            class="text-slate-600 dark:text-slate-300 leading-relaxed text-base font-light transition-colors duration-300">
                            <?php if ($annual_excerpt): ?>
                                <?php echo esc_html($annual_excerpt); ?>
                            <?php else: ?>
                                Descubre el análisis más completo sobre la situación penitenciaria en Venezuela. Nuestro
                                informe anual reúne datos, testimonios y hallazgos que visibilizan la realidad de los
                                centros de detención del país.
                            <?php endif; ?>
                        </p>

                        <!-- Meta -->
                        <div
                            class="flex flex-wrap items-center gap-5 text-xs text-slate-400 dark:text-slate-500 font-medium transition-colors duration-300">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <?php echo esc_html($annual_author); ?>
                            </span>
                            <span class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Acceso Abierto
                            </span>
                        </div>

                        <!-- CTA Buttons -->
                        <div
                            class="flex flex-wrap items-center gap-4 pt-6 border-t border-slate-200/60 dark:border-slate-700/50 transition-colors duration-300">
                            <a href="<?php echo esc_url(get_permalink($annual_id)); ?>"
                                class="inline-flex items-center gap-2 px-8 py-3.5 bg-blue-600 hover:bg-blue-500 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-blue-600/25 hover:shadow-blue-500/30 hover:-translate-y-0.5 group">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Ver informe completo
                                <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none"
                                    stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <?php if ($annual_pdf && strpos($annual_pdf, 'http') === 0): ?>
                                <a href="<?php echo esc_url($annual_pdf); ?>" target="_blank" rel="noopener"
                                    class="inline-flex items-center gap-2 px-6 py-3.5 bg-slate-100 dark:bg-white/5 hover:bg-slate-200 dark:hover:bg-white/10 text-slate-700 dark:text-slate-300 text-sm font-bold rounded-xl transition-all border border-slate-200 dark:border-white/10 group">
                                    <svg class="w-4 h-4 group-hover:translate-y-0.5 transition-transform" fill="none"
                                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Descargar PDF
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Cover Image (Right side on desktop, centered standalone book cover) -->
                <div class="lg:w-2/5 w-full flex justify-center items-center order-2 lg:order-2">
                    <div class="relative inline-block group">
                        <?php if ($annual_thumb): ?>
                            <img src="<?php echo esc_url($annual_thumb); ?>"
                                alt="<?php echo esc_attr($annual_title); ?>"
                                class="annual-report-cover rounded-2xl shadow-2xl border border-slate-100 dark:border-white/10 transition-transform duration-500 hover:scale-[1.03]">
                        <?php else: ?>
                            <!-- Fallback if no cover image -->
                            <div
                                class="annual-report-fallback bg-gradient-to-br from-blue-900 to-slate-900 rounded-2xl shadow-2xl border border-white/10 flex flex-col items-center justify-center gap-4 p-6">
                                <svg class="w-10 h-10 text-blue-400/30" fill="none" stroke="currentColor" stroke-width="1"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span class="text-white/30 text-[9px] font-bold text-center">Agrega una imagen
                                    destacada</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<style>
    /* ── Standalone Book Cover Sizes overrides ── */
    .annual-report-cover {
        height: 180px !important;
        width: auto !important;
        max-width: 100% !important;
        object-fit: contain !important;
    }

    .annual-report-fallback {
        height: 180px !important;
        width: 130px !important;
    }

    @media (min-width: 768px) {
        .annual-report-cover {
            height: 450px !important;
        }

        .annual-report-fallback {
            height: 450px !important;
            width: 380px !important;
        }
    }

    /* ── Premium Light & Dark Mode card overrides ── */
    .annual-report-card .inner-card {
        background-color: rgba(255, 255, 255, 0.96) !important;
        border-color: rgba(226, 232, 240, 0.8) !important;
        color: #0f172a !important;
        transition: background-color 0.3s, border-color 0.3s, color 0.3s;
    }

    .dark .annual-report-card .inner-card {
        background-color: rgba(13, 21, 39, 0.96) !important;
        border-color: rgba(30, 41, 59, 0.8) !important;
        color: #f8fafc !important;
    }

    .dark .annual-report-card h2 {
        color: #ffffff !important;
    }

    .dark .annual-report-card p {
        color: #cbd5e1 !important;
    }

    .dark .annual-report-card .text-slate-400 {
        color: #94a3b8 !important;
    }

    .dark .annual-report-card .text-slate-500 {
        color: #cbd5e1 !important;
    }

    .dark .annual-report-card .border-t {
        border-color: rgba(30, 41, 59, 0.8) !important;
    }

    /* ── Animated gradient border for the annual report card ── */
    .annual-report-card {
        position: relative;
        border-radius: 2.5rem;
    }

    .annual-border-ring {
        position: absolute;
        inset: 0;
        border-radius: 2.5rem;
        padding: 3px;
        background: conic-gradient(from var(--angle, 0deg),
                #1e40af 0%,
                #3b82f6 15%,
                #60a5fa 25%,
                #f59e0b 40%,
                #ef4444 55%,
                #3b82f6 70%,
                #1e40af 85%,
                #1e40af 100%);
        -webkit-mask:
            linear-gradient(#fff 0 0) content-box,
            linear-gradient(#fff 0 0);
        -webkit-mask-composite: destination-out;
        mask-composite: exclude;
        animation: border-spin 4s linear infinite;
        z-index: 1;
    }

    @property --angle {
        syntax: '<angle>';
        initial-value: 0deg;
        inherits: false;
    }

    @keyframes border-spin {
        to {
            --angle: 360deg;
        }
    }

    @supports not (background: conic-gradient(from 0deg, red, blue)) {
        .annual-border-ring {
            background: linear-gradient(135deg, #3b82f6, #f59e0b, #ef4444, #3b82f6);
            background-size: 300% 300%;
            animation: border-gradient-fallback 3s linear infinite;
        }

        @keyframes border-gradient-fallback {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    }
</style>