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
                        <a href="<?php echo esc_url($p['link']); ?>" class="flex-shrink-0 w-[320px] md:w-[380px] group">
                            <div
                                class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300">
                                <div class="aspect-[16/10] overflow-hidden">
                                    <?php if ($p['thumb']): ?>
                                        <img src="<?php echo esc_url($p['thumb']); ?>"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            alt="">
                                    <?php else: ?>
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center text-white/30 text-6xl font-black">
                                            OVP</div>
                                    <?php endif; ?>
                                </div>
                                <div class="p-5">
                                    <span
                                        class="text-[11px] font-bold text-blue-600 uppercase tracking-wider"><?php echo esc_html($p['cat']); ?></span>
                                    <h3
                                        class="text-sm font-bold text-slate-900 dark:text-white mt-1 leading-snug line-clamp-2 group-hover:text-blue-600 transition-colors">
                                        <?php echo esc_html($p['title']); ?></h3>
                                    <time class="text-xs text-slate-400 mt-2 block"><?php echo esc_html($p['date']); ?></time>
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
                        <a href="<?php echo esc_url($p['link']); ?>" class="flex-shrink-0 w-[320px] md:w-[380px] group">
                            <div
                                class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300">
                                <div class="aspect-[16/10] overflow-hidden">
                                    <?php if ($p['thumb']): ?>
                                        <img src="<?php echo esc_url($p['thumb']); ?>"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            alt="">
                                    <?php else: ?>
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-slate-700 to-slate-900 flex items-center justify-center text-white/30 text-6xl font-black">
                                            OVP</div>
                                    <?php endif; ?>
                                </div>
                                <div class="p-5">
                                    <span
                                        class="text-[11px] font-bold text-blue-600 uppercase tracking-wider"><?php echo esc_html($p['cat']); ?></span>
                                    <h3
                                        class="text-sm font-bold text-slate-900 dark:text-white mt-1 leading-snug line-clamp-2 group-hover:text-blue-600 transition-colors">
                                        <?php echo esc_html($p['title']); ?></h3>
                                    <time class="text-xs text-slate-400 mt-2 block"><?php echo esc_html($p['date']); ?></time>
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
                        <a href="<?php echo esc_url($p['link']); ?>" class="flex-shrink-0 w-[320px] md:w-[380px] group">
                            <div
                                class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300">
                                <div class="aspect-[16/10] overflow-hidden">
                                    <?php if ($p['thumb']): ?>
                                        <img src="<?php echo esc_url($p['thumb']); ?>"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            alt="">
                                    <?php else: ?>
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-blue-800 to-indigo-900 flex items-center justify-center text-white/30 text-6xl font-black">
                                            OVP</div>
                                    <?php endif; ?>
                                </div>
                                <div class="p-5">
                                    <span
                                        class="text-[11px] font-bold text-blue-600 uppercase tracking-wider"><?php echo esc_html($p['cat']); ?></span>
                                    <h3
                                        class="text-sm font-bold text-slate-900 dark:text-white mt-1 leading-snug line-clamp-2 group-hover:text-blue-600 transition-colors">
                                        <?php echo esc_html($p['title']); ?></h3>
                                    <time class="text-xs text-slate-400 mt-2 block"><?php echo esc_html($p['date']); ?></time>
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
                        <article
                            class="group bg-white dark:bg-white/5 rounded-2xl overflow-hidden border border-slate-200 dark:border-white/10 hover:shadow-xl transition-all">
                            <a href="<?php the_permalink(); ?>" class="block">
                                <div class="aspect-[16/10] overflow-hidden">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500')); ?>
                                    <?php else: ?>
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center text-white/30 text-5xl font-black">
                                            OVP</div>
                                    <?php endif; ?>
                                </div>
                                <div class="p-6">
                                    <time
                                        class="text-xs font-medium text-slate-400 uppercase tracking-wider"><?php echo get_the_date(); ?></time>
                                    <h3
                                        class="text-lg font-bold text-slate-900 dark:text-white mt-2 leading-snug group-hover:text-blue-600 transition-colors">
                                        <?php the_title(); ?></h3>
                                    <p class="text-slate-500 dark:text-slate-400 text-sm mt-3 line-clamp-2">
                                        <?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
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