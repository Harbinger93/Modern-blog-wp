<?php
/**
 * The template for displaying search results pages
 *
 * @package ovp-theme
 */

get_header(); ?>

<main id="primary" class="site-main bg-slate-50 dark:bg-[#070e1e] min-h-screen">
    
    <!-- SEARCH HEADER -->
    <section class="bg-white dark:bg-[#0a1628] pt-32 pb-16 border-b border-slate-200 dark:border-white/10">
        <div class="container mx-auto px-6">
            <span class="text-blue-600 text-xs font-bold uppercase tracking-wider">Resultados de búsqueda</span>
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tight mt-2">
                "<?php echo get_search_query(); ?>"
            </h1>
            <p class="text-slate-500 dark:text-slate-400 mt-4 text-lg">
                Se encontraron <?php echo $wp_query->found_posts; ?> coincidencias.
            </p>
        </div>
    </section>

    <!-- RESULTS GRID -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <?php if (have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php while (have_posts()) : the_post(); ?>
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
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <style>
                    .pagination-container .page-numbers {
                        display: inline-block;
                        padding: 10px 18px;
                        margin: 0 4px;
                        background: white;
                        border: 1px solid #e2e8f0;
                        border-radius: 12px;
                        font-size: 14px;
                        font-weight: 600;
                        color: #475569;
                        transition: all 0.3s ease;
                    }
                    .dark .pagination-container .page-numbers {
                        background: rgba(255, 255, 255, 0.05);
                        border-color: rgba(255, 255, 255, 0.1);
                        color: #94a3b8;
                    }
                    .pagination-container .page-numbers.current {
                        background: #2563eb;
                        color: white;
                        border-color: #2563eb;
                    }
                    .pagination-container .page-numbers:hover:not(.current) {
                        background: #f1f5f9;
                        color: #2563eb;
                        border-color: #2563eb;
                    }
                    .dark .pagination-container .page-numbers:hover:not(.current) {
                        background: rgba(37, 99, 235, 0.1);
                        color: white;
                    }
                </style>
                <div class="flex justify-center mt-16 gap-2 pagination-container">
                    <?php
                    echo paginate_links(array(
                        'prev_text' => '←',
                        'next_text' => '→',
                    ));
                    ?>
                </div>

            <?php else : ?>
                <div class="text-center py-20">
                    <div class="w-20 h-20 bg-slate-100 dark:bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">No se encontraron resultados</h2>
                    <p class="text-slate-500 mt-2">Intenta buscar con otras palabras clave.</p>
                    <a href="<?php echo home_url(); ?>" class="inline-block mt-8 px-8 py-3 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-500 transition-all shadow-lg shadow-blue-600/25">
                        Volver al inicio
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
