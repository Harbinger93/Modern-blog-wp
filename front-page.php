<?php
/**
 * The front page template file - CINEMA V4 MEGA MENU EDITION
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Hero Slider: Cinematic V4 -->
    <section class="relative h-screen bg-ovp-darker overflow-hidden">
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
                        <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover opacity-40')); ?>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-r from-ovp-darker via-ovp-darker/20 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-ovp-darker via-transparent to-transparent"></div>
                    
                    <div class="container mx-auto px-6 h-full flex flex-col justify-center relative z-10 pt-20">
                        <div class="max-w-4xl space-y-6">
                            <span class="px-3 py-1 bg-ovp-accent text-white text-[9px] font-black uppercase tracking-widest rounded-sm">Reportaje Especial</span>
                            <h2 class="text-6xl md:text-8xl font-black text-white tracking-tighter leading-[0.85] uppercase"><?php the_title(); ?></h2>
                            <p class="text-xl text-ovp-slate font-light max-w-2xl line-clamp-3"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-3 px-10 py-4 bg-ovp-accent text-white font-black uppercase text-[10px] tracking-widest rounded-md hover:bg-white hover:text-ovp-darker transition-all shadow-2xl">
                                <span>Ver Ahora</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php $count++; endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <!-- Hero Thumbnails Row -->
        <div class="absolute bottom-12 left-0 right-0 z-30">
            <div class="container mx-auto px-6">
                <div class="flex items-center gap-4 overflow-x-auto pb-4 no-scrollbar">
                    <?php
                    if ($hero_query->have_posts()) : $count = 0;
                        while ($hero_query->have_posts()) : $hero_query->the_post();
                    ?>
                        <div class="hero-card shrink-0 w-52 md:w-64 h-32 md:h-36 glass-card p-1 cursor-pointer transition-all duration-500 <?php echo $count === 0 ? 'ring-2 ring-ovp-accent active scale-105' : 'opacity-60 hover:opacity-100 hover:scale-105'; ?>" data-go="<?php echo $count; ?>">
                            <div class="w-full h-full rounded-[1.5rem] overflow-hidden relative">
                                <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover')); ?>
                                <div class="absolute inset-0 bg-gradient-to-t from-ovp-darker/90 p-4 flex items-end">
                                    <h4 class="text-[9px] font-black text-white uppercase truncate"><?php the_title(); ?></h4>
                                </div>
                            </div>
                        </div>
                    <?php $count++; endwhile; wp_reset_postdata(); endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- News Grid: Next-Gen Bento -->
    <section class="py-32 relative">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-20">
                <h2 class="text-5xl md:text-7xl font-black text-white tracking-tighter uppercase leading-none">Noticias <span class="text-ovp-accent">Recientes</span></h2>
                <a href="#" class="text-[10px] font-black uppercase tracking-widest text-ovp-accent border-b-2 border-ovp-accent pb-1">Ver Todo el Archivo</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php
                $news = new WP_Query(array('post__not_in' => $hero_ids, 'posts_per_page' => 9));
                if ($news->have_posts()) :
                    while ($news->have_posts()) : $news->the_post();
                ?>
                    <article class="news-card group">
                        <div class="relative h-64 overflow-hidden">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110')); ?>
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 bg-ovp-darker/80 backdrop-blur-md text-white text-[8px] font-black uppercase tracking-widest rounded-full border border-white/5">
                                    <?php echo get_the_date(); ?>
                                </span>
                            </div>
                        </div>
                        <div class="p-8 space-y-4">
                            <h3 class="text-xl font-black text-white leading-tight uppercase group-hover:text-ovp-accent transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-ovp-slate text-sm font-light line-clamp-3">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="inline-block text-[9px] font-black uppercase tracking-widest text-white border-b border-ovp-accent pb-1">Seguir Leyendo &rarr;</a>
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
        slides.forEach(s => s.classList.replace('opacity-100', 'opacity-0'));
        slides.forEach(s => { s.classList.add('invisible'); s.classList.remove('visible'); });
        cards.forEach(c => { c.classList.remove('ring-2', 'ring-ovp-accent', 'active', 'scale-105'); c.classList.add('opacity-60'); });

        slides[index].classList.replace('opacity-0', 'opacity-100');
        slides[index].classList.replace('invisible', 'visible');
        cards[index].classList.add('ring-2', 'ring-ovp-accent', 'active', 'scale-105');
        cards[index].classList.remove('opacity-60');
        current = index;
    }

    cards.forEach(card => card.addEventListener('click', () => show(parseInt(card.dataset.go))));
    setInterval(() => show((current + 1) % slides.length), 8000);
});
</script>

<?php get_footer(); ?>
