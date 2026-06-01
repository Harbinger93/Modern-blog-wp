<?php
/**
 * The front page template file
 *
 * @package ovp-theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- 1. HERO SLIDER -->
    <?php get_template_part('template-parts/hero-slider'); ?>

    <!-- 2. NOSOTROS (Banner Institucional 24 Años) -->
    <section class="py-12 md:py-20 bg-white dark:bg-[#050b18]">
        <div class="container mx-auto px-6">
            <div class="relative min-h-[450px] md:min-h-[550px] rounded-[2.5rem] overflow-hidden flex items-center shadow-2xl group border border-slate-200 dark:border-white/10">
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
                            <h2 class="text-4xl md:text-6xl font-black text-white tracking-tighter leading-none">
    24 <span class="text-blue-500">AÑOS</span>
</h2>
                            <div class="h-1.5 w-24 bg-blue-600 rounded-full"></div>
                        </div>
                        
                        <p class="text-xl md:text-3xl font-light text-slate-100 leading-tight md:max-w-2xl">
                            En la defensa y promoción de los derechos humanos de las personas privadas de libertad y acompañando a sus familiares
                        </p>
                    </div>
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
                $news = new WP_Query(array('posts_per_page' => 6));
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

    <!-- 4. CITA & REGLAS MANDELA -->
    <?php get_template_part('template-parts/section-mandela'); ?>

    <!-- 5. VIDEO & POPULAR NEWS -->
    <section class="py-24 bg-white dark:bg-[#050b18]">
        <div class="container mx-auto px-6">
            <div class="mb-10">
                <span class="text-blue-600 text-xs font-bold uppercase tracking-wider">Multimedia</span>
                <h2 class="text-3xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tighter mt-1">Nuestra Voz</h2>
            </div>

            <div class="flex flex-col lg:flex-row gap-16 items-stretch">
                <!-- Video Container (8 columns) -->
                <div class="lg:w-2/3 w-full">
                    <div class="aspect-video rounded-[2.5rem] overflow-hidden shadow-2xl relative group border border-slate-200 dark:border-white/10 bg-black h-full">
                        <iframe 
                            src="https://www.youtube.com/embed/9aGb0PonfR8?si=1rI2b4tqE38dFSTF" 
                            class="absolute inset-0 w-full h-full" 
                            title="OVP Video" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            referrerpolicy="strict-origin-when-cross-origin" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <!-- Video Sidebar (4 columns) -->
                <div class="lg:w-1/3 w-full">
                    <!-- X (Twitter) Feed -->
                    <div class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-[2.5rem] p-6 shadow-sm overflow-hidden flex flex-col h-full">
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-3">
                            <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            Últimos Tweets
                        </h3>
                        
                        <div id="twitter-container" class="w-full flex-1 rounded-2xl overflow-hidden bg-slate-50 dark:bg-slate-900/50">
                            <a class="twitter-timeline" 
                               data-height="100%" 
                               data-chrome="noheader nofooter noborders transparent"
                               data-theme="<?php echo isset($_COOKIE['ovp-theme']) && $_COOKIE['ovp-theme'] === 'light' ? 'light' : 'dark'; ?>"
                               href="https://twitter.com/oveprisiones?ref_src=twsrc%5Etfw">
                               Tweets de @oveprisiones
                            </a>
                        </div>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>

                <script>
                // Dynamic theme update for Twitter widget
                document.addEventListener('DOMContentLoaded', function() {
                    const observer = new MutationObserver((mutations) => {
                        mutations.forEach((mutation) => {
                            if (mutation.attributeName === 'class') {
                                const isDark = document.documentElement.classList.contains('dark');
                                const container = document.getElementById('twitter-container');
                                if (container) {
                                    // Twitter widgets need a full re-render to change theme usually, 
                                    // but setting the attribute and reloading the script or using their API works.
                                    const timeline = container.querySelector('.twitter-timeline');
                                    if (timeline) {
                                        container.innerHTML = `<a class="twitter-timeline" data-height="100%" data-chrome="noheader nofooter noborders transparent" data-theme="${isDark ? 'dark' : 'light'}" href="https://twitter.com/oveprisiones?ref_src=twsrc%5Etfw">Tweets de @oveprisiones</a>`;
                                        twttr.widgets.load(container);
                                    }
                                }
                            }
                        });
                    });
                    observer.observe(document.documentElement, { attributes: true });
                });
                </script>
            </div>
        </div>
    </section>


    <!-- 7. INFORME ANUAL -->
    <?php get_template_part('template-parts/section-informe-anual'); ?>

    <!-- 8. PUBLICACIONES ESPECIALIZADAS -->
    <?php get_template_part('template-parts/featured-publications'); ?>

    <!-- 9. ASHOKA FELLOW -->
    <?php get_template_part('template-parts/section-ashoka'); ?>

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
