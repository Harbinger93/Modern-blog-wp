<?php
/**
 * The sidebar containing the main widget area
 */
?>

<style>
    /* Vertical Marquee Animation */
    @keyframes scrollVertical {
        0% { transform: translateY(0); }
        100% { transform: translateY(-50%); }
    }
    .marquee-vertical-container {
        height: 400px;
        overflow: hidden;
        position: relative;
    }
    .marquee-vertical-content {
        animation: scrollVertical 20s linear infinite;
    }
    .marquee-vertical-container:hover .marquee-vertical-content {
        animation-play-state: paused;
    }

    /* Horizontal Marquee Animations */
    @keyframes scrollLeft {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    @keyframes scrollRight {
        0% { transform: translateX(-50%); }
        100% { transform: translateX(0); }
    }
    .marquee-row-left {
        animation: scrollLeft 30s linear infinite;
        width: max-content;
    }
    .marquee-row-right {
        animation: scrollRight 30s linear infinite;
        width: max-content;
    }
    .marquee-row-left:hover, .marquee-row-right:hover {
        animation-play-state: paused;
    }
</style>

<aside id="secondary" class="widget-area w-full lg:w-96 shrink-0 space-y-10">
    
    <!-- Widget: Vertical Recent News -->
    <section class="widget bg-slate-50 dark:bg-white/5 rounded-[2rem] p-8 border border-slate-100 dark:border-white/10 overflow-hidden">
        <h3 class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-600 mb-6 flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-blue-600 rounded-full"></span>
            Últimas Noticias
        </h3>
        <div class="marquee-vertical-container">
            <div class="marquee-vertical-content space-y-4">
                <?php
                $recent_posts = new WP_Query(array('posts_per_page' => 5, 'post_status' => 'publish'));
                // Duplicate for seamless loop
                $posts_data = $recent_posts->posts;
                $loop_posts = array_merge($posts_data, $posts_data);
                
                foreach($loop_posts as $post) : setup_postdata($post); ?>
                    <a href="<?php the_permalink($post->ID); ?>" class="group flex gap-4 p-3 rounded-2xl hover:bg-white dark:hover:bg-white/5 transition-all">
                        <div class="w-16 h-16 shrink-0 rounded-xl overflow-hidden bg-slate-200 dark:bg-slate-800">
                            <?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-500')); ?>
                        </div>
                        <div class="min-w-0">
                            <h4 class="text-xs font-bold text-slate-900 dark:text-white leading-snug line-clamp-2 group-hover:text-blue-600 transition-colors"><?php echo get_the_title($post->ID); ?></h4>
                            <span class="text-[10px] text-slate-400 mt-1 block uppercase font-medium"><?php echo get_the_date('', $post->ID); ?></span>
                        </div>
                    </a>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <!-- Widget: Double Row Horizontal Marquee (Tendencias) -->
    <section class="widget">
        <h3 class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 mb-6 px-4">Tendencias</h3>
        <div class="space-y-3 overflow-hidden">
            <!-- Row 1: Left -->
            <div class="marquee-row-left flex gap-3">
                <?php
                $trending = new WP_Query(array('posts_per_page' => 6, 'orderby' => 'comment_count'));
                $trending_posts = array_merge($trending->posts, $trending->posts);
                foreach($trending_posts as $post) : ?>
                    <a href="<?php echo get_permalink($post->ID); ?>" class="px-5 py-3 rounded-full bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10 text-xs font-bold whitespace-nowrap hover:border-blue-500 transition-colors">
                        # <?php echo wp_trim_words(get_the_title($post->ID), 4, ''); ?>
                    </a>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
            <!-- Row 2: Right -->
            <div class="marquee-row-right flex gap-3">
                <?php
                foreach($trending_posts as $post) : ?>
                    <a href="<?php echo get_permalink($post->ID); ?>" class="px-5 py-3 rounded-full bg-blue-600 text-white text-xs font-bold whitespace-nowrap hover:bg-blue-700 transition-colors">
                        <?php echo wp_trim_words(get_the_title($post->ID), 3, ''); ?> →
                    </a>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <!-- Widget: High Impact Report CTA -->
    <section class="widget relative rounded-[2.5rem] overflow-hidden bg-slate-900 group">
        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&q=80&w=800" class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:scale-110 transition-transform duration-1000" alt="Informe">
        <div class="absolute inset-0 bg-gradient-to-t from-blue-900 via-blue-900/40 to-transparent"></div>
        <div class="relative z-10 p-10 flex flex-col items-center text-center">
            <span class="px-3 py-1 bg-blue-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-full mb-6">Nuevo Informe</span>
            <h3 class="text-2xl font-black text-white leading-tight mb-4 tracking-tighter">Situación Carcelaria en Venezuela 2026</h3>
            <p class="text-white/70 text-sm mb-8 font-medium">Un análisis profundo sobre los DDHH y las condiciones del sistema penitenciario.</p>
            <a href="<?php echo home_url('/publicaciones'); ?>" class="w-full py-4 bg-white text-blue-600 font-bold rounded-2xl hover:scale-105 transition-transform shadow-2xl">Descargar Ahora</a>
        </div>
    </section>

</aside>
