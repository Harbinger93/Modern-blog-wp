<?php get_header(); ?>
<main id="primary" class="site-main min-h-screen bg-white dark:bg-[#050b18]">
    <?php while ( have_posts() ) : the_post(); ?>
        <!-- Post Hero Banner -->
        <header class="relative h-[60vh] flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover')); ?>
                <?php else : ?>
                    <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover" alt="Banner Default">
                <?php endif; ?>
                <div class="absolute inset-0 bg-gradient-to-t from-white dark:from-[#050b18] via-black/40 to-black/20"></div>
            </div>
            
            <div class="container mx-auto px-6 relative z-10 text-center mt-20">
                <div class="max-w-4xl mx-auto">
                    <div class="flex items-center justify-center gap-3 mb-6">
                        <span class="px-3 py-1 bg-blue-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full"><?php the_category(', '); ?></span>
                        <span class="text-white/80 text-sm font-medium"><?php echo get_the_date(); ?></span>
                    </div>
                    <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight leading-[1.1] mb-8 drop-shadow-2xl"><?php the_title(); ?></h1>
                </div>
            </div>
        </header>

        <article class="container mx-auto px-6 pt-16 pb-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <!-- Main Content -->
                <div class="lg:col-span-8">
                    <div class="prose prose-lg dark:prose-invert max-w-none text-slate-700 dark:text-slate-300 leading-relaxed entry-content">
                        <?php the_content(); ?>
                    </div>

                    <!-- Post Navigation -->
                    <div class="mt-20 pt-10 border-t border-slate-100 dark:border-white/5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <?php
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();

                            if ($prev_post) : ?>
                                <a href="<?php echo get_permalink($prev_post->ID); ?>" class="group p-6 rounded-3xl bg-slate-50 dark:bg-white/5 border border-transparent hover:border-blue-500/30 transition-all flex items-center gap-4">
                                    <div class="w-16 h-16 shrink-0 rounded-xl overflow-hidden bg-slate-200 dark:bg-slate-800">
                                        <?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail', array('class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-500')); ?>
                                    </div>
                                    <div class="min-w-0">
                                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 block">Anterior</span>
                                        <h4 class="text-sm font-bold text-slate-900 dark:text-white truncate group-hover:text-blue-600 transition-colors"><?php echo get_the_title($prev_post->ID); ?></h4>
                                    </div>
                                </a>
                            <?php endif; ?>

                            <?php if ($next_post) : ?>
                                <a href="<?php echo get_permalink($next_post->ID); ?>" class="group p-6 rounded-3xl bg-slate-50 dark:bg-white/5 border border-transparent hover:border-blue-500/30 transition-all flex items-center gap-4 text-right justify-end ml-auto w-full">
                                    <div class="min-w-0">
                                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 block">Siguiente</span>
                                        <h4 class="text-sm font-bold text-slate-900 dark:text-white truncate group-hover:text-blue-600 transition-colors"><?php echo get_the_title($next_post->ID); ?></h4>
                                    </div>
                                    <div class="w-16 h-16 shrink-0 rounded-xl overflow-hidden bg-slate-200 dark:bg-slate-800">
                                        <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail', array('class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-500')); ?>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Area -->
                <div class="lg:col-span-4 sticky top-28 self-start">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    /* Reading Progress Bar */
    var progressBar = document.getElementById('reading-progress');
    if (progressBar) {
        window.addEventListener('scroll', function() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            progressBar.style.width = scrolled + "%";
        });
    }

    /* PDF Auto-embed */
    var contentLinks = document.querySelectorAll('.entry-content a');
    contentLinks.forEach(function(link) {
        if (link.href.toLowerCase().endsWith('.pdf')) {
            var container = document.createElement('div');
            container.className = 'pdf-container aspect-[1/1.4] w-full mt-8 mb-8';
            container.innerHTML = `<iframe src="${link.href}" class="w-full h-full border-0"></iframe>`;
            link.parentNode.insertBefore(container, link.nextSibling);
            link.classList.add('inline-flex', 'items-center', 'gap-2', 'px-4', 'py-2', 'bg-blue-600', 'text-white', 'text-sm', 'font-bold', 'rounded-xl', 'hover:bg-blue-500', 'transition-all', 'mb-4');
            link.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg> Descargar PDF`;
        }
    });
});
</script>

<?php get_footer(); ?>
