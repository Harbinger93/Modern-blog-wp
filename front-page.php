<?php
/**
 * The front page template file - ULTRA PREMIUM NETFLIX EDITION
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Hero Slider: Netflix Cinema Experience -->
    <section class="relative h-screen bg-ovp-darker overflow-hidden">
        <div class="absolute inset-0">
            <?php
            $hero_query = new WP_Query(array(
                'posts_per_page' => 5,
                'post_status'    => 'publish'
            ));
            $total_slides = $hero_query->post_count;
            if ($hero_query->have_posts()) : $count = 0;
                while ($hero_query->have_posts()) : $hero_query->the_post();
            ?>
                <div class="hero-slide absolute inset-0 transition-all duration-1000 transform <?php echo $count === 0 ? 'hero-slide-active' : 'hero-slide-inactive'; ?>" data-slide="<?php echo $count; ?>">
                    <!-- Cinematic Background Image -->
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover scale-105 group-hover:scale-100 transition-transform duration-[10s]')); ?>
                    <?php else: ?>
                        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover opacity-40">
                    <?php endif; ?>

                    <!-- Cinematic Gradients -->
                    <div class="absolute inset-0 bg-gradient-to-r from-ovp-darker via-ovp-darker/60 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-ovp-darker via-transparent to-transparent"></div>
                    
                    <div class="container mx-auto px-6 h-full flex flex-col justify-center relative z-10">
                        <div class="max-w-4xl space-y-6">
                            <div class="flex items-center gap-4 animate-fadeIn">
                                <span class="px-2 py-0.5 bg-ovp-accent text-white text-[10px] font-black uppercase tracking-widest rounded-sm">Top Noticia</span>
                                <span class="text-ovp-slate text-[10px] font-bold uppercase tracking-widest"><?php echo get_the_date(); ?></span>
                            </div>
                            <h2 class="text-6xl md:text-8xl font-black text-white tracking-tighter leading-[0.85] animate-slideUp">
                                <?php the_title(); ?>
                            </h2>
                            <p class="text-xl md:text-2xl text-ovp-slate font-light max-w-2xl leading-relaxed animate-fadeIn delay-300">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                            <div class="flex flex-wrap gap-4 pt-6 animate-fadeIn delay-500">
                                <a href="<?php the_permalink(); ?>" class="px-10 py-4 bg-white text-ovp-darker font-black uppercase text-xs tracking-[0.2em] rounded-md hover:bg-ovp-accent hover:text-white transition-all transform hover:scale-105 active:scale-95 shadow-2xl">
                                    Explorar Ahora
                                </a>
                                <button class="next-slide-trigger group px-10 py-4 bg-white/10 backdrop-blur-md text-white font-black uppercase text-xs tracking-[0.2em] rounded-md hover:bg-white/20 transition-all border border-white/10">
                                    Siguiente <span class="inline-block group-hover:translate-x-2 transition-transform">&rarr;</span>
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

        <!-- Slider Navigation (Netflix Style Bar) -->
        <div class="absolute bottom-12 left-0 right-0 z-20">
            <div class="container mx-auto px-6">
                <div class="flex items-end gap-1">
                    <?php for($i=0; $i<$count; $i++): ?>
                        <div class="slide-indicator-container flex-1 h-1.5 bg-white/10 rounded-full overflow-hidden cursor-pointer" data-go="<?php echo $i; ?>">
                            <div class="slide-progress h-full bg-ovp-accent transition-all duration-[8s] ease-linear <?php echo $i === 0 ? 'w-full' : 'w-0'; ?>"></div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Content: Strategic Mission (Ultra Responsive) -->
    <section class="py-32 relative overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
                <div class="order-2 lg:order-1">
                    <div class="inline-block px-4 py-1.5 bg-ovp-accent/10 border border-ovp-accent/20 rounded-full mb-8">
                        <span class="text-ovp-accent text-[10px] font-black uppercase tracking-[0.3em]">Nuestra Incidencia</span>
                    </div>
                    <h2 class="text-5xl md:text-7xl font-black text-white tracking-tighter mb-10 leading-[0.9]">
                        Protegiendo la <span class="text-transparent bg-clip-text bg-gradient-to-r from-ovp-accent to-blue-300">Libertad Individual</span>.
                    </h2>
                    <p class="text-xl text-ovp-slate font-light leading-relaxed mb-12">
                        El OVP opera bajo un mandato de monitoreo técnico riguroso. No somos solo observadores; somos la barrera contra la opacidad institucional en el sistema penitenciario venezolano.
                    </p>
                    <div class="space-y-8">
                        <div class="flex items-start gap-6 group">
                            <div class="w-14 h-14 shrink-0 glass-card bg-ovp-accent/20 flex items-center justify-center group-hover:bg-ovp-accent transition-colors">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-black text-white mb-2 uppercase tracking-tight">Defensa Jurídica Nacional</h4>
                                <p class="text-sm text-ovp-slate font-light">Asistencia técnica y legal para víctimas de violaciones a DDHH.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-6 group">
                            <div class="w-14 h-14 shrink-0 glass-card bg-ovp-accent/20 flex items-center justify-center group-hover:bg-ovp-accent transition-colors">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-black text-white mb-2 uppercase tracking-tight">Presión Internacional</h4>
                                <p class="text-sm text-ovp-slate font-light">Incidencia directa ante la OEA, CIDH y Naciones Unidas.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-1 lg:order-2 relative">
                    <div class="glass-card p-4 rotate-3 transform hover:rotate-0 transition-transform duration-700">
                        <img src="https://images.unsplash.com/photo-1505664194779-8beaceb93744?auto=format&fit=crop&q=80&w=1000" class="rounded-2xl shadow-2xl" alt="Misión">
                    </div>
                    <!-- Decorative Orbit -->
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-ovp-accent/10 rounded-full blur-3xl animate-pulse"></div>
                </div>
            </div>
        </div>
    </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const progressBars = document.querySelectorAll('.slide-progress');
    const total = slides.length;
    let timer;

    function showSlide(index) {
        slides.forEach(s => {
            s.classList.remove('hero-slide-active');
            s.classList.add('hero-slide-inactive');
        });
        progressBars.forEach(p => {
            p.style.transition = 'none';
            p.style.width = '0%';
        });

        slides[index].classList.remove('hero-slide-inactive');
        slides[index].classList.add('hero-slide-active');
        
        // Reset and start progress
        setTimeout(() => {
            progressBars[index].style.transition = 'width 8s linear';
            progressBars[index].style.width = '100%';
        }, 50);

        currentSlide = index;
        resetTimer();
    }

    function nextSlide() {
        showSlide((currentSlide + 1) % total);
    }

    function resetTimer() {
        clearInterval(timer);
        timer = setInterval(nextSlide, 8000);
    }

    document.querySelectorAll('.next-slide-trigger').forEach(btn => {
        btn.addEventListener('click', nextSlide);
    });

    document.querySelectorAll('.slide-indicator-container').forEach(ind => {
        ind.addEventListener('click', () => {
            showSlide(parseInt(ind.dataset.go));
        });
    });

    showSlide(0);
});
</script>

<style>
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
@keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
.animate-fadeIn { animation: fadeIn 1s forwards; }
.animate-slideUp { animation: slideUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
.delay-300 { animation-delay: 300ms; }
.delay-500 { animation-delay: 500ms; }
</style>

<?php get_footer(); ?>
