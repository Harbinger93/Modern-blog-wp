<?php
/**
 * The front page template file
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Hero Section with Mesh Gradient & Animated Text -->
    <section class="relative min-h-[85vh] flex items-center justify-center overflow-hidden mesh-bg pt-20">
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl">
                <span class="inline-block px-4 py-1 mb-6 text-[10px] font-black tracking-widest uppercase bg-ovp-accent/20 text-ovp-accent border border-ovp-accent/30 rounded-full animate-pulse">
                    Monitoreo en Tiempo Real
                </span>
                <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter leading-[0.9] mb-8">
                    Transparencia y <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-ovp-accent to-blue-400">Justicia</span> para el <br/>
                    Sistema Penitenciario.
                </h1>
                <p class="text-lg md:text-xl text-slate-300 font-light max-w-2xl mb-12 leading-relaxed">
                    Analizamos, documentamos y publicamos información técnica sobre los derechos humanos en las prisiones, manteniendo un compromiso inquebrantable con la verdad.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#noticias" class="px-8 py-4 bg-white text-ovp-dark font-black uppercase text-xs tracking-widest rounded-xl hover:bg-ovp-accent hover:text-white transition-all shadow-2xl shadow-white/10">
                        Ver Últimas Noticias
                    </a>
                    <a href="<?php echo get_post_type_archive_link('informes'); ?>" class="px-8 py-4 bg-white/5 backdrop-blur-md border border-white/10 text-white font-black uppercase text-xs tracking-widest rounded-xl hover:bg-white/10 transition-all">
                        Informes Técnicos
                    </a>
                </div>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute top-1/4 -right-20 w-96 h-96 bg-ovp-accent/20 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-1/4 -left-20 w-96 h-96 bg-blue-500/10 rounded-full blur-[120px]"></div>
    </section>

    <!-- Critical Stats / Monitoring Bar -->
    <section class="py-12 bg-ovp-dark border-y border-white/5">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <span class="block text-3xl font-black text-white mb-1">500+</span>
                    <span class="text-[10px] uppercase tracking-widest text-slate-500">Informes Publicados</span>
                </div>
                <div class="text-center">
                    <span class="block text-3xl font-black text-ovp-accent mb-1">24/7</span>
                    <span class="text-[10px] uppercase tracking-widest text-slate-500">Monitoreo Activo</span>
                </div>
                <div class="text-center">
                    <span class="block text-3xl font-black text-white mb-1">20+</span>
                    <span class="text-[10px] uppercase tracking-widest text-slate-500">Años de Trayectoria</span>
                </div>
                <div class="text-center">
                    <span class="block text-3xl font-black text-white mb-1">100%</span>
                    <span class="text-[10px] uppercase tracking-widest text-slate-500">Independencia</span>
                </div>
            </div>
        </div>
    </section>

    <!-- News Grid: Latest News -->
    <section id="noticias" class="py-24 bg-ovp-light dark:bg-ovp-dark transition-colors duration-500">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-16">
                <div>
                    <span class="text-ovp-accent text-[10px] font-black uppercase tracking-widest mb-4 block">Actualidad</span>
                    <h2 class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter">Últimas Noticias</h2>
                </div>
                <a href="<?php echo get_post_type_archive_link('post'); ?>" class="text-ovp-accent text-xs font-bold uppercase tracking-widest hover:underline">Ver todo el archivo &rarr;</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <?php
                $news_query = new WP_Query(array('posts_per_page' => 3));
                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                ?>
                    <article class="group">
                        <div class="relative aspect-[16/10] overflow-hidden rounded-2xl mb-6 shadow-xl">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700')); ?>
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-ovp-dark/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                        <span class="text-ovp-accent text-[10px] font-black uppercase tracking-[0.2em] mb-3 block"><?php echo get_the_date(); ?></span>
                        <h3 class="text-xl font-black text-slate-900 dark:text-white tracking-tight mb-4 group-hover:text-ovp-accent transition-colors leading-snug">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 font-light line-clamp-2 mb-6">
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="text-[10px] font-black uppercase tracking-widest text-slate-900 dark:text-white border-b-2 border-ovp-accent pb-1">Leer más</a>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Quote / Mission Section -->
    <section class="py-32 relative overflow-hidden bg-ovp-dark">
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="glass-card p-12 border-white/5 relative">
                    <div class="w-10 h-10 bg-ovp-accent rounded-lg mb-8"></div>
                    <blockquote class="text-2xl md:text-3xl font-light italic text-white leading-relaxed mb-8">
                        "La educación es el arma más poderosa que puedes usar para cambiar el mundo."
                    </blockquote>
                    <cite class="text-slate-400 font-black uppercase text-xs tracking-widest">— Nelson Mandela</cite>
                </div>
                <div class="relative group">
                    <div class="aspect-video rounded-3xl overflow-hidden shadow-2xl relative">
                        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&q=80&w=1000" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" alt="Justicia">
                        <div class="absolute inset-0 bg-ovp-dark/40 flex items-center justify-center">
                            <button class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-ovp-dark translate-x-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
