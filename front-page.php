<?php
/**
 * The front page template file - STABILITY EDITION
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- 1. HERO SLIDER (v7) -->
    <section class="relative h-screen bg-black overflow-hidden">
        <div class="absolute inset-0 z-0">
            <?php
            $hero_query = new WP_Query(array('posts_per_page' => 4, 'post_status' => 'publish'));
            $hero_ids = array();
            if ($hero_query->have_posts()) : $count = 0;
                while ($hero_query->have_posts()) : $hero_query->the_post();
                    $hero_ids[] = get_the_ID();
            ?>
                <div class="hero-slide absolute inset-0 transition-all duration-1000 transform <?php echo $count === 0 ? 'opacity-100 scale-100' : 'opacity-0 scale-105'; ?>" data-slide="<?php echo $count; ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover opacity-60')); ?>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-r from-black via-black/40 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                    
                    <div class="container mx-auto px-6 h-full flex flex-col justify-center relative z-10">
                        <div class="max-w-4xl space-y-6">
                            <h2 class="text-6xl md:text-8xl font-black text-white tracking-tighter leading-[0.85] uppercase"><?php the_title(); ?></h2>
                            <p class="text-xl text-slate-300 font-light max-w-2xl line-clamp-3"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                            <a href="<?php the_permalink(); ?>" class="inline-block px-12 py-5 bg-ovp-accent text-white font-black uppercase text-[10px] tracking-widest rounded-md hover:bg-white hover:text-black transition-all shadow-2xl">Leer Noticia Completa</a>
                        </div>
                    </div>
                </div>
            <?php $count++; endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <!-- Navigation Arrows -->
        <button class="prev-slide absolute left-8 top-1/2 -translate-y-1/2 z-40 w-16 h-16 bg-white/10 hover:bg-ovp-accent text-white rounded-full flex items-center justify-center transition-all border border-white/10 backdrop-blur-md">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>
        <button class="next-slide absolute right-8 top-1/2 -translate-y-1/2 z-40 w-16 h-16 bg-white/10 hover:bg-ovp-accent text-white rounded-full flex items-center justify-center transition-all border border-white/10 backdrop-blur-md">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>

        <!-- Bento Hero Boxes -->
        <div class="absolute bottom-12 left-0 right-0 z-30">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="glass-card p-8 border-white/10 hover:border-ovp-accent transition-all">
                        <span class="block text-ovp-accent font-black text-xs uppercase mb-2">Denunciar</span>
                        <h4 class="text-white text-sm font-bold uppercase">Abuso de Poder</h4>
                    </div>
                    <div class="glass-card p-8 border-white/10 hover:border-ovp-accent transition-all">
                        <span class="block text-ovp-accent font-black text-xs uppercase mb-2">Informes</span>
                        <h4 class="text-white text-sm font-bold uppercase">Cárceles 2024</h4>
                    </div>
                    <div class="glass-card p-8 border-white/10 hover:border-ovp-accent transition-all">
                        <span class="block text-ovp-accent font-black text-xs uppercase mb-2">Asistencia</span>
                        <h4 class="text-white text-sm font-bold uppercase">Legal Gratuita</h4>
                    </div>
                    <div class="glass-card p-8 border-white/10 hover:border-ovp-accent transition-all">
                        <span class="block text-ovp-accent font-black text-xs uppercase mb-2">Ashoka</span>
                        <h4 class="text-white text-sm font-bold uppercase">Humberto Prado</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. TEXTO INFORMATIVO (22 AÑOS) -->
    <section class="py-24 bg-white dark:bg-ovp-dark">
        <div class="container mx-auto px-6">
            <div class="bg-slate-50 dark:bg-white/5 rounded-[3rem] p-20 text-center border border-slate-100 dark:border-white/5">
                <h2 class="text-6xl md:text-9xl font-black text-slate-900 dark:text-white tracking-tighter mb-6 uppercase">22 Años</h2>
                <p class="text-2xl font-light text-ovp-accent uppercase tracking-[0.4em] mb-12">Al Servicio de la Justicia</p>
                <div class="max-w-3xl mx-auto h-1 bg-ovp-accent/20 rounded-full"></div>
            </div>
        </div>
    </section>

    <!-- 3. GRID DE NOTICIAS -->
    <section class="py-24 bg-white dark:bg-ovp-dark">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-20">
                <h2 class="text-5xl font-black text-slate-900 dark:text-white tracking-tighter uppercase">Actualidad <span class="text-ovp-accent">OVP</span></h2>
                <a href="#" class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-ovp-accent transition-all">Ver Archivo Completo</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <?php
                $news = new WP_Query(array('post__not_in' => $hero_ids, 'posts_per_page' => 6));
                if ($news->have_posts()) :
                    while ($news->have_posts()) : $news->the_post();
                ?>
                    <article class="news-card group shadow-sm">
                        <div class="h-72 overflow-hidden">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110')); ?>
                        </div>
                        <div class="p-10">
                            <h3 class="text-2xl font-black text-slate-900 dark:text-white leading-tight uppercase group-hover:text-ovp-accent transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-slate-500 dark:text-slate-400 text-sm font-light mt-4 line-clamp-3"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </section>

    <!-- 4. FRASES DE INSPIRACIÓN -->
    <section class="py-32 bg-slate-900 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-ovp-accent/5 opacity-40"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto">
                <h3 class="text-3xl md:text-5xl font-serif italic text-white leading-relaxed mb-10">
                    "Nadie conoce realmente a una nación hasta que no ha estado en sus cárceles."
                </h3>
                <div class="w-20 h-1 bg-ovp-accent mx-auto mb-8"></div>
                <span class="text-ovp-accent font-black uppercase tracking-widest text-sm">— Nelson Mandela</span>
            </div>
        </div>
    </section>

    <!-- 5. SECCIÓN DE VIDEO -->
    <section class="py-32 bg-white dark:bg-ovp-dark">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter uppercase mb-16">Multimedia <span class="text-ovp-accent">Penitenciaria</span></h2>
            <div class="aspect-video max-w-5xl mx-auto rounded-[3.5rem] overflow-hidden shadow-2xl group relative border-8 border-slate-50 dark:border-white/5">
                <img src="https://images.unsplash.com/photo-1485846234645-a62644f84728?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/30 flex items-center justify-center group-hover:bg-black/10 transition-all cursor-pointer">
                    <div class="w-24 h-24 bg-ovp-accent text-white rounded-full flex items-center justify-center pl-2 shadow-2xl transform group-hover:scale-110 transition-all">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z" /></svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. SECCIÓN DE AREA DE INTERES -->
    <section class="py-24 bg-slate-50 dark:bg-ovp-darker/50">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-10">
                <div class="glass-card p-12 text-center hover:bg-ovp-accent transition-all group cursor-pointer shadow-sm">
                    <div class="text-5xl mb-6 grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all">📈</div>
                    <h4 class="text-slate-900 dark:text-white text-xs font-black uppercase tracking-widest group-hover:text-white transition-colors">Informes Técnicos</h4>
                </div>
                <div class="glass-card p-12 text-center hover:bg-ovp-accent transition-all group cursor-pointer shadow-sm">
                    <div class="text-5xl mb-6 grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all">⚖️</div>
                    <h4 class="text-slate-900 dark:text-white text-xs font-black uppercase tracking-widest group-hover:text-white transition-colors">Denuncias</h4>
                </div>
                <div class="glass-card p-12 text-center hover:bg-ovp-accent transition-all group cursor-pointer shadow-sm">
                    <div class="text-5xl mb-6 grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all">🎥</div>
                    <h4 class="text-slate-900 dark:text-white text-xs font-black uppercase tracking-widest group-hover:text-white transition-colors">Multimedia</h4>
                </div>
                <div class="glass-card p-12 text-center hover:bg-ovp-accent transition-all group cursor-pointer shadow-sm">
                    <div class="text-5xl mb-6 grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all">🗺️</div>
                    <h4 class="text-slate-900 dark:text-white text-xs font-black uppercase tracking-widest group-hover:text-white transition-colors">Mapa de Cárceles</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. BOLETIN -->
    <section class="py-32 bg-white dark:bg-ovp-dark">
        <div class="container mx-auto px-6">
            <div class="bg-slate-900 rounded-[4rem] p-16 md:p-24 flex flex-col lg:flex-row items-center gap-20 overflow-hidden relative shadow-2xl">
                <div class="absolute top-0 right-0 w-1/2 h-full bg-ovp-accent/10 skew-x-12 transform translate-x-32"></div>
                <div class="relative z-10 lg:w-1/2 space-y-8">
                    <h2 class="text-5xl md:text-6xl font-black text-white tracking-tighter uppercase leading-none">Boletín <span class="text-ovp-accent">Informativo</span></h2>
                    <p class="text-xl text-slate-400 font-light leading-relaxed">Únete a nuestra red y recibe las actualizaciones más importantes sobre derechos humanos directamente en tu correo.</p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <input type="email" placeholder="Tu email principal" class="flex-1 bg-white/5 border border-white/10 rounded-2xl px-8 py-5 text-white outline-none focus:border-ovp-accent transition-all">
                        <button class="px-12 py-5 bg-ovp-accent text-white font-black uppercase text-xs tracking-widest rounded-2xl hover:bg-white hover:text-black transition-all">Suscribirme</button>
                    </div>
                </div>
                <div class="lg:w-1/2 relative z-10">
                    <div class="glass-card p-4 border-white/10 shadow-2xl rotate-3 transform hover:rotate-0 transition-all duration-700">
                        <img src="https://images.unsplash.com/photo-1496065187959-7f07b8353c55?auto=format&fit=crop&q=80&w=1000" class="rounded-[2rem]" alt="Boletín">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. PUBLICACIONES -->
    <section class="py-24 bg-white dark:bg-ovp-dark">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-xs font-black text-ovp-accent uppercase tracking-[0.4em] mb-12">Publicaciones Especializadas</h2>
            <div class="flex flex-wrap justify-center gap-16">
                <div class="flex flex-col items-center gap-4 grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition-all">
                    <span class="text-4xl">📚</span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-900 dark:text-white">Libros</span>
                </div>
                <div class="flex flex-col items-center gap-4 grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition-all">
                    <span class="text-4xl">🗞️</span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-900 dark:text-white">Revistas</span>
                </div>
                <div class="flex flex-col items-center gap-4 grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition-all">
                    <span class="text-4xl">📄</span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-900 dark:text-white">Guías</span>
                </div>
                <div class="flex flex-col items-center gap-4 grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition-all">
                    <span class="text-4xl">🗒️</span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-900 dark:text-white">Trifolios</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. ASHOKA -->
    <section class="py-32 bg-slate-50 dark:bg-ovp-darker">
        <div class="container mx-auto px-6">
            <div class="bg-white dark:bg-white/5 border border-slate-100 dark:border-white/5 rounded-[4rem] p-16 md:p-24 flex flex-col lg:flex-row items-center gap-20 shadow-xl">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Ashoka_Logo.svg/2560px-Ashoka_Logo.svg.png" class="h-24 md:h-32 grayscale opacity-60 dark:invert" alt="Ashoka">
                <div class="space-y-6 text-center lg:text-left">
                    <h2 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tighter uppercase leading-none">Humberto Prado: <span class="text-ovp-accent">Fellow de Ashoka</span></h2>
                    <p class="text-xl text-slate-500 dark:text-slate-400 font-light leading-relaxed">Pertenecemos a la red más importante de emprendedores sociales del mundo, impulsando cambios sistémicos en los derechos humanos de Venezuela.</p>
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
            s.classList.add('scale-105');
            s.classList.remove('scale-100');
        });
        slides[index].classList.replace('opacity-0', 'opacity-100');
        slides[index].classList.remove('scale-105');
        slides[index].classList.add('scale-100');
        current = index;
    }

    document.querySelector('.next-slide').onclick = () => show((current + 1) % total);
    document.querySelector('.prev-slide').onclick = () => show((current - 1 + total) % total);
    
    setInterval(() => show((current + 1) % total), 9000);
});
</script>

<?php get_footer(); ?>
