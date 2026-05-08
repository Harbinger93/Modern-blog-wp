<?php
/**
 * The template for displaying single Informes/Publicaciones
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main py-20 bg-ovp-light dark:bg-ovp-dark transition-colors duration-500 min-h-screen">
    <div class="container mx-auto px-6">
        
        <?php while ( have_posts() ) : the_post(); 
            $pdf_url = get_post_meta( get_the_ID(), '_modern_blog_pdf_url', true );
            $doc_type = get_post_meta( get_the_ID(), '_modern_blog_doc_type', true );
            $pages_count = get_post_meta( get_the_ID(), '_modern_blog_pages_count', true );
        ?>
            
            <div class="max-w-6xl mx-auto">
                
                <!-- Breadcrumbs -->
                <nav class="flex items-center gap-4 text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 mb-12">
                    <a href="<?php echo home_url('/'); ?>" class="hover:text-ovp-accent transition-colors">Inicio</a>
                    <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                    <a href="<?php echo get_post_type_archive_link('informes'); ?>" class="hover:text-ovp-accent transition-colors">Publicaciones</a>
                    <span class="w-1 h-1 bg-ovp-accent rounded-full"></span>
                    <span class="text-ovp-accent"><?php the_title(); ?></span>
                </nav>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-20">
                    
                    <!-- Main Content (Left) -->
                    <div class="lg:col-span-8">
                        <header class="mb-12">
                            <span class="inline-block px-4 py-1 mb-6 text-[10px] font-black tracking-widest uppercase bg-ovp-accent/10 text-ovp-accent rounded-full">
                                <?php echo $doc_type ? $doc_type : 'Informe Técnico'; ?>
                            </span>
                            <h1 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tighter leading-tight mb-8">
                                <?php the_title(); ?>
                            </h1>
                            <div class="flex items-center gap-6 text-sm text-slate-500 dark:text-white/40 font-light">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    Publicado el <?php echo get_the_date(); ?>
                                </div>
                                <?php if($pages_count): ?>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                        <?php echo $pages_count; ?> páginas
                                    </div>
                                <?php endif; ?>
                            </div>
                        </header>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="mb-12 rounded-3xl overflow-hidden shadow-2xl border border-slate-100 dark:border-white/5">
                                <?php the_post_thumbnail('full', array('class' => 'w-full h-auto')); ?>
                            </div>
                        <?php endif; ?>

                        <div class="prose prose-lg dark:prose-invert max-w-none font-light text-slate-700 dark:text-white/70 leading-relaxed">
                            <h3 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight mb-6">Resumen Ejecutivo</h3>
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <!-- Sidebar Info (Right) -->
                    <div class="lg:col-span-4">
                        <div class="sticky top-32 space-y-8">
                            
                            <!-- Download Card -->
                            <div class="glass-card p-8 border-ovp-accent/20 bg-ovp-accent/5">
                                <h4 class="text-sm font-black uppercase tracking-widest text-slate-900 dark:text-white mb-6">Acceso al Documento</h4>
                                <?php if($pdf_url): ?>
                                    <a href="<?php echo esc_url($pdf_url); ?>" target="_blank" class="flex flex-col items-center justify-center p-10 bg-ovp-accent text-white rounded-2xl hover:bg-ovp-accent/90 transition-all group shadow-xl shadow-ovp-accent/20">
                                        <svg class="w-12 h-12 mb-4 transform group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        <span class="font-black uppercase tracking-[0.2em] text-xs">Descargar PDF</span>
                                    </a>
                                <?php else: ?>
                                    <div class="p-10 bg-slate-100 dark:bg-white/5 rounded-2xl text-center text-slate-400 text-xs font-bold uppercase tracking-widest">
                                        Archivo no disponible
                                    </div>
                                <?php endif; ?>
                                <p class="mt-6 text-[10px] text-slate-500 dark:text-white/40 text-center leading-relaxed">
                                    Este documento es propiedad del Observatorio. Se permite su distribución citando la fuente original.
                                </p>
                            </div>

                            <!-- Share -->
                            <div class="glass-card p-8 border-slate-100 dark:border-white/5">
                                <h4 class="text-sm font-black uppercase tracking-widest text-slate-900 dark:text-white mb-6">Difundir</h4>
                                <div class="flex gap-4">
                                    <a href="#" class="flex-grow py-3 bg-slate-100 dark:bg-white/5 text-center text-xs font-bold uppercase tracking-widest text-slate-600 dark:text-white/70 rounded-xl hover:bg-ovp-accent hover:text-white transition-all">Twitter</a>
                                    <a href="#" class="flex-grow py-3 bg-slate-100 dark:bg-white/5 text-center text-xs font-bold uppercase tracking-widest text-slate-600 dark:text-white/70 rounded-xl hover:bg-ovp-accent hover:text-white transition-all">FB</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        <?php endwhile; ?>

    </div>
</main>

<?php get_footer(); ?>
