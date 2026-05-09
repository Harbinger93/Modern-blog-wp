<?php
/**
 * The front page template file - CINEMA V3 NEXT-GEN
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Hero Slider: Cinematic V3 -->
    <section class="relative h-screen bg-ovp-darker overflow-hidden border-b border-white/5">
        <div class="absolute inset-0">
            <?php
            $hero_query = new WP_Query(array('posts_per_page' => 5, 'post_status' => 'publish'));
            $hero_ids = array();
            if ($hero_query->have_posts()) : $count = 0;
                while ($hero_query->have_posts()) : $hero_query->the_post();
                    $hero_ids[] = get_the_ID();
            ?>
                <div class="hero-slide absolute inset-0 transition-all duration-1000 transform <?php echo $count === 0 ? 'opacity-100 scale-100 visible' : 'opacity-0 scale-105 invisible'; ?>" data-slide="<?php echo $count; ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover opacity-40 transition-transform duration-[10s]')); ?>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-r from-ovp-darker via-ovp-darker/40 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-ovp-darker via-transparent to-transparent"></div>
                    
                    <div class="container mx-auto px-6 h-full flex flex-col justify-center relative z-10 pt-20">
                        <div class="max-w-4xl space-y-6">
                            <div class="flex items-center gap-3">
                                <span class="px-3 py-1 bg-ovp-accent text-white text-[9px] font-black uppercase tracking-widest rounded-sm">Premium Noticia</span>
                                <span class="text-ovp-slate text-[10px] font-bold uppercase tracking-widest"><?php echo get_the_date(); ?></span>
                            </div>
                            <h2 class="text-6xl md:text-8xl font-black text-white tracking-tighter leading-[0.85] uppercase"><?php the_title(); ?></h2>
                            <p class="text-xl text-ovp-slate font-light max-w-2xl line-clamp-3 leading-relaxed"><?php echo wp_trim_words(get_the_excerpt(), 35); ?></p>
                            <div class="pt-6">
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-3 px-10 py-4 bg-ovp-accent text-white font-black uppercase text-[10px] tracking-widest rounded-md hover:bg-white hover:text-ovp-darker transition-all transform hover:scale-105 shadow-2xl">
                                    <span>Ver Reportaje</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $count++; endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <!-- Mini-Thumbnails Overlay (Fixing Position) -->
        <div class="absolute bottom-16 left-0 right-0 z-30">
            <div class="container mx-auto px-6">
                <div class="flex items-center gap-4 overflow-x-auto pb-6 no-scrollbar">
                    <?php
                    if ($hero_query->have_posts()) : $count = 0;
                        while ($hero_query->have_posts()) : $hero_query->the_post();
                    ?>
                        <div class="hero-card shrink-0 w-52 md:w-64 h-32 md:h-40 glass-card p-1 cursor-pointer transition-all duration-500 <?php echo $count === 0 ? 'ring-2 ring-ovp-accent active scale-105' : 'opacity-70 hover:opacity-100 hover:scale-105'; ?>" data-go="<?php echo $count; ?>">
                            <div class="w-full h-full rounded-2xl overflow-hidden relative">
                                <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover')); ?>
                                <div class="absolute inset-0 bg-gradient-to-t from-ovp-darker/90 to-transparent p-4 flex items-end">
                                    <h4 class="text-[10px] font-black text-white uppercase tracking-tight leading-none line-clamp-2"><?php the_title(); ?></h4>
                                </div>
                            </div>
                        </div>
                    <?php $count++; endwhile; wp_reset_postdata(); endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- News Grid: Next-Gen Bento Style -->
    <section class="py-32 relative">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-20 gap-6">
                <div>
                    <span class="text-ovp-accent text-[10px] font-black uppercase tracking-[0.4em] mb-4 block">Archivo</span>
                    <h2 class="text-5xl md:text-7xl font-black text-slate-900 dark:text-white tracking-tighter uppercase leading-none">Últimas <span class="text-ovp-accent">Denuncias</span></h2>
                </div>
                <a href="#" class="group flex items-center gap-4 text-xs font-black uppercase tracking-widest text-slate-500 hover:text-ovp-accent transition-all">
                    Explorar Biblioteca
                    <div class="w-10 h-10 rounded-full border border-current flex items-center justify-center group-hover:bg-ovp-accent group-hover:border-ovp-accent group-hover:text-white transition-all">
                        &rarr;
                    </div>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php
                $news = new WP_Query(array('post__not_in' => $hero_ids, 'posts_per_page' => 9));
                if ($news->have_posts()) :
                    while ($news->have_posts()) : $news->the_post();
                ?>
                    <article class="group relative overflow-hidden rounded-[2.5rem] bg-white dark:bg-white/5 border border-slate-200 dark:border-white/5 p-6 transition-all duration-700 hover:shadow-2xl hover:shadow-ovp-accent/10">
                        <div class="relative h-64 mb-8 overflow-hidden rounded-[2rem]">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110')); ?>
                            <div class="absolute top-4 left-4">
                                <span class="px-4 py-1.5 bg-ovp-darker/80 backdrop-blur-md text-white text-[8px] font-black uppercase tracking-widest rounded-full border border-white/10">
                                    <?php echo get_the_date(); ?>
                                </span>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <h3 class="text-2xl font-black text-slate-900 dark:text-white leading-[1.1] tracking-tighter uppercase group-hover:text-ovp-accent transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-slate-500 dark:text-ovp-slate text-sm font-light leading-relaxed line-clamp-3">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                            <div class="pt-4 flex items-center justify-between">
                                <a href="<?php the_permalink(); ?>" class="text-[10px] font-black uppercase tracking-widest text-slate-900 dark:text-white border-b-2 border-ovp-accent pb-1">Seguir Leyendo</a>
                                <div class="w-8 h-8 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all">
                                    <svg class="w-4 h-4 text-ovp-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.hero-slide');
    const cards = document.querySelectorAll('.hero-card');
    let current = 0;

    function show(index) {
        slides.forEach(s => {
            s.classList.replace('opacity-100', 'opacity-0');
            s.classList.add('scale-105', 'invisible');
            s.classList.remove('scale-100', 'visible');
        });
        cards.forEach(c => {
            c.classList.remove('ring-2', 'ring-ovp-accent', 'active', 'scale-105');
            c.classList.add('opacity-70');
        });

        slides[index].classList.replace('opacity-0', 'opacity-100');
        slides[index].classList.remove('scale-105', 'invisible');
        slides[index].classList.add('scale-100', 'visible');
        
        cards[index].classList.add('ring-2', 'ring-ovp-accent', 'active', 'scale-105');
        cards[index].classList.remove('opacity-70');
        current = index;
    }

    cards.forEach(card => {
        card.addEventListener('click', () => show(parseInt(card.dataset.go)));
    });

    setInterval(() => show((current + 1) % slides.length), 10000);
});
</script>

<?php get_footer(); ?>
