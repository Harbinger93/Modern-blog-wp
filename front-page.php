<?php
/**
 * The front page template file
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Netflix Style Hero Slider -->
    <section class="relative h-[90vh] bg-ovp-dark overflow-hidden">
        <div class="absolute inset-0 z-0">
            <?php
            $hero_query = new WP_Query(array(
                'posts_per_page' => 5,
                'post_status'    => 'publish'
            ));
            if ($hero_query->have_posts()) : $count = 0;
                while ($hero_query->have_posts()) : $hero_query->the_post();
            ?>
                <div class="hero-slide absolute inset-0 transition-opacity duration-1000 <?php echo $count === 0 ? 'opacity-100' : 'opacity-0'; ?>" data-slide="<?php echo $count; ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover opacity-60')); ?>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-t from-ovp-dark via-ovp-dark/20 to-transparent"></div>
                    
                    <div class="container mx-auto px-6 h-full flex items-center relative z-10">
                        <div class="max-w-3xl">
                            <span class="inline-block px-3 py-1 mb-6 text-[10px] font-black tracking-widest uppercase bg-ovp-accent text-white rounded-sm">
                                Noticia Destacada
                            </span>
                            <h2 class="text-5xl md:text-7xl font-black text-white tracking-tighter leading-[0.9] mb-6">
                                <?php the_title(); ?>
                            </h2>
                            <p class="text-lg text-slate-300 font-light mb-10 line-clamp-2 max-w-xl">
                                <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                            </p>
                            <div class="flex gap-4">
                                <a href="<?php the_permalink(); ?>" class="px-8 py-4 bg-white text-ovp-dark font-black uppercase text-xs tracking-widest rounded-sm hover:bg-ovp-accent hover:text-white transition-all">
                                    Leer Noticia
                                </a>
                                <button class="next-slide px-8 py-4 border border-white/20 text-white font-black uppercase text-xs tracking-widest rounded-sm hover:bg-white/10 transition-all">
                                    Siguiente &rarr;
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $count++;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <!-- Slider Controls (Dots) -->
        <div class="absolute bottom-10 right-10 z-20 flex gap-2">
            <?php for($i=0; $i<$count; $i++): ?>
                <button class="slide-dot w-12 h-1 bg-white/20 transition-all <?php echo $i === 0 ? 'bg-ovp-accent w-20' : ''; ?>" data-go="<?php echo $i; ?>"></button>
            <?php endfor; ?>
        </div>
    </section>

    <!-- Content Sections: Mission & Action -->
    <section class="py-24 bg-ovp-light dark:bg-ovp-dark transition-colors duration-500">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div>
                    <h2 class="text-4xl md:text-6xl font-black text-slate-900 dark:text-white tracking-tighter mb-8 leading-[0.9]">
                        Defendiendo la <span class="text-ovp-accent">Dignidad Humana</span> en cada rincón.
                    </h2>
                    <p class="text-lg text-slate-600 dark:text-slate-400 font-light leading-relaxed mb-10">
                        El Observatorio Venezolano de Prisiones (OVP) es una organización no gubernamental que lucha por el respeto a los derechos humanos de las personas privadas de libertad. Nuestra labor se basa en el monitoreo constante, la denuncia técnica y la incidencia jurídica ante organismos nacionales e internacionales.
                    </p>
                    <div class="grid grid-cols-2 gap-8 mb-10">
                        <div class="glass-card p-6 bg-slate-100 dark:bg-white/5">
                            <span class="block text-2xl font-black text-ovp-accent mb-2">Asistencia</span>
                            <p class="text-xs text-slate-500 uppercase tracking-widest">Legal Gratuita</p>
                        </div>
                        <div class="glass-card p-6 bg-slate-100 dark:bg-white/5">
                            <span class="block text-2xl font-black text-ovp-accent mb-2">Incidencia</span>
                            <p class="text-xs text-slate-500 uppercase tracking-widest">Internacional</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&q=80&w=1000" class="rounded-3xl shadow-2xl grayscale hover:grayscale-0 transition-all duration-700" alt="Justicia">
                    <div class="absolute -top-10 -left-10 w-32 h-32 bg-ovp-accent/20 rounded-full blur-3xl animate-pulse"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section (Serious Tone) -->
    <section class="py-20 bg-ovp-dark border-y border-white/5">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
                <div>
                    <span class="block text-4xl font-black text-white mb-2">100%</span>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Transparencia</p>
                </div>
                <div>
                    <span class="block text-4xl font-black text-ovp-accent mb-2">24h</span>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Monitoreo Crítico</p>
                </div>
                <div>
                    <span class="block text-4xl font-black text-white mb-2">OEA/CIDH</span>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Reconocimiento</p>
                </div>
                <div>
                    <span class="block text-4xl font-black text-white mb-2">Independiente</span>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Financiamiento</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Reports (Informes) -->
    <section class="py-24 bg-white dark:bg-[#050505]">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-16">
                <h2 class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter">Biblioteca de Informes</h2>
                <a href="<?php echo get_post_type_archive_link('informes'); ?>" class="text-ovp-accent text-xs font-bold uppercase tracking-widest border-b border-ovp-accent pb-1">Ver todos</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <?php
                $reports = new WP_Query(array('post_type' => 'informes', 'posts_per_page' => 4));
                if ($reports->have_posts()) :
                    while ($reports->have_posts()) : $reports->the_post();
                ?>
                    <div class="glass-card p-8 group hover:bg-ovp-accent transition-all duration-500 hover:-translate-y-2">
                        <div class="w-8 h-8 bg-ovp-accent group-hover:bg-white rounded mb-6 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white group-hover:text-ovp-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h4 class="text-sm font-black text-slate-900 dark:text-white group-hover:text-white mb-4 line-clamp-2 uppercase tracking-tight">
                            <?php the_title(); ?>
                        </h4>
                        <a href="<?php the_permalink(); ?>" class="text-[10px] font-bold uppercase tracking-widest text-ovp-accent group-hover:text-white border-b border-current">Descargar</a>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slide-dot');
    const totalSlides = slides.length;

    function showSlide(index) {
        slides.forEach(s => s.classList.replace('opacity-100', 'opacity-0'));
        dots.forEach(d => {
            d.classList.remove('bg-ovp-accent', 'w-20');
            d.classList.add('bg-white/20', 'w-12');
        });

        slides[index].classList.replace('opacity-0', 'opacity-100');
        dots[index].classList.add('bg-ovp-accent', 'w-20');
        dots[index].classList.remove('bg-white/20', 'w-12');
        currentSlide = index;
    }

    document.querySelectorAll('.next-slide').forEach(btn => {
        btn.addEventListener('click', () => {
            let next = (currentSlide + 1) % totalSlides;
            showSlide(next);
        });
    });

    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            showSlide(parseInt(dot.dataset.go));
        });
    });

    // Auto Advance
    setInterval(() => {
        let next = (currentSlide + 1) % totalSlides;
        showSlide(next);
    }, 8000);
});
</script>

<?php get_footer(); ?>
