<?php
/**
 * Template part for displaying a sidebar next to the home video with loop effect
 */
?>

<div class="space-y-6 h-full flex flex-col">
    <!-- Most Viewed Posts Loop -->
    <div class="bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-[2.5rem] p-6 shadow-sm flex flex-col overflow-hidden relative">
        <h3 class="text-lg font-black text-slate-900 dark:text-white mb-6 flex items-center gap-3">
            <div class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></div>
            Otras Noticias
        </h3>
        
        <div class="relative overflow-hidden" id="popular-news-container" style="height: 280px;">
            <div class="space-y-4" id="popular-news-loop">
                <?php
                // Query for news older than 2 months
                $older_news = new WP_Query(array(
                    'posts_per_page' => 5,
                    'date_query' => array(
                        array(
                            'before' => '2 months ago',
                        ),
                    ),
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                if ($older_news->have_posts()) :
                    while ($older_news->have_posts()) : $older_news->the_post();
                ?>
                    <a href="<?php the_permalink(); ?>" class="flex gap-3 group news-item-loop">
                        <div class="shrink-0 w-12 h-12 rounded-xl overflow-hidden border border-slate-200 dark:border-white/10">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumbnail', array('class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-500')); ?>
                            <?php else : ?>
                                <div class="w-full h-full bg-blue-600/10 flex items-center justify-center text-blue-600 font-bold text-[10px]">OVP</div>
                            <?php endif; ?>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xs font-bold text-slate-900 dark:text-white leading-tight group-hover:text-blue-600 transition-colors line-clamp-2"><?php the_title(); ?></h4>
                            <span class="text-[9px] text-slate-400 dark:text-slate-500 uppercase tracking-widest mt-1 block font-medium"><?php echo get_the_date(); ?></span>
                        </div>
                    </a>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>

        <div class="mt-8 pt-8 border-t border-slate-200 dark:border-white/10">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="inline-flex items-center gap-2 text-xs font-black text-blue-600 hover:gap-3 transition-all">
                VER TODA LA ACTUALIDAD
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</div>

<style>
#popular-news-container {
    mask-image: linear-gradient(to bottom, transparent, black 10%, black 90%, transparent);
}
@keyframes verticalLoop {
    0% { transform: translateY(0); }
    100% { transform: translateY(-50%); }
}
#popular-news-loop.animating {
    animation: verticalLoop 30s linear infinite;
}
#popular-news-loop.animating:hover {
    animation-play-state: paused;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loop = document.getElementById('popular-news-loop');
    if (loop && loop.children.length > 3) {
        // Clone children to create loop effect
        const items = Array.from(loop.children);
        items.forEach(item => {
            const clone = item.cloneNode(true);
            loop.appendChild(clone);
        });
        loop.classList.add('animating');
    }
});
</script>
