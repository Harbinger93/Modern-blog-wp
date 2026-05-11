<?php get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- 1. HERO SLIDER -->
    <section class="relative h-[90vh] bg-slate-900 overflow-hidden">
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

    <!-- 2. NOSOTROS -->
    <section class="py-20 md:py-28 bg-white dark:bg-[#050b18]">
        <div class="container mx-auto px-6">
            <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl p-12 md:p-20 text-center text-white relative overflow-hidden">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDM0djItSDI0di0yaDEyem0wLTRWMjhIMjR2Mmgxem0tMi0ydi0yaC04djJoOHoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-30"></div>
                <div class="relative z-10">
                    <h2 class="text-6xl md:text-8xl font-black tracking-tight mb-4">22 años</h2>
                    <p class="text-xl md:text-2xl font-light text-blue-100 max-w-2xl mx-auto">En la defensa y promoción de los derechos humanos de las personas privadas de libertad en Venezuela</p>
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
                    <article class="group bg-white dark:bg-white/5 rounded-2xl overflow-hidden border border-slate-200 dark:border-white/10 hover:shadow-xl hover:shadow-black/5 dark:hover:shadow-black/20 transition-all duration-300">
                        <div class="aspect-[16/10] overflow-hidden">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500')); ?>
                        </div>
                        <div class="p-6">
                            <time class="text-xs font-medium text-slate-400 dark:text-slate-500 uppercase tracking-wider"><?php echo get_the_date(); ?></time>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white mt-2 leading-snug group-hover:text-blue-600 transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-slate-500 dark:text-slate-400 text-sm mt-3 line-clamp-2"><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
                        </div>
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

    <!-- 6. AREAS DE INTERES -->
    <section class="py-20 bg-slate-50 dark:bg-[#070e1e]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-blue-600 text-xs font-bold uppercase tracking-wider">Áreas</span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 dark:text-white tracking-tight mt-1">Líneas de Acción</h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <?php
                $areas = array(
                    array('icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M18.7 8l-5.1 5.2-2.8-2.7L7 14.3"/></svg>', 'title' => 'Informes Técnicos'),
                    array('icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9-9 9-9-1.8-9-9 1.8-9 9-9z"/><path d="M8 12h8M12 8v8"/></svg>', 'title' => 'Denuncias'),
                    array('icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>', 'title' => 'Multimedia'),
                    array('icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l5.447 2.724A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>', 'title' => 'Mapa de Cárceles'),
                );
                foreach ($areas as $area) :
                ?>
                    <div class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl p-8 text-center hover:border-blue-300 dark:hover:border-blue-500/30 hover:shadow-lg transition-all group cursor-pointer">
                        <div class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-blue-50 dark:bg-blue-600/10 text-blue-600 mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                            <?php echo $area['icon']; ?>
                        </div>
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white"><?php echo $area['title']; ?></h4>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 7. BOLETIN -->
    <section class="py-20 bg-white dark:bg-[#050b18]">
        <div class="container mx-auto px-6">
            <div class="bg-gradient-to-br from-slate-900 to-slate-800 dark:from-[#0a1628] dark:to-[#071020] rounded-3xl p-10 md:p-16 flex flex-col lg:flex-row items-center gap-12 overflow-hidden relative">
                <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl"></div>
                <div class="relative z-10 lg:w-1/2 space-y-6">
                    <h2 class="text-3xl md:text-4xl font-black text-white tracking-tight">Boletín <span class="text-blue-400">Informativo</span></h2>
                    <p class="text-slate-400 leading-relaxed">Recibe alertas, informes y noticias sobre la situación penitenciaria en Venezuela.</p>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <input type="email" placeholder="Tu correo electrónico" class="flex-1 bg-white/10 border border-white/10 rounded-xl px-5 py-3.5 text-white text-sm placeholder-slate-500 outline-none focus:border-blue-500 transition-colors">
                        <button class="px-8 py-3.5 bg-blue-600 text-white text-sm font-bold rounded-xl hover:bg-blue-500 transition-colors shadow-lg shadow-blue-600/25">Suscribirme</button>
                    </div>
                </div>
                <div class="lg:w-1/2 relative z-10">
                    <img src="https://images.unsplash.com/photo-1496065187959-7f07b8353c55?auto=format&fit=crop&q=80&w=800" class="rounded-2xl shadow-2xl border border-white/10" alt="Boletín OVP">
                </div>
            </div>
        </div>
    </section>

    <!-- 8. PUBLICACIONES -->
    <section class="py-16 bg-slate-50 dark:bg-[#070e1e]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Publicaciones Especializadas</h2>
            </div>
            <div class="flex flex-wrap justify-center gap-6">
                <?php
                $pubs = array(
                    array('icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>', 'label' => 'Libros'),
                    array('icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2"/></svg>', 'label' => 'Revistas'),
                    array('icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>', 'label' => 'Guías'),
                    array('icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>', 'label' => 'Trifolios'),
                );
                foreach ($pubs as $pub) :
                ?>
                    <div class="flex items-center gap-3 px-6 py-4 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl hover:border-blue-300 dark:hover:border-blue-500/30 transition-all cursor-pointer">
                        <div class="text-blue-600"><?php echo $pub['icon']; ?></div>
                        <span class="text-sm font-semibold text-slate-700 dark:text-slate-300"><?php echo $pub['label']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 9. ASHOKA -->
    <section class="py-20 bg-white dark:bg-[#050b18]">
        <div class="container mx-auto px-6">
            <div class="bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-3xl p-10 md:p-16 flex flex-col lg:flex-row items-center gap-12">
                <div class="shrink-0">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Ashoka_Logo.svg/2560px-Ashoka_Logo.svg.png" class="h-20 md:h-28 opacity-70 dark:invert dark:opacity-50" alt="Ashoka">
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

    setInterval(function() { show((current + 1) % total); }, 8000);
});
</script>

<?php get_footer(); ?>
