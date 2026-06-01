<?php
/**
 * Template Name: Inicio
 * Description: Plantilla para la página de inicio institucional
 *
 * @package ovp-theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- 1. HERO SLIDER -->
    <section class="relative h-[90vh] bg-slate-900 overflow-hidden ">
        <div class="absolute inset-0">
            <?php
            $hero_query = new WP_Query(array('posts_per_page' => 4, 'post_status' => 'publish'));
            $hero_ids = array();
            if ($hero_query->have_posts()) : $count = 0;
                while ($hero_query->have_posts()) : $hero_query->the_post();
                    $hero_ids[] = get_the_ID();
            ?>
                <div class="hero-slide absolute inset-0 transition-all duration-1000 <?php echo $count === 0 ? 'opacity-100' : 'opacity-0'; ?>" data-slide="<?php echo $count; ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover')); ?>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20"></div>
                    
                    <div class="absolute inset-0 flex items-center">
                        <div class="container mx-auto px-6">
                            <div class="max-w-3xl space-y-5">
                                <span class="inline-block px-3 py-1 bg-blue-600 text-white text-[11px] font-bold uppercase tracking-wider rounded">Reportaje</span>
                                <h2 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-[0.95] tracking-tight"><?php the_title(); ?></h2>
                                <p class="text-lg text-white/70 font-light max-w-xl leading-relaxed line-clamp-2"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 px-8 py-3.5 bg-blue-600 text-white text-sm font-bold rounded-lg hover:bg-blue-500 transition-colors shadow-lg shadow-blue-600/25">
                                    Leer más
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $count++; endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <!-- Arrows -->
        <button class="prev-slide absolute left-4 md:left-8 top-1/2 -translate-y-1/2 z-40 w-12 h-12 bg-white/10 hover:bg-white/20 backdrop-blur text-white rounded-full flex items-center justify-center transition-all border border-white/20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button class="next-slide absolute right-4 md:right-8 top-1/2 -translate-y-1/2 z-40 w-12 h-12 bg-white/10 hover:bg-white/20 backdrop-blur text-white rounded-full flex items-center justify-center transition-all border border-white/20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
        </button>

        <!-- Dots -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-30 flex gap-2">
            <?php for ($i = 0; $i < min(count($hero_ids), 4); $i++) : ?>
                <button class="slide-dot w-2.5 h-2.5 rounded-full transition-all <?php echo $i === 0 ? 'bg-blue-500 w-8' : 'bg-white/40 hover:bg-white/60'; ?>" data-dot="<?php echo $i; ?>"></button>
            <?php endfor; ?>
        </div>
    </section>

    <!-- 2. NOSOTROS (Banner Institucional) -->
    <section class="py-20 md:py-28 bg-white dark:bg-[#050b18]">
        <div class="container mx-auto px-6">
            <div class="relative min-h-[450px] md:min-h-[550px] rounded-[2.5rem] overflow-hidden flex items-center shadow-2xl group">
                <!-- Background Image -->
                <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&q=80&w=2000" 
                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000" alt="OVP Trayectoria">
                
                <!-- Gradient Overlay (Darkening to the left) -->
                <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/90 to-slate-900/20"></div>
                
                <!-- Content -->
                <div class="relative z-10 w-full p-10 md:p-20 text-left">
                    <div class="max-w-3xl">
                        <img src="https://oveprisiones.com/wp-content/uploads/2016/12/OVPlogo_blanco320x99-1.png" 
                             class="h-14 md:h-20 w-auto mb-8 drop-shadow-xl" alt="OVP Logo">
                        
                        <div class="space-y-2 mb-8">
                            <h2 class="text-6xl md:text-9xl font-black text-white tracking-tighter leading-none">
                                24 <span class="text-blue-500">AÑOS</span>
                            </h2>
                            <div class="h-1.5 w-24 bg-blue-600 rounded-full"></div>
                        </div>
                        
                        <p class="text-xl md:text-3xl font-light text-slate-100 leading-tight md:max-w-2xl">
                            En la defensa y promoción de los derechos humanos de las personas privadas de libertad y acompañando a sus familiares
                        </p>
                    </div>
                </div>

                <!-- Subtle Bottom Bar with Socials (Matching Screenshot) -->
                <div class="absolute bottom-10 left-20 hidden md:flex items-center gap-6 opacity-60">
                    <div class="flex gap-4">
                        <span class="w-8 h-8 rounded-full border border-white/30 flex items-center justify-center text-xs">𝕏</span>
                        <span class="w-8 h-8 rounded-full border border-white/30 flex items-center justify-center text-xs">IG</span>
                        <span class="w-8 h-8 rounded-full border border-white/30 flex items-center justify-center text-xs">FB</span>
                    </div>
                    <span class="text-sm font-medium text-white/80">@oveprisiones</span>
                    <span class="text-sm font-medium text-white/80">www.oveprisiones.com</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. NOTICIAS -->
    <section class="py-20 bg-slate-50 dark:bg-[#070e1e]">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-12">
                <div>
                    <span class="text-blue-600 text-xs font-bold uppercase tracking-wider">Actualidad</span>
                    <h2 class="text-3xl md:text-4xl font-black text-slate-900 dark:text-white tracking-tight mt-1">Noticias OVP</h2>
                </div>
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="text-sm font-semibold text-blue-600 hover:text-blue-500 transition-colors">Ver todas →</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $news = new WP_Query(array('post__not_in' => $hero_ids, 'posts_per_page' => 6));
                if ($news->have_posts()) :
                    while ($news->have_posts()) : $news->the_post();
                ?>
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
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </section>

    <!-- 4. CITA -->
    <section class="py-20 md:py-28 bg-slate-900 dark:bg-[#030810]">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <svg class="w-10 h-10 text-blue-500/40 mx-auto mb-8" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                <blockquote class="text-2xl md:text-4xl font-light text-white leading-relaxed italic mb-8">
                    "Nadie conoce realmente a una nación hasta que no ha estado en sus cárceles."
                </blockquote>
                <div class="w-12 h-0.5 bg-blue-600 mx-auto mb-4"></div>
                <cite class="text-blue-400 font-bold text-sm uppercase tracking-wider not-italic">Nelson Mandela</cite>
            </div>
        </div>
    </section>

    <!-- 5. VIDEO -->
    <section class="py-20 bg-white dark:bg-[#050b18]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-blue-600 text-xs font-bold uppercase tracking-wider">Multimedia</span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 dark:text-white tracking-tight mt-1">Nuestra Voz</h2>
            </div>
            <div class="aspect-video max-w-4xl mx-auto rounded-2xl overflow-hidden shadow-2xl relative group border border-slate-200 dark:border-white/10">
                <img src="https://images.unsplash.com/photo-1485846234645-a62644f84728?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover" alt="Video OVP">
                <div class="absolute inset-0 bg-black/30 group-hover:bg-black/20 transition-colors flex items-center justify-center cursor-pointer">
                    <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center pl-1.5 shadow-2xl shadow-blue-600/30 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- 7. INFORME ANUAL -->
    <?php get_template_part('template-parts/section-informe-anual'); ?>



    

    <!-- 9. ASHOKA -->
    <section class="py-20 bg-white dark:bg-[#050b18]">
        <div class="container mx-auto px-6">
            <div class="bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-3xl p-10 md:p-16 flex flex-col lg:flex-row items-center gap-12">
                <div class="shrink-0">
                    <img src="https://oveprisiones.com/wp-content/uploads/2016/10/ashoka.jpg" class="h-24 md:h-32 rounded-2xl shadow-xl border border-slate-200 dark:border-white/10" alt="Ashoka">
                </div>
                <div class="text-center lg:text-left">
                    <h2 class="text-2xl md:text-3xl font-black text-slate-900 dark:text-white tracking-tight mb-4">Humberto Prado: <span class="text-blue-600">Fellow de Ashoka</span></h2>
                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed">Pertenecemos a la red más importante de emprendedores sociales del mundo, impulsando cambios sistémicos en los derechos humanos.</p>
                </div>
            </div>
        </div>
    </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var slides = document.querySelectorAll('.hero-slide');
    var dots = document.querySelectorAll('.slide-dot');
    var current = 0;
    var total = slides.length;
    if (!total) return;

    function show(i) {
        slides.forEach(function(s) { s.classList.replace('opacity-100', 'opacity-0'); });
        dots.forEach(function(d) { d.classList.remove('bg-blue-500', 'w-8'); d.classList.add('bg-white/40'); });
        slides[i].classList.replace('opacity-0', 'opacity-100');
        if (dots[i]) { dots[i].classList.add('bg-blue-500', 'w-8'); dots[i].classList.remove('bg-white/40'); }
        current = i;
    }

    var nextBtn = document.querySelector('.next-slide');
    var prevBtn = document.querySelector('.prev-slide');
    if (nextBtn) nextBtn.onclick = function() { show((current + 1) % total); };
    if (prevBtn) prevBtn.onclick = function() { show((current - 1 + total) % total); };
    dots.forEach(function(dot) { dot.onclick = function() { show(parseInt(this.dataset.dot)); }; });

    /* Spotlight Effect Logic */
    var spotlightCards = document.querySelectorAll('.spotlight-card');
    spotlightCards.forEach(function(card) {
        card.onmousemove = function(e) {
            var rect = card.getBoundingClientRect();
            var x = e.clientX - rect.left;
            var y = e.clientY - rect.top;
            card.style.setProperty('--x', x + 'px');
            card.style.setProperty('--y', y + 'px');
        };
    });
});
</script>

<?php get_footer(); ?>
