<?php
/**
 * Template Name: Noticias
 * Description: Feed de noticias con carrusel animado de 3 filas
 *
 * @package ovp-theme
 */

get_header();

// Get posts for each row (15 total: 5 per row)
$all_posts = new WP_Query(array('posts_per_page' => 15, 'post_status' => 'publish'));
$posts_arr = array();
if ($all_posts->have_posts()) {
    while ($all_posts->have_posts()) {
        $all_posts->the_post();
        $posts_arr[] = array(
            'title' => get_the_title(),
            'link' => get_permalink(),
            'date' => get_the_date(),
            'excerpt' => wp_trim_words(get_the_excerpt(), 12),
            'thumb' => get_the_post_thumbnail_url(get_the_ID(), 'medium_large'),
            'cat' => get_the_category() ? get_the_category()[0]->name : 'Noticias',
        );
    }
    wp_reset_postdata();
}

// Pad arrays if less than 5 posts per row
while (count($posts_arr) < 15) {
    $posts_arr[] = $posts_arr[count($posts_arr) % max(count($posts_arr), 1)];
}

$row1 = array_slice($posts_arr, 0, 5);
$row2 = array_slice($posts_arr, 5, 5);
$row3 = array_slice($posts_arr, 10, 5);
?>

<main id="primary" class="site-main bg-white dark:bg-[#050b18]">

    <!-- HERO -->
    <section class="relative h-[45vh] md:h-[50vh] bg-slate-900 overflow-hidden flex items-end pb-12">
        <img src="https://oveprisiones.com/wp-content/uploads/2016/10/generica4.png"
            class="absolute inset-0 w-full h-full object-cover opacity-25" alt="Noticias">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-black/20"></div>
        <div
            class="absolute bottom-0 left-0 right-0 h-40 bg-gradient-to-t from-slate-50 dark:from-[#070e1e] to-transparent">
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <span
                class="inline-block px-4 py-1.5 bg-blue-600/20 border border-blue-500/30 text-blue-400 text-xs font-bold uppercase tracking-wider rounded-full mb-4">Actualidad</span>
            <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight">Noticias OVP</h1>
            <p class="text-white/50 mt-3 text-lg font-light">Cobertura continua de la situación penitenciaria en
                Venezuela.</p>
        </div>
    </section>

    <!-- ANIMATED CAROUSEL — 3 Rows -->
    <section class="py-16 md:py-24 bg-slate-50 dark:bg-[#070e1e] overflow-hidden">
        <div class="container mx-auto px-6 mb-10">
            <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Últimas Publicaciones</h2>
        </div>

        <!-- Row 1: Right to Left -->
        <div class="mb-6 overflow-hidden">
            <div class="flex gap-6 news-marquee-rtl">
                <?php for ($dup = 0; $dup < 2; $dup++):
                    foreach ($row1 as $p): ?>
                        <a href="<?php echo esc_url($p['link']); ?>" class="flex-shrink-0 w-[300px] sm:w-[320px] md:w-[380px] group block">
                            <div class="relative rounded-2xl overflow-hidden border border-slate-200 dark:border-white/10 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 aspect-[4/5] sm:aspect-square md:aspect-[4/5]">
                                <!-- Background Image -->
                                <?php if ($p['thumb']): ?>
                                    <img src="<?php echo esc_url($p['thumb']); ?>"
                                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                        alt="">
                                <?php else: ?>
                                    <div class="absolute inset-0 w-full h-full bg-gradient-to-br from-blue-900 to-slate-900 flex items-center justify-center text-blue-600/30 font-black text-6xl">
                                        OVP</div>
                                <?php endif; ?>
                                
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-black/10 group-hover:via-black/50 transition-colors duration-500"></div>

                                <!-- Content -->
                                <div class="absolute inset-0 p-6 md:p-8 flex flex-col justify-end">
                                    <div class="transform md:translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                        <div class="flex items-center gap-3 mb-3">
                                            <span class="text-[10px] font-bold text-white uppercase tracking-wider px-2.5 py-1 bg-blue-600/90 backdrop-blur-md rounded-md">
                                                <?php echo esc_html($p['cat']); ?>
                                            </span>
                                            <time class="text-[11px] font-medium text-white/80 uppercase tracking-wider drop-shadow-md"><?php echo esc_html($p['date']); ?></time>
                                        </div>
                                        <h3 class="text-xl md:text-2xl font-bold text-white leading-tight line-clamp-3 group-hover:text-blue-300 transition-colors drop-shadow-lg">
                                            <?php echo esc_html($p['title']); ?>
                                        </h3>
                                        <div class="mt-4 md:opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-2 group-hover:translate-y-0 hidden sm:block">
                                            <span class="inline-flex items-center gap-2 text-xs font-bold text-blue-400 uppercase tracking-widest hover:text-blue-300 transition-colors">
                                                Leer más <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; endfor; ?>
            </div>
        </div>

        <!-- Row 2: Left to Right -->
        <div class="mb-6 overflow-hidden">
            <div class="flex gap-6 news-marquee-ltr">
                <?php for ($dup = 0; $dup < 2; $dup++):
                    foreach ($row2 as $p): ?>
                        <a href="<?php echo esc_url($p['link']); ?>" class="flex-shrink-0 w-[300px] sm:w-[320px] md:w-[380px] group block">
                            <div class="relative rounded-2xl overflow-hidden border border-slate-200 dark:border-white/10 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 aspect-[4/5] sm:aspect-square md:aspect-[4/5]">
                                <!-- Background Image -->
                                <?php if ($p['thumb']): ?>
                                    <img src="<?php echo esc_url($p['thumb']); ?>"
                                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                        alt="">
                                <?php else: ?>
                                    <div class="absolute inset-0 w-full h-full bg-gradient-to-br from-blue-900 to-slate-900 flex items-center justify-center text-blue-600/30 font-black text-6xl">
                                        OVP</div>
                                <?php endif; ?>
                                
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-black/10 group-hover:via-black/50 transition-colors duration-500"></div>

                                <!-- Content -->
                                <div class="absolute inset-0 p-6 md:p-8 flex flex-col justify-end">
                                    <div class="transform md:translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                        <div class="flex items-center gap-3 mb-3">
                                            <span class="text-[10px] font-bold text-white uppercase tracking-wider px-2.5 py-1 bg-blue-600/90 backdrop-blur-md rounded-md">
                                                <?php echo esc_html($p['cat']); ?>
                                            </span>
                                            <time class="text-[11px] font-medium text-white/80 uppercase tracking-wider drop-shadow-md"><?php echo esc_html($p['date']); ?></time>
                                        </div>
                                        <h3 class="text-xl md:text-2xl font-bold text-white leading-tight line-clamp-3 group-hover:text-blue-300 transition-colors drop-shadow-lg">
                                            <?php echo esc_html($p['title']); ?>
                                        </h3>
                                        <div class="mt-4 md:opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-2 group-hover:translate-y-0 hidden sm:block">
                                            <span class="inline-flex items-center gap-2 text-xs font-bold text-blue-400 uppercase tracking-widest hover:text-blue-300 transition-colors">
                                                Leer más <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; endfor; ?>
            </div>
        </div>

        <!-- Row 3: Right to Left -->
        <div class="overflow-hidden">
            <div class="flex gap-6 news-marquee-rtl">
                <?php for ($dup = 0; $dup < 2; $dup++):
                    foreach ($row3 as $p): ?>
                        <a href="<?php echo esc_url($p['link']); ?>" class="flex-shrink-0 w-[300px] sm:w-[320px] md:w-[380px] group block">
                            <div class="relative rounded-2xl overflow-hidden border border-slate-200 dark:border-white/10 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 aspect-[4/5] sm:aspect-square md:aspect-[4/5]">
                                <!-- Background Image -->
                                <?php if ($p['thumb']): ?>
                                    <img src="<?php echo esc_url($p['thumb']); ?>"
                                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                        alt="">
                                <?php else: ?>
                                    <div class="absolute inset-0 w-full h-full bg-gradient-to-br from-blue-900 to-slate-900 flex items-center justify-center text-blue-600/30 font-black text-6xl">
                                        OVP</div>
                                <?php endif; ?>
                                
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-black/10 group-hover:via-black/50 transition-colors duration-500"></div>

                                <!-- Content -->
                                <div class="absolute inset-0 p-6 md:p-8 flex flex-col justify-end">
                                    <div class="transform md:translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                        <div class="flex items-center gap-3 mb-3">
                                            <span class="text-[10px] font-bold text-white uppercase tracking-wider px-2.5 py-1 bg-blue-600/90 backdrop-blur-md rounded-md">
                                                <?php echo esc_html($p['cat']); ?>
                                            </span>
                                            <time class="text-[11px] font-medium text-white/80 uppercase tracking-wider drop-shadow-md"><?php echo esc_html($p['date']); ?></time>
                                        </div>
                                        <h3 class="text-xl md:text-2xl font-bold text-white leading-tight line-clamp-3 group-hover:text-blue-300 transition-colors drop-shadow-lg">
                                            <?php echo esc_html($p['title']); ?>
                                        </h3>
                                        <div class="mt-4 md:opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-2 group-hover:translate-y-0 hidden sm:block">
                                            <span class="inline-flex items-center gap-2 text-xs font-bold text-blue-400 uppercase tracking-widest hover:text-blue-300 transition-colors">
                                                Leer más <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; endfor; ?>
            </div>
        </div>
    </section>

    <style>
        @keyframes marquee-rtl {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        @keyframes marquee-ltr {
            0% {
                transform: translateX(-50%);
            }

            100% {
                transform: translateX(0);
            }
        }

        .news-marquee-rtl {
            animation: marquee-rtl 60s linear infinite;
            width: max-content;
        }

        .news-marquee-ltr {
            animation: marquee-ltr 60s linear infinite;
            width: max-content;
        }

        .news-marquee-rtl:hover,
        .news-marquee-ltr:hover {
            animation-play-state: paused;
        }
    </style>

    <!-- ALL NEWS GRID -->
    <section class="py-20 bg-white dark:bg-[#050b18]">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight mb-10">Noticias</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $archive = new WP_Query(array('posts_per_page' => 12, 'paged' => get_query_var('paged') ? get_query_var('paged') : 1));
                if ($archive->have_posts()):
                    while ($archive->have_posts()):
                        $archive->the_post();
                        ?>
                        <article class="group relative rounded-2xl overflow-hidden border border-slate-200 dark:border-white/10 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 aspect-[4/5] sm:aspect-square md:aspect-[4/5] lg:aspect-[3/4]">
                            <a href="<?php the_permalink(); ?>" class="absolute inset-0 block">
                                <!-- Background Image -->
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', array('class' => 'absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700')); ?>
                                <?php else : ?>
                                    <div class="absolute inset-0 w-full h-full bg-gradient-to-br from-blue-900 to-slate-900 flex items-center justify-center text-blue-600/30 text-5xl font-black">OVP</div>
                                <?php endif; ?>
                                
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-black/10 group-hover:via-black/50 transition-colors duration-500"></div>
                                
                                <!-- Content -->
                                <div class="absolute inset-0 flex flex-col justify-end p-6 md:p-8">
                                    <div class="transform md:translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                        <div class="flex items-center gap-3 mb-3">
                                            <span class="text-[10px] font-bold text-white uppercase tracking-wider px-2.5 py-1 bg-blue-600/90 backdrop-blur-md rounded-md">
                                                <?php 
                                                $cats = get_the_category();
                                                echo !empty($cats) ? esc_html($cats[0]->name) : 'Noticia';
                                                ?>
                                            </span>
                                            <time class="text-[11px] font-medium text-white/80 uppercase tracking-wider drop-shadow-md"><?php echo get_the_date(); ?></time>
                                        </div>
                                        <h3 class="text-xl md:text-2xl font-bold text-white leading-tight group-hover:text-blue-300 transition-colors drop-shadow-lg">
                                            <?php the_title(); ?>
                                        </h3>
                                        <p class="text-slate-200 text-sm mt-3 line-clamp-2 md:opacity-0 group-hover:opacity-100 transition-opacity duration-500 hidden sm:block drop-shadow-md">
                                            <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                                        </p>
                                        <div class="mt-4 md:opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-2 group-hover:translate-y-0 hidden sm:block">
                                            <span class="inline-flex items-center gap-2 text-xs font-bold text-blue-400 uppercase tracking-widest hover:text-blue-300 transition-colors">
                                                Leer más <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                    <?php endwhile; endif; ?>
            </div>
            <?php if ($archive->max_num_pages > 1): ?>
                <div class="flex justify-center mt-12 gap-3">
                    <?php
                    echo paginate_links(array(
                        'total' => $archive->max_num_pages,
                        'current' => max(1, get_query_var('paged')),
                        'prev_text' => '←',
                        'next_text' => '→',
                        'before_page_number' => '<span class="px-4 py-2 rounded-xl text-sm font-medium bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-700 dark:text-white hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-colors inline-block">',
                        'after_page_number' => '</span>',
                    ));
                    ?>
                </div>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>