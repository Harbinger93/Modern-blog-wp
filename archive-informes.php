<?php
/**
 * The template for displaying Informes/Publicaciones archives
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Header Section -->
    <header class="py-24 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 mesh-bg opacity-30"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <span class="inline-block px-4 py-1 mb-6 text-xs font-bold tracking-widest uppercase bg-ovp-accent text-white rounded-full">
                Centro de Documentación
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 tracking-tighter">Publicaciones e Informes</h1>
            <p class="text-lg text-white/60 max-w-2xl mx-auto font-light leading-relaxed">
                Acceso transparente a nuestra biblioteca técnica, boletines digitales e investigaciones especiales sobre el sistema penitenciario.
            </p>
        </div>
    </header>

    <!-- Filter & Content Section -->
    <section class="py-20 bg-ovp-light dark:bg-ovp-dark transition-colors duration-500 min-h-screen">
        <div class="container mx-auto px-6">
            
            <!-- Minimalist Filter Bar -->
            <div class="flex flex-wrap items-center justify-between gap-8 mb-16 pb-8 border-b border-slate-200 dark:border-white/5">
                <div class="flex gap-4">
                    <button class="px-6 py-2 bg-ovp-accent text-white text-xs font-bold uppercase tracking-widest rounded-full">Todos</button>
                    <?php
                    $taxonomies = get_terms( array(
                        'taxonomy' => 'tipo_informe',
                        'hide_empty' => true,
                    ) );
                    foreach ( $taxonomies as $tax ) : ?>
                        <button class="px-6 py-2 glass-card text-slate-500 dark:text-white/40 text-xs font-bold uppercase tracking-widest rounded-full hover:text-ovp-accent transition-colors">
                            <?php echo $tax->name; ?>
                        </button>
                    <?php endforeach; ?>
                </div>
                <div class="relative flex-grow max-w-xs">
                    <input type="text" placeholder="Buscar documento..." class="w-full pl-12 pr-4 py-3 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl text-sm focus:outline-none focus:border-ovp-accent transition-all">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>

            <?php if ( have_posts() ) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <?php while ( have_posts() ) : the_post(); 
                        $doc_type = get_post_meta( get_the_ID(), '_modern_blog_doc_type', true );
                        $pdf_url = get_post_meta( get_the_ID(), '_modern_blog_pdf_url', true );
                    ?>
                        <article class="group glass-card p-8 border-slate-100 dark:border-white/5 hover:-translate-y-2 transition-all duration-500">
                            <div class="flex justify-between items-start mb-8">
                                <div class="w-12 h-12 bg-ovp-accent/10 rounded-2xl flex items-center justify-center text-ovp-accent">
                                    <?php if($doc_type == 'infografia'): ?>
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                    <?php else: ?>
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                    <?php endif; ?>
                                </div>
                                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
                                    <?php echo $doc_type ? $doc_type : 'Documento'; ?>
                                </span>
                            </div>
                            
                            <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-4 leading-tight group-hover:text-ovp-accent transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="text-slate-500 dark:text-white/40 text-sm font-light mb-8 line-clamp-3">
                                <?php the_excerpt(); ?>
                            </div>

                            <div class="flex items-center justify-between pt-6 border-t border-slate-100 dark:border-white/5">
                                <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                    <?php echo get_the_date('M Y'); ?>
                                </div>
                                <?php if($pdf_url): ?>
                                    <a href="<?php echo esc_url($pdf_url); ?>" target="_blank" class="flex items-center gap-2 text-ovp-accent text-xs font-black uppercase tracking-widest group/link">
                                        Descargar <svg class="w-4 h-4 transform group-hover/link:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php the_permalink(); ?>" class="text-slate-400 hover:text-ovp-accent text-xs font-black uppercase tracking-widest">Ver Detalles</a>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <div class="mt-20 flex justify-center">
                    <?php the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => '&larr; Anterior',
                        'next_text' => 'Siguiente &rarr;',
                    )); ?>
                </div>

            <?php else : ?>
                <div class="text-center py-20">
                    <p class="text-slate-500 dark:text-white/40">No se encontraron publicaciones disponibles.</p>
                </div>
            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>
