<?php
/**
 * The template for displaying all single posts
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<!-- Reading Progress Bar -->
<div id="reading-progress" class="fixed top-0 left-0 w-0 h-1 bg-ovp-accent z-[200] transition-all duration-100"></div>

<main id="primary" class="site-main py-20 bg-ovp-light dark:bg-ovp-dark transition-colors duration-500">
    <div class="container mx-auto px-6">
        
        <?php while ( have_posts() ) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <!-- Post Header -->
                <header class="max-w-4xl mx-auto text-center mb-16">
                    <div class="flex items-center justify-center gap-4 mb-6 text-ovp-accent font-bold text-xs uppercase tracking-[0.2em]">
                        <span><?php the_category(', '); ?></span>
                        <span class="w-1 h-1 bg-slate-300 dark:bg-white/20 rounded-full"></span>
                        <span><?php echo get_the_date(); ?></span>
                        <span class="w-1 h-1 bg-slate-300 dark:bg-white/20 rounded-full"></span>
                        <span><?php echo modern_blog_get_post_views(get_the_ID()); ?> vistas</span>
                    </div>
                    <h1 class="text-4xl md:text-6xl font-black text-slate-900 dark:text-white tracking-tighter leading-tight mb-8">
                        <?php the_title(); ?>
                    </h1>
                    <div class="flex items-center justify-center gap-4">
                        <div class="w-10 h-10 bg-slate-200 dark:bg-white/10 rounded-full overflow-hidden">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
                        </div>
                        <div class="text-left">
                            <div class="text-sm font-bold text-slate-900 dark:text-white"><?php the_author(); ?></div>
                            <div class="text-xs text-slate-500 dark:text-white/40">Redacción Técnica</div>
                        </div>
                    </div>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="max-w-5xl mx-auto mb-16 rounded-[2rem] overflow-hidden shadow-2xl">
                        <?php the_post_thumbnail('full', array('class' => 'w-full h-auto object-cover')); ?>
                    </div>
                <?php endif; ?>

                <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-20">
                    
                    <!-- Sidebar Social (Sticky) -->
                    <aside class="hidden lg:block w-16 shrink-0">
                        <div class="sticky top-32 flex flex-col gap-4">
                            <a href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank" class="w-12 h-12 glass-card flex items-center justify-center text-slate-400 hover:text-ovp-accent transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="w-12 h-12 glass-card flex items-center justify-center text-slate-400 hover:text-ovp-accent transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                            </a>
                        </div>
                    </aside>

                    <!-- Content -->
                    <div class="flex-grow">
                        <div class="prose prose-lg dark:prose-invert max-w-none font-light text-slate-700 dark:text-white/70 leading-relaxed mb-20">
                            <?php the_content(); ?>
                        </div>

                        <!-- Post Footer / Tags -->
                        <div class="border-y border-slate-100 dark:border-white/5 py-8 mb-20 flex flex-wrap gap-4 items-center justify-between">
                            <div class="flex gap-2">
                                <?php the_tags('<span class="text-xs font-bold text-slate-400 uppercase mr-2 mt-1">Tags:</span>', ' ', ''); ?>
                            </div>
                            <div class="flex gap-4">
                                <!-- Mobile Share -->
                                <button class="lg:hidden px-6 py-2 glass-card text-xs font-bold uppercase tracking-widest text-slate-500">Compartir</button>
                            </div>
                        </div>

                        <!-- Next Post Visualization (Modern) -->
                        <?php
                        $next_post = get_next_post();
                        if ( $next_post ) : ?>
                            <div class="group relative py-12 px-10 glass-card border-ovp-accent/20 overflow-hidden">
                                <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity">
                                    <?php echo get_the_post_thumbnail($next_post->ID, 'large', array('class' => 'w-full h-full object-cover')); ?>
                                </div>
                                <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-8">
                                    <div class="text-center md:text-left">
                                        <span class="text-ovp-accent text-xs font-black uppercase tracking-[0.3em] mb-4 block">Siguiente Noticia</span>
                                        <h3 class="text-2xl md:text-3xl font-black text-slate-900 dark:text-white tracking-tighter group-hover:text-ovp-accent transition-colors">
                                            <?php echo get_the_title($next_post->ID); ?>
                                        </h3>
                                    </div>
                                    <a href="<?php echo get_permalink($next_post->ID); ?>" class="w-16 h-16 bg-ovp-accent text-white rounded-full flex items-center justify-center group-hover:scale-110 transition-transform shadow-xl shadow-ovp-accent/20">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                    <!-- Sidebar -->
                    <?php get_sidebar(); ?>

                </div>

            </article>

        <?php endwhile; ?>

    </div>
</main>

<script>
    // Reading Progress
    window.addEventListener('scroll', () => {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        document.getElementById('reading-progress').style.width = scrolled + '%';
    });
</script>

<?php get_footer(); ?>
