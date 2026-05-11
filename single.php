<?php get_header(); ?>
<main id="primary" class="site-main pt-24 pb-20 min-h-screen bg-white dark:bg-[#050b18]">
    <?php while ( have_posts() ) : the_post(); ?>
        <article class="container mx-auto px-6">
            <header class="max-w-3xl mx-auto mb-12 text-center pt-8">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <span class="px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded"><?php the_category(', '); ?></span>
                    <span class="text-slate-400 text-sm"><?php echo get_the_date(); ?></span>
                </div>
                <h1 class="text-3xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tight leading-tight"><?php the_title(); ?></h1>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="mt-10 rounded-2xl overflow-hidden border border-slate-200 dark:border-white/10 shadow-lg">
                        <?php the_post_thumbnail('full', array('class' => 'w-full h-auto')); ?>
                    </div>
                <?php endif; ?>
            </header>
            <div class="max-w-3xl mx-auto">
                <div class="prose prose-lg dark:prose-invert max-w-none text-slate-700 dark:text-slate-300 leading-relaxed">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>
