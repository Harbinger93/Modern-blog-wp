<?php
/**
 * The template for displaying all single posts
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main pt-32 pb-24 min-h-screen">
    <?php while ( have_posts() ) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('container mx-auto px-6'); ?>>
            
            <!-- Post Header -->
            <header class="max-w-4xl mx-auto mb-16 text-center">
                <div class="flex items-center justify-center gap-4 mb-6">
                    <span class="px-3 py-1 bg-ovp-accent text-white text-[9px] font-black uppercase tracking-widest rounded-sm">
                        <?php the_category(', '); ?>
                    </span>
                    <span class="text-ovp-slate text-[10px] font-bold uppercase tracking-widest"><?php echo get_the_date(); ?></span>
                </div>
                <h1 class="text-4xl md:text-6xl font-black text-white tracking-tighter leading-tight mb-8">
                    <?php the_title(); ?>
                </h1>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="glass-card p-2 mb-16">
                        <div class="rounded-2xl overflow-hidden aspect-video">
                            <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover')); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </header>

            <!-- Post Content -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <div class="lg:col-span-8 lg:col-start-3">
                    <div class="prose prose-invert prose-lg max-w-none font-light text-slate-300 leading-relaxed selection:bg-ovp-accent">
                        <?php the_content(); ?>
                    </div>
                    
                    <!-- Post Footer -->
                    <footer class="mt-16 pt-8 border-t border-white/5 flex justify-between items-center">
                        <div class="flex gap-4">
                            <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Compartir:</span>
                            <!-- Social Icons Placeholders -->
                            <div class="flex gap-3">
                                <div class="w-8 h-8 rounded-full bg-white/5 hover:bg-ovp-accent transition-all cursor-pointer"></div>
                                <div class="w-8 h-8 rounded-full bg-white/5 hover:bg-ovp-accent transition-all cursor-pointer"></div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

        </article>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
