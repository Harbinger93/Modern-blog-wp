<?php
/**
 * The sidebar containing the main widget area
 *
 * @package modern-blog-wp
 */

if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_single() ) {
	return;
}
?>

<aside id="secondary" class="widget-area w-full lg:w-80 shrink-0 space-y-12">
	
    <!-- Widget: Most Viewed (Bien diferenciadas) -->
    <section class="widget widget_most_viewed">
        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-ovp-accent mb-8 pb-4 border-b border-slate-100 dark:border-white/5 flex items-center gap-3">
            <span class="w-2 h-2 bg-ovp-accent rounded-full animate-pulse"></span>
            Tendencias
        </h3>
        <div class="space-y-6">
            <?php
            $most_viewed = new WP_Query(array(
                'post_type' => 'post',
                'meta_key' => 'modern_blog_post_views_count',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
                'posts_per_page' => 4
            ));

            if ( $most_viewed->have_posts() ) :
                $counter = 1;
                while ( $most_viewed->have_posts() ) : $most_viewed->the_post(); ?>
                    <article class="flex gap-4 group">
                        <div class="text-3xl font-black text-slate-100 dark:text-white/5 transition-colors group-hover:text-ovp-accent/20 shrink-0 tabular-nums">
                            0<?php echo $counter; ?>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-900 dark:text-white leading-snug group-hover:text-ovp-accent transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <div class="text-[10px] font-bold text-slate-400 uppercase mt-2">
                                <?php echo modern_blog_get_post_views(get_the_ID()); ?> vistas
                            </div>
                        </div>
                    </article>
                <?php $counter++; endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </section>

    <!-- Widget: Recent News -->
    <section class="widget widget_recent_entries glass-card p-8 border-slate-100 dark:border-white/5">
        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-900 dark:text-white mb-8">Lo más reciente</h3>
        <div class="space-y-8">
            <?php
            $recent = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID())
            ));

            if ( $recent->have_posts() ) :
                while ( $recent->have_posts() ) : $recent->the_post(); ?>
                    <article class="space-y-3">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="rounded-xl overflow-hidden aspect-video mb-3">
                                <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover')); ?>
                            </div>
                        <?php endif; ?>
                        <h4 class="text-sm font-bold text-slate-800 dark:text-white/80 leading-tight hover:text-ovp-accent transition-colors">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <div class="text-[10px] text-slate-400 font-bold uppercase"><?php echo get_the_date(); ?></div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </section>

    <!-- Widget: Value Addition (Trust Badge / Newsletter) -->
    <section class="widget widget_cta glass-card p-8 bg-ovp-accent text-white border-none shadow-xl shadow-ovp-accent/30 overflow-hidden relative">
        <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
        <div class="relative z-10">
            <h3 class="text-xl font-black tracking-tighter mb-4 leading-tight">Boletín de Transparencia</h3>
            <p class="text-sm text-white/70 mb-6 font-light">Recibe informes técnicos y alertas críticas directamente en tu correo.</p>
            <form class="space-y-3">
                <input type="email" placeholder="tu@email.com" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/40 focus:outline-none focus:bg-white/20">
                <button class="w-full py-3 bg-white text-ovp-accent font-bold rounded-xl hover:bg-slate-100 transition-colors">Suscribirse</button>
            </form>
            <div class="mt-6 flex items-center gap-3 text-[10px] font-bold uppercase tracking-widest text-white/40">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 7v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-9-5zm-1 11.41l-2.71-2.71a.996.996 0 10-1.41 1.41l3.42 3.42c.39.39 1.02.39 1.41 0l7.42-7.42a.996.996 0 10-1.41-1.41L11 13.41z"/></svg>
                Conexión segura y cifrada
            </div>
        </div>
    </section>

</aside><!-- #secondary -->
