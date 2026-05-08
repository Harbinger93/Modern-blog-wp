<?php
/**
 * The front page template file
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Hero Section: Glassmorphism & Dynamic Background -->
    <section class="relative min-h-[80vh] flex items-center justify-center overflow-hidden mesh-bg">
        <div class="absolute inset-0 bg-ovp-dark/40 z-10"></div>
        
        <div class="container mx-auto px-6 relative z-20">
            <div class="max-w-3xl glass-card p-10 md:p-16 border-white/20">
                <span class="inline-block px-4 py-1 mb-6 text-xs font-bold tracking-widest uppercase bg-ovp-accent text-white rounded-full">
                    Monitoreo en Tiempo Real
                </span>
                <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight tracking-tighter">
                    Transparencia y Justicia para el Sistema Penitenciario.
                </h1>
                <p class="text-lg md:text-xl text-white/80 mb-10 leading-relaxed font-light">
                    Analizamos, documentamos y publicamos información técnica sobre los derechos humanos en las prisiones, manteniendo un compromiso inquebrantable con la verdad.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="<?php echo esc_url( home_url('/noticias') ); ?>" class="px-8 py-4 bg-white text-ovp-dark font-bold rounded-xl hover:bg-ovp-accent hover:text-white transition-all duration-300 transform hover:-translate-y-1">
                        Ver Últimas Noticias
                    </a>
                    <a href="<?php echo esc_url( home_url('/publicaciones') ); ?>" class="px-8 py-4 glass-card border-white/30 text-white font-bold rounded-xl hover:bg-white/10 transition-all duration-300">
                        Informes Técnicos
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section: Modern Grid -->
    <section class="py-24 bg-ovp-light dark:bg-ovp-dark transition-colors duration-500">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-4">
                <div>
                    <h2 class="text-sm font-bold text-ovp-accent uppercase tracking-[0.2em] mb-4">Actualidad</h2>
                    <h3 class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter">Últimas Noticias</h3>
                </div>
                <a href="<?php echo esc_url( home_url('/noticias') ); ?>" class="text-ovp-accent font-bold border-b-2 border-ovp-accent/20 hover:border-ovp-accent transition-all">
                    Ver todo el archivo &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php
                $news_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3
                ));

                if ( $news_query->have_posts() ) :
                    while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
                        <article class="group relative bg-white dark:bg-white/5 rounded-3xl overflow-hidden shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-100 dark:border-white/5">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="aspect-video overflow-hidden">
                                    <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110')); ?>
                                </div>
                            <?php endif; ?>
                            <div class="p-8">
                                <span class="text-ovp-accent text-xs font-bold uppercase tracking-widest mb-4 block">
                                    <?php echo get_the_date(); ?>
                                </span>
                                <h4 class="text-2xl font-bold text-slate-900 dark:text-white mb-4 leading-snug group-hover:text-ovp-accent transition-colors">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <div class="text-slate-600 dark:text-white/60 mb-6 line-clamp-3 font-light">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-ovp-dark dark:text-white font-bold group/link">
                                    Leer más <span class="ml-2 transform transition-transform group-hover/link:translate-x-1">&rarr;</span>
                                </a>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </section>

    <!-- Multimedia & Quote Section -->
    <section class="py-24 mesh-bg relative overflow-hidden">
        <div class="absolute inset-0 bg-ovp-dark/80 z-10"></div>
        <div class="container mx-auto px-6 relative z-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="glass-card p-12 border-white/10">
                    <svg class="w-16 h-16 text-ovp-accent mb-8 opacity-50" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 13.1216 16 12.017 16H8.01701C6.91244 16 6.01701 16.8954 6.01701 18V21M6.01701 21H18.017C19.1216 21 20.017 20.1046 20.017 19V5C20.017 3.89543 19.1216 3 18.017 3H6.01701C4.91244 3 4.01701 3.89543 4.01701 5V19C4.01701 20.1046 4.91244 21 6.01701 21ZM12.017 12C13.6739 12 15.017 10.6569 15.017 9C15.017 7.34315 13.6739 6 12.017 6C10.3602 6 9.01701 7.34315 9.01701 9C9.01701 10.6569 10.3602 12 12.017 12Z"/></svg>
                    <blockquote class="text-3xl font-light text-white italic mb-8 leading-relaxed">
                        "La educación es el arma más poderosa que puedes usar para cambiar el mundo."
                    </blockquote>
                    <cite class="text-ovp-accent font-bold text-lg not-italic">— Nelson Mandela</cite>
                </div>
                <div class="relative group">
                    <div class="absolute -inset-4 bg-ovp-accent/30 blur-2xl rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative glass-card overflow-hidden aspect-video border-white/20">
                         <!-- Placeholder for Video -->
                         <div class="absolute inset-0 flex items-center justify-center bg-black/40">
                             <button class="w-24 h-24 bg-white text-ovp-dark rounded-full flex items-center justify-center pl-2 hover:scale-110 transition-transform shadow-2xl">
                                 <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                             </button>
                         </div>
                         <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Multimedia Preview" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
