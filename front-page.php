<?php
/**
 * The front page template file - MEGA RESTRUCTURATION
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- 1. HERO SLIDER (v6) -->
    <section class="relative h-screen bg-ovp-darker overflow-hidden">
        <div class="absolute inset-0 z-0">
            <?php
            $hero_query = new WP_Query(array('posts_per_page' => 4, 'post_status' => 'publish'));
            $hero_ids = array();
            if ($hero_query->have_posts()) : $count = 0;
                while ($hero_query->have_posts()) : $hero_query->the_post();
                    $hero_ids[] = get_the_ID();
            ?>
                <div class="hero-slide absolute inset-0 transition-all duration-1000 transform <?php echo $count === 0 ? 'opacity-100 scale-100 visible' : 'opacity-0 scale-105 invisible'; ?>" data-slide="<?php echo $count; ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover opacity-40')); ?>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-r from-ovp-darker via-ovp-darker/20 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-ovp-darker via-transparent to-transparent"></div>
                    
                    <div class="container mx-auto px-6 h-full flex flex-col justify-center relative z-10">
                        <div class="max-w-4xl space-y-6">
                            <h2 class="text-6xl md:text-8xl font-black text-white tracking-tighter leading-[0.85] uppercase"><?php the_title(); ?></h2>
                            <p class="text-xl text-ovp-slate font-light max-w-2xl line-clamp-2"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                            <a href="<?php the_permalink(); ?>" class="inline-block px-10 py-4 bg-ovp-accent text-white font-black uppercase text-[10px] tracking-widest rounded-md hover:bg-white hover:text-ovp-darker transition-all">Leer Más</a>
                        </div>
                    </div>
                </div>
            <?php $count++; endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <!-- Navigation Arrows -->
        <button class="prev-slide absolute left-6 top-1/2 -translate-y-1/2 z-30 w-14 h-14 glass-card flex items-center justify-center text-white hover:bg-ovp-accent transition-all">&larr;</button>
        <button class="next-slide absolute right-6 top-1/2 -translate-y-1/2 z-30 w-14 h-14 glass-card flex items-center justify-center text-white hover:bg-ovp-accent transition-all">&rarr;</button>

        <!-- Bento Hero Boxes (Quick Access) -->
        <div class="absolute bottom-10 left-0 right-0 z-30">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="glass-card p-6 border-ovp-accent/20 hover:border-ovp-accent transition-all group">
                        <span class="block text-ovp-accent font-black text-xs uppercase mb-2">Denunciar</span>
                        <h4 class="text-white text-sm font-bold uppercase">Casos de Abuso</h4>
                    </div>
                    <div class="glass-card p-6 border-ovp-accent/20 hover:border-ovp-accent transition-all group">
                        <span class="block text-ovp-accent font-black text-xs uppercase mb-2">Informes</span>
                        <h4 class="text-white text-sm font-bold uppercase">Situación 2024</h4>
                    </div>
                    <div class="glass-card p-6 border-ovp-accent/20 hover:border-ovp-accent transition-all group">
                        <span class="block text-ovp-accent font-black text-xs uppercase mb-2">Asistencia</span>
                        <h4 class="text-white text-sm font-bold uppercase">Legal Gratuita</h4>
                    </div>
                    <div class="glass-card p-6 border-ovp-accent/20 hover:border-ovp-accent transition-all group">
                        <span class="block text-ovp-accent font-black text-xs uppercase mb-2">Ashoka</span>
                        <h4 class="text-white text-sm font-bold uppercase">Fellowship</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. TEXTO INFORMATIVO (22 AÑOS) -->
    <section class="py-24 bg-white dark:bg-ovp-dark">
        <div class="container mx-auto px-6">
            <div class="relative rounded-[3rem] overflow-hidden">
                <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&q=80&w=2000" class="w-full h-[400px] object-cover grayscale opacity-20">
                <div class="absolute inset-0 flex flex-col justify-center items-center text-center p-12">
                    <h2 class="text-7xl md:text-9xl font-black text-slate-900 dark:text-white tracking-tighter mb-4">22 AÑOS</h2>
                    <p class="text-2xl font-light text-ovp-accent uppercase tracking-[0.3em]">Defendiendo la Libertad</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. GRID DE NOTICIAS -->
    <section class="py-24">
        <div class="container mx-auto px-6">
            <h2 class="text-5xl font-black text-white tracking-tighter uppercase mb-16">Actualidad <span class="text-ovp-accent">OVP</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <?php
                $news = new WP_Query(array('post__not_in' => $hero_ids, 'posts_per_page' => 6));
                if ($news->have_posts()) :
                    while ($news->have_posts()) : $news->the_post();
                ?>
                    <article class="news-card group">
                        <div class="h-64 overflow-hidden">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover transition-transform group-hover:scale-110')); ?>
                        </div>
                        <div class="p-8">
                            <h3 class="text-xl font-black text-white leading-tight uppercase group-hover:text-ovp-accent transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-ovp-slate text-sm font-light mt-4 line-clamp-2"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </section>

    <!-- 4. FRASES DE INSPIRACIÓN -->
    <section class="py-32 bg-ovp-darker text-center border-y border-white/5">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <svg class="w-16 h-16 text-ovp-accent mx-auto mb-10 opacity-40" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H16.017C14.9124 8 14.017 7.10457 14.017 6V3L21.017 3V15C21.017 18.3137 18.3307 21 15.017 21H14.017ZM3.01697 21L3.01697 18C3.01697 16.8954 3.9124 16 5.01697 16H8.01697C8.56925 16 9.01697 15.5523 9.01697 15V9C9.01697 8.44772 8.56925 8 8.01697 8H5.01697C3.9124 8 3.01697 7.10457 3.01697 6V3L10.017 3V15C10.017 18.3137 7.3307 21 4.01697 21H3.01697Z" /></svg>
                <h3 class="text-3xl md:text-5xl font-serif italic text-white leading-relaxed mb-8">
                    "Nadie conoce realmente a una nación hasta que no ha estado en sus cárceles."
                </h3>
                <span class="text-ovp-accent font-black uppercase tracking-widest text-sm">— Nelson Mandela</span>
            </div>
        </div>
    </section>

    <!-- 5. SECCIÓN DE VIDEO -->
    <section class="py-24">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-black text-white tracking-tighter uppercase mb-12">Nuestra Voz en <span class="text-ovp-accent">Multimedia</span></h2>
            <div class="aspect-video max-w-5xl mx-auto rounded-[3rem] overflow-hidden shadow-2xl border border-white/10 group relative">
                <img src="https://images.unsplash.com/photo-1485846234645-a62644f84728?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center group-hover:bg-black/20 transition-all cursor-pointer">
                    <div class="w-24 h-24 bg-ovp-accent rounded-full flex items-center justify-center text-white pl-2">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z" /></svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. SECCIÓN DE AREA DE INTERES -->
    <section class="py-24 bg-ovp-darker/50">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="glass-card p-10 text-center hover:bg-ovp-accent transition-all group cursor-pointer">
                    <div class="text-4xl mb-4 grayscale group-hover:grayscale-0 transition-all">📈</div>
                    <h4 class="text-white text-xs font-black uppercase tracking-widest">Informes Anuales</h4>
                </div>
                <div class="glass-card p-10 text-center hover:bg-ovp-accent transition-all group cursor-pointer">
                    <div class="text-4xl mb-4 grayscale group-hover:grayscale-0 transition-all">⚖️</div>
                    <h4 class="text-white text-xs font-black uppercase tracking-widest">Denuncias Técnicas</h4>
                </div>
                <div class="glass-card p-10 text-center hover:bg-ovp-accent transition-all group cursor-pointer">
                    <div class="text-4xl mb-4 grayscale group-hover:grayscale-0 transition-all">📸</div>
                    <h4 class="text-white text-xs font-black uppercase tracking-widest">Multimedia</h4>
                </div>
                <div class="glass-card p-10 text-center hover:bg-ovp-accent transition-all group cursor-pointer">
                    <div class="text-4xl mb-4 grayscale group-hover:grayscale-0 transition-all">🗺️</div>
                    <h4 class="text-white text-xs font-black uppercase tracking-widest">Mapa de Cárceles</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. SECCION BOLETIN INFORMATIVO -->
    <section class="py-24 bg-white dark:bg-ovp-dark overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="space-y-8">
                    <h2 class="text-5xl font-black text-slate-900 dark:text-white tracking-tighter uppercase">Suscríbete al <span class="text-ovp-accent">Boletín Digital</span></h2>
                    <p class="text-lg text-ovp-slate font-light">Recibe directamente en tu correo las alertas, informes y noticias más recientes sobre la situación penitenciaria en Venezuela.</p>
                    <div class="flex gap-4">
                        <input type="email" placeholder="Tu correo electrónico" class="flex-1 bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl px-6 py-4 text-white outline-none focus:border-ovp-accent transition-all">
                        <button class="px-8 py-4 bg-ovp-accent text-white font-black uppercase text-xs tracking-widest rounded-xl hover:scale-105 transition-all">Unirse</button>
                    </div>
                </div>
                <div class="relative">
                    <div class="glass-card p-4 rotate-6 transform hover:rotate-0 transition-all duration-700">
                        <img src="https://images.unsplash.com/photo-1496065187959-7f07b8353c55?auto=format&fit=crop&q=80&w=1000" class="rounded-2xl" alt="Boletín">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. CARRUSEL DE TIPOS DE PUBLICACIONES -->
    <section class="py-24">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-black text-white uppercase tracking-widest mb-16">Biblioteca <span class="text-ovp-accent">Técnica</span></h2>
            <div class="flex flex-wrap justify-center gap-12 grayscale opacity-40">
                <span class="text-xl font-bold uppercase tracking-widest">Libros</span>
                <span class="text-xl font-bold uppercase tracking-widest text-ovp-accent">Revistas</span>
                <span class="text-xl font-bold uppercase tracking-widest">Guías</span>
                <span class="text-xl font-bold uppercase tracking-widest">Trifolios</span>
            </div>
        </div>
    </section>

    <!-- 9. SOY FELLOW DE ASHOKA -->
    <section class="py-24 bg-ovp-darker border-t border-white/5">
        <div class="container mx-auto px-6">
            <div class="glass-card p-16 flex flex-col md:flex-row items-center gap-16 text-center md:text-left">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Ashoka_Logo.svg/2560px-Ashoka_Logo.svg.png" class="h-24 grayscale invert opacity-60" alt="Ashoka">
                <div>
                    <h2 class="text-4xl font-black text-white tracking-tighter uppercase mb-6">Humberto Prado: Fellow de <span class="text-ovp-accent">Ashoka</span></h2>
                    <p class="text-xl text-ovp-slate font-light leading-relaxed">
                        Reconocimiento internacional por la labor innovadora en la defensa de los derechos humanos y la transformación del sistema penitenciario.
                    </p>
                </div>
            </div>
        </div>
    </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let current = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const total = slides.length;

    function show(index) {
        slides.forEach(s => {
            s.classList.replace('opacity-100', 'opacity-0');
            s.classList.add('scale-105', 'invisible');
            s.classList.remove('scale-100', 'visible');
        });
        slides[index].classList.replace('opacity-0', 'opacity-100');
        slides[index].classList.remove('scale-105', 'invisible');
        slides[index].classList.add('scale-100', 'visible');
        current = index;
    }

    document.querySelector('.next-slide').onclick = () => show((current + 1) % total);
    document.querySelector('.prev-slide').onclick = () => show((current - 1 + total) % total);
    
    setInterval(() => show((current + 1) % total), 8000);
});
</script>

<?php get_footer(); ?>
