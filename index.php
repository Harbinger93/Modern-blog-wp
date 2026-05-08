<?php get_header(); ?>

<main id="primary" class="site-main min-h-screen mesh-bg py-12">
    <div class="container mx-auto px-4">
        <div id="ovp-app"></div>
        
        <?php if ( have_posts() ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('glass-card p-6'); ?>>
                        <header class="entry-header">
                            <?php the_title( '<h2 class="text-xl font-bold text-white mb-2">', '</h2>' ); ?>
                        </header>
                        <div class="text-white/70 text-sm">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
