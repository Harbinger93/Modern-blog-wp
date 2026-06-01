<?php
/**
 * Template part for displaying the Hero Slider or selectable home banners.
 * Supports 5 customizable layouts from the Customizer.
 *
 * @package ovp-theme
 */

$banner_style = get_theme_mod('ovp_banner_style', 'slider');

// ============================================================================
// LAYOUT: PREMIUM GLOW BANNER
// ============================================================================
if ($banner_style === 'glow') :
?>
    <section class="relative min-h-[85vh] bg-[#02060f] flex items-center justify-center py-20 overflow-hidden border-b border-slate-900">
        <div class="absolute top-0 right-1/4 w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-[140px] pointer-events-none -z-10 animate-pulse-slow"></div>
        <div class="absolute bottom-10 left-1/4 w-[500px] h-[500px] bg-indigo-600/10 rounded-full blur-[140px] pointer-events-none -z-10"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Text / Left column -->
                <div class="lg:col-span-7 space-y-6 text-left">
                    <span class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs font-bold uppercase tracking-wider rounded-full">
                        <span class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-ping"></span>
                        Defensa de Derechos Humanos
                    </span>
                    <h2 class="text-4xl md:text-6xl font-black text-white leading-tight tracking-tight">
                        Monitoreo Profesional del <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-indigo-400 to-purple-400 animate-gradient-x bg-[length:200%_auto]">Sistema Penitenciario</span>
                    </h2>
                    <p class="text-slate-400 text-lg font-light leading-relaxed max-w-xl">
                        Acompañamos a las víctimas, documentamos la realidad de las cárceles en Venezuela y abogamos por la justicia y dignidad humana ante organismos internacionales.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="<?php echo home_url('/biblioteca'); ?>" class="px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-blue-500/20 hover:-translate-y-0.5">
                            Explorar Biblioteca
                        </a>
                        <a href="<?php echo home_url('/nosotros'); ?>" class="px-8 py-4 bg-[#0b1326] border border-slate-800 hover:border-slate-700 text-slate-300 hover:text-white text-sm font-bold rounded-xl transition-all hover:-translate-y-0.5">
                            Nuestra Trayectoria
                        </a>
                    </div>
                </div>
                
                <!-- Floating Glass Card / Right column -->
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-md bg-[#070e1e]/60 backdrop-blur-xl border border-slate-800 rounded-[2.5rem] p-8 shadow-2xl flex flex-col justify-between aspect-[4/5] overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/5 to-indigo-600/5 opacity-50"></div>
                        <div class="relative z-10 h-full flex flex-col justify-between">
                            <div class="space-y-4">
                                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-400 bg-blue-500/10 px-3 py-1 rounded-md">Investigación Destacada</span>
                                <h3 class="text-2xl font-black text-white leading-snug tracking-tight">Situación Carcelaria en Venezuela 2026</h3>
                                <p class="text-slate-400 text-sm font-light leading-relaxed">
                                    Informe anual del Observatorio que detalla las estadísticas críticas de hacinamiento, alimentación, salud e infraestructura en los centros penales.
                                </p>
                            </div>
                            <div class="pt-8 border-t border-slate-800/60 mt-8 flex justify-between items-center">
                                <span class="text-xs text-slate-400 font-bold uppercase tracking-widest">Publicación Reciente</span>
                                <a href="<?php echo home_url('/biblioteca'); ?>" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition-colors shadow-md">
                                    Descargar PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
// ============================================================================
// LAYOUT: MINIMAL BANNER
// ============================================================================
elseif ($banner_style === 'minimal') :
?>
    <section class="relative min-h-[75vh] bg-[#030712] flex items-center justify-center py-20 overflow-hidden border-b border-slate-900">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-blue-600/5 rounded-full blur-[120px] pointer-events-none -z-10"></div>
        
        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="max-w-4xl mx-auto space-y-8">
                <span class="inline-block text-[11px] font-black uppercase tracking-[0.25em] text-blue-500">
                    Observatorio Venezolano de Prisiones
                </span>
                <h2 class="text-4xl md:text-7xl font-black text-white leading-none tracking-tight">
                    Investigación, Monitoreo y <br>
                    Defensa de los <span class="text-blue-500">Derechos Humanos</span>
                </h2>
                <p class="text-slate-400 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                    Documentamos con rigor profesional e independencia la realidad penitenciaria en Venezuela, defendiendo las garantías fundamentales.
                </p>
                <div class="flex justify-center gap-4 pt-4">
                    <a href="<?php echo home_url('/noticias'); ?>" class="px-8 py-3.5 bg-blue-600 hover:bg-blue-500 text-white text-sm font-bold rounded-xl transition-colors shadow-lg shadow-blue-600/20">
                        Últimas Noticias
                    </a>
                    <a href="<?php echo home_url('/biblioteca'); ?>" class="px-8 py-3.5 bg-white/5 border border-white/10 hover:bg-white/10 text-white text-sm font-bold rounded-xl transition-colors">
                        Biblioteca Documental
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php
// ============================================================================
// LAYOUT: NETFLIX STYLE CAROUSEL
// ============================================================================
elseif ($banner_style === 'netflix') :
    $nfx_query = new WP_Query(array('posts_per_page' => 6, 'post_status' => 'publish'));
    $nfx_posts = array();
    if ($nfx_query->have_posts()) {
        while ($nfx_query->have_posts()) {
            $nfx_query->the_post();
            $nfx_posts[] = array(
                'id'        => get_the_ID(),
                'title'     => get_the_title(),
                'excerpt'   => wp_trim_words(get_the_excerpt(), 28),
                'permalink' => get_permalink(),
                'date'      => get_the_date(),
                'thumb'     => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                'thumb_med' => get_the_post_thumbnail_url(get_the_ID(), 'medium_large'),
                'cats'      => get_the_category(),
            );
        }
        wp_reset_postdata();
    }
    $nfx_count = count($nfx_posts);
?>
    <section class="netflix-hero relative overflow-hidden" style="height: 100vh; min-height: 600px; background-color: #02060f;">

        <!-- ── MAIN FEATURE AREA ── -->
        <div id="nfx-main" class="absolute inset-0">
            <?php foreach ($nfx_posts as $i => $post) :
                $bg = $post['thumb'] ? $post['thumb'] : 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&q=80&w=2000';
                $cat_name = !empty($post['cats']) ? $post['cats'][0]->name : 'Noticia';
            ?>
                <div class="nfx-slide absolute inset-0 transition-all duration-700 <?php echo $i === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0'; ?>" data-nfx-slide="<?php echo $i; ?>">
                    <!-- Background image -->
                    <div class="absolute inset-0">
                        <img src="<?php echo esc_url($bg); ?>"
                             alt="<?php echo esc_attr($post['title']); ?>"
                             class="w-full h-full object-cover object-center">
                    </div>
                    <!-- Gradient overlays — deep blue theme-aware -->
                    <div class="absolute inset-0" style="background: linear-gradient(to right, rgba(2,6,31,0.92) 0%, rgba(2,6,31,0.55) 55%, rgba(2,6,31,0.10) 100%);"></div>
                    <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(2,6,31,1) 0%, rgba(2,6,31,0.0) 45%, rgba(2,6,31,0.25) 100%);"></div>

                    <!-- Content -->
                    <div class="absolute inset-0 flex items-center" style="padding-bottom: 200px;">
                        <div class="container mx-auto px-6 md:px-10">
                            <div class="max-w-2xl space-y-4">
                                <div class="flex items-center gap-3">
                                    <span class="px-3 py-1 bg-blue-600 text-white text-[11px] font-bold uppercase tracking-wider rounded">
                                        <?php echo esc_html($cat_name); ?>
                                    </span>
                                    <time class="text-white/60 text-xs uppercase tracking-wider"><?php echo esc_html($post['date']); ?></time>
                                </div>
                                <h2 class="text-3xl md:text-5xl lg:text-6xl font-black text-white leading-tight tracking-tight">
                                    <?php echo esc_html($post['title']); ?>
                                </h2>
                                <p class="text-white/70 text-base md:text-lg font-light leading-relaxed line-clamp-2">
                                    <?php echo esc_html($post['excerpt']); ?>
                                </p>
                                <div class="flex items-center gap-4 pt-2">
                                    <a href="<?php echo esc_url($post['permalink']); ?>"
                                       class="inline-flex items-center gap-2 px-8 py-3.5 bg-blue-600 hover:bg-blue-500 text-white text-sm font-black rounded-xl transition-colors shadow-xl shadow-blue-600/30">
                                        Leer más
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- ── THUMBNAILS BAR (bottom) ── -->
        <div class="absolute bottom-0 left-0 right-0 z-30" style="background: linear-gradient(to top, rgba(2,6,31,0.98) 55%, transparent);">
            <div class="container mx-auto px-6 md:px-10 pb-6 pt-8">
                <div id="nfx-thumbs" class="flex gap-3 overflow-x-auto pb-2 scrollbar-none">
                    <?php foreach ($nfx_posts as $i => $post) :
                        $thumb_bg = $post['thumb_med'] ? $post['thumb_med'] : $post['thumb'];
                        $fallback = !$thumb_bg;
                    ?>
                        <button class="nfx-thumb group flex-shrink-0 relative overflow-hidden rounded-xl cursor-pointer transition-all duration-300 focus:outline-none"
                                style="width: 140px; height: 190px;"
                                data-nfx-target="<?php echo $i; ?>"
                                id="nfx-thumb-<?php echo $i; ?>">
                            <!-- Thumbnail image -->
                            <?php if ($thumb_bg) : ?>
                                <img src="<?php echo esc_url($thumb_bg); ?>"
                                     alt="<?php echo esc_attr($post['title']); ?>"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <?php else : ?>
                                <div class="w-full h-full bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center">
                                    <span class="text-blue-500/40 text-2xl font-black">OVP</span>
                                </div>
                            <?php endif; ?>
                            <!-- Overlay gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            <!-- Active indicator bar at top -->
                            <div class="nfx-thumb-bar absolute top-0 left-0 right-0 h-[3px] bg-blue-500 transform origin-left scale-x-0 transition-transform duration-300" style="transform: scaleX(0);"></div>
                            <!-- Title -->
                            <div class="absolute bottom-0 left-0 right-0 p-3">
                                <p class="text-white text-[11px] font-bold leading-tight line-clamp-2 drop-shadow-md"><?php echo esc_html($post['title']); ?></p>
                            </div>
                            <!-- Hover ring -->
                            <div class="absolute inset-0 border-2 border-transparent group-hover:border-white/40 rounded-xl transition-colors duration-300 nfx-thumb-ring"></div>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Arrow navigation -->
        <button id="nfx-prev" class="absolute left-4 top-1/2 -translate-y-1/2 z-40 w-11 h-11 bg-black/40 hover:bg-black/70 backdrop-blur text-white rounded-full flex items-center justify-center transition-all border border-white/10 hover:border-white/30" style="margin-bottom: 200px;">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button id="nfx-next" class="absolute right-4 top-1/2 -translate-y-1/2 z-40 w-11 h-11 bg-black/40 hover:bg-black/70 backdrop-blur text-white rounded-full flex items-center justify-center transition-all border border-white/10 hover:border-white/30" style="margin-bottom: 200px;">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
        </button>
    </section>

    <style>
    .scrollbar-none::-webkit-scrollbar { display: none; }
    .scrollbar-none { -ms-overflow-style: none; scrollbar-width: none; }
    .nfx-thumb.is-active .nfx-thumb-ring { border-color: rgba(255,255,255,0.7) !important; }
    .nfx-thumb.is-active .nfx-thumb-bar  { transform: scaleX(1) !important; }
    .nfx-slide { will-change: opacity; }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const slides  = document.querySelectorAll('.nfx-slide');
        const thumbs  = document.querySelectorAll('.nfx-thumb');
        const prevBtn = document.getElementById('nfx-prev');
        const nextBtn = document.getElementById('nfx-next');
        let current   = 0;
        let autoTimer = null;

        if (!slides.length) return;

        function goTo(index) {
            // Clamp
            index = (index + slides.length) % slides.length;

            // Slides
            slides.forEach((s, i) => {
                s.classList.toggle('opacity-100', i === index);
                s.classList.toggle('z-10',        i === index);
                s.classList.toggle('opacity-0',   i !== index);
                s.classList.toggle('z-0',         i !== index);
            });

            // Thumbs
            thumbs.forEach((t, i) => {
                t.classList.toggle('is-active', i === index);
            });

            current = index;
        }

        function startAuto() {
            clearInterval(autoTimer);
            autoTimer = setInterval(() => goTo(current + 1), 7000);
        }

        // Thumb click
        thumbs.forEach((thumb, i) => {
            thumb.addEventListener('click', () => {
                goTo(i);
                startAuto(); // reset timer
            });
        });

        // Arrow buttons
        if (prevBtn) prevBtn.addEventListener('click', () => { goTo(current - 1); startAuto(); });
        if (nextBtn) nextBtn.addEventListener('click', () => { goTo(current + 1); startAuto(); });

        // Initialize
        goTo(0);
        startAuto();
    });
    </script>

<?php
// ============================================================================
// LAYOUT: ACCORDION FLEX CARDS
// ============================================================================
elseif ($banner_style === 'accordion') :
    $acc_query = new WP_Query(array('posts_per_page' => 5, 'post_status' => 'publish'));
    $acc_posts = array();
    if ($acc_query->have_posts()) {
        while ($acc_query->have_posts()) {
            $acc_query->the_post();
            $acc_posts[] = array(
                'id'        => get_the_ID(),
                'title'     => get_the_title(),
                'excerpt'   => wp_trim_words(get_the_excerpt(), 22),
                'permalink' => get_permalink(),
                'date'      => get_the_date(),
                'thumb'     => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                'cats'      => get_the_category(),
            );
        }
        wp_reset_postdata();
    }
?>
    <section class="accordion-hero relative" style="padding: 88px 24px 24px; background: transparent;">
        <div class="accordion-track flex overflow-hidden" style="height: 78vh; min-height: 480px; border-radius: 1.75rem; gap: 8px;">
            <?php foreach ($acc_posts as $i => $post) :
                $bg = $post['thumb'] ? $post['thumb'] : 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&q=80&w=1600';
                $cat_name = !empty($post['cats']) ? $post['cats'][0]->name : 'Noticia';
                $is_first = ($i === 0);
            ?>
                <div class="accordion-card relative overflow-hidden cursor-pointer transition-all duration-700 ease-in-out <?php echo $is_first ? 'is-active' : ''; ?>"
                     data-acc-index="<?php echo $i; ?>"
                     style="border-radius: 1.25rem;">

                    <!-- Background image -->
                    <div class="absolute inset-0">
                        <img src="<?php echo esc_url($bg); ?>"
                             alt="<?php echo esc_attr($post['title']); ?>"
                             class="w-full h-full object-cover object-center transition-transform duration-700 scale-105 group-hover:scale-110">
                    </div>

                    <!-- Gradient overlays -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
                    <div class="accordion-side-gradient absolute inset-0 bg-gradient-to-r from-black/60 to-transparent transition-opacity duration-500"></div>

                    <!-- ── COLLAPSED STATE: Chevron hint (bottom) ── -->
                    <div class="accordion-collapsed-label absolute bottom-5 left-0 right-0 flex justify-center transition-opacity duration-500 pointer-events-none">
                        <div class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-sm border border-white/30 flex items-center justify-center shadow-lg">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>

                    <!-- ── EXPANDED STATE: Full content ── -->
                    <div class="accordion-expanded-content absolute inset-0 flex flex-col justify-end p-8 md:p-12 transition-opacity duration-500 overflow-hidden">
                        <div class="max-w-lg space-y-4">
                            <div class="flex items-center gap-3">
                                <span class="px-3 py-1 bg-blue-600 text-white text-[11px] font-bold uppercase tracking-wider rounded">
                                    <?php echo esc_html($cat_name); ?>
                                </span>
                                <time class="text-white/60 text-xs uppercase tracking-wider"><?php echo esc_html($post['date']); ?></time>
                            </div>
                            <h2 class="text-2xl md:text-3xl xl:text-4xl font-black text-white leading-tight tracking-tight">
                                <?php echo esc_html($post['title']); ?>
                            </h2>
                            <p class="text-white/70 text-sm md:text-base font-light leading-relaxed line-clamp-3">
                                <?php echo esc_html($post['excerpt']); ?>
                            </p>
                            <a href="<?php echo esc_url($post['permalink']); ?>"
                               class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white text-sm font-bold rounded-xl transition-colors shadow-lg shadow-blue-600/25 mt-2"
                               onclick="event.stopPropagation();">
                                Leer más
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Active top accent bar -->
                    <div class="accordion-accent-bar absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-blue-500 to-indigo-500 transform origin-left transition-transform duration-500 scale-x-0"></div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <style>
    /* ── Accordion Card Layout ── */
    .accordion-track {
        display: flex;
    }
    .accordion-card {
        flex: 1;
        min-width: 52px;
    }
    .accordion-card.is-active {
        flex: 5;
    }

    /* ── Collapsed state: show rotated label, hide content ── */
    .accordion-card .accordion-collapsed-label {
        opacity: 1;
        pointer-events: auto;
    }
    .accordion-card .accordion-expanded-content {
        opacity: 0;
        pointer-events: none;
    }
    .accordion-card .accordion-side-gradient {
        opacity: 1;
    }
    .accordion-card .accordion-accent-bar {
        transform: scaleX(0);
    }

    /* ── Active state: hide label, show content ── */
    .accordion-card.is-active .accordion-collapsed-label {
        opacity: 0;
        pointer-events: none;
    }
    .accordion-card.is-active .accordion-expanded-content {
        opacity: 1;
        pointer-events: auto;
    }
    .accordion-card.is-active .accordion-side-gradient {
        opacity: 0;
    }
    .accordion-card.is-active .accordion-accent-bar {
        transform: scaleX(1);
    }

    /* ── Responsive: stack vertically on mobile ── */
    @media (max-width: 640px) {
        .accordion-track {
            flex-direction: column;
            gap: 6px;
        }
        .accordion-card {
            flex: 1;
            min-height: 52px;
        }
        .accordion-card.is-active {
            flex: 5;
            min-height: 260px;
        }
    }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.accordion-card');
        if (!cards.length) return;

        cards.forEach(card => {
            card.addEventListener('click', function () {
                // Remove active from all
                cards.forEach(c => c.classList.remove('is-active'));
                // Activate clicked
                this.classList.add('is-active');
            });
        });
    });
    </script>

<?php
// ============================================================================
// LAYOUT: CLASSIC CAROUSEL SLIDER (Default)
// ============================================================================
else :
?>
    <section class="relative h-[90vh] bg-slate-900 overflow-hidden">
        <div class="absolute inset-0">
            <?php
            $hero_query = new WP_Query(array('posts_per_page' => 4, 'post_status' => 'publish'));
            $hero_ids = array();
            if ($hero_query->have_posts()) : $count = 0;
                while ($hero_query->have_posts()) : $hero_query->the_post();
                    $hero_ids[] = get_the_ID();
            ?>
                <div class="hero-slide absolute inset-0 transition-all duration-1000 <?php echo $count === 0 ? 'opacity-100 z-10 pointer-events-auto' : 'opacity-0 z-0 pointer-events-none'; ?>" data-slide="<?php echo $count; ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover')); ?>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20"></div>
                    
                    <div class="absolute inset-0 flex items-center">
                        <div class="container mx-auto px-6">
                            <div class="max-w-3xl space-y-5">
                                <span class="inline-block px-3 py-1 bg-blue-600 text-white text-[11px] font-bold uppercase tracking-wider rounded">Destacado</span>
                                <h2 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-[0.95] tracking-tight"><?php the_title(); ?></h2>
                                <p class="text-lg text-white/70 font-light max-w-xl leading-relaxed line-clamp-2"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 px-8 py-3.5 bg-blue-600 text-white text-sm font-bold rounded-lg hover:bg-blue-500 transition-colors shadow-lg shadow-blue-600/25">
                                    Leer más
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $count++; endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <!-- Arrows -->
        <button class="prev-slide absolute left-4 md:left-8 top-1/2 -translate-y-1/2 z-40 w-12 h-12 bg-white/10 hover:bg-white/20 backdrop-blur text-white rounded-full flex items-center justify-center transition-all border border-white/20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button class="next-slide absolute right-4 md:right-8 top-1/2 -translate-y-1/2 z-40 w-12 h-12 bg-white/10 hover:bg-white/20 backdrop-blur text-white rounded-full flex items-center justify-center transition-all border border-white/20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
        </button>

        <!-- Dots -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-30 flex gap-2">
            <?php for ($i = 0; $i < min(count($hero_ids), 4); $i++) : ?>
                <button class="slide-dot w-2.5 h-2.5 rounded-full transition-all <?php echo $i === 0 ? 'bg-blue-500 w-8' : 'bg-white/40 hover:bg-white/60'; ?>" data-dot="<?php echo $i; ?>"></button>
            <?php endfor; ?>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.hero-slide');
        const dots   = document.querySelectorAll('.slide-dot');
        const prevBtn = document.querySelector('.prev-slide');
        const nextBtn = document.querySelector('.next-slide');
        let currentSlide = 0;

        if (!slides.length) return;

        function showSlide(index) {
            slides.forEach(s => {
                s.classList.replace('opacity-100', 'opacity-0');
                s.classList.replace('z-10', 'z-0');
                s.classList.replace('pointer-events-auto', 'pointer-events-none');
            });
            dots.forEach(d => d.classList.remove('bg-blue-500', 'w-8'));
            dots.forEach(d => d.classList.add('bg-white/40'));

            slides[index].classList.replace('opacity-0', 'opacity-100');
            slides[index].classList.replace('z-0', 'z-10');
            slides[index].classList.replace('pointer-events-none', 'pointer-events-auto');
            dots[index].classList.remove('bg-white/40');
            dots[index].classList.add('bg-blue-500', 'w-8');
            currentSlide = index;
        }

        if (nextBtn) nextBtn.addEventListener('click', () => showSlide((currentSlide + 1) % slides.length));
        if (prevBtn) prevBtn.addEventListener('click', () => showSlide((currentSlide - 1 + slides.length) % slides.length));
        dots.forEach(dot => dot.addEventListener('click', () => showSlide(parseInt(dot.dataset.dot))));
        setInterval(() => showSlide((currentSlide + 1) % slides.length), 5000);
    });
    </script>

<?php endif; ?>
