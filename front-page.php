<?php
/**
 * The front page template file - CINEMA V2
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Hero Slider: YogaSpot/Netflix Mix -->
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
                        <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover opacity-50 transition-transform duration-[10s]')); ?>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-r from-ovp-darker via-ovp-darker/40 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-ovp-darker via-transparent to-transparent"></div>
                    
                    <div class="container mx-auto px-6 h-full flex flex-col justify-center relative z-10 pb-32">
                        <div class="max-w-3xl space-y-4">
                            <span class="inline-block px-3 py-1 bg-ovp-accent text-white text-[9px] font-black uppercase tracking-widest rounded-sm">Destacado</span>
                            <h2 class="text-5xl md:text-7xl font-black text-white tracking-tighter leading-none"><?php the_title(); ?></h2>
                            <p class="text-lg text-slate-300 font-light max-w-xl line-clamp-2"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                            <a href="<?php the_permalink(); ?>" class="inline-block px-8 py-3 bg-white text-ovp-darker font-black uppercase text-[10px] tracking-widest rounded-md hover:bg-ovp-accent hover:text-white transition-all">Leer Más</a>
                        </div>
                    </div>
                </div>
            <?php $count++; endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <!-- Thumbnails Row (Netflix Style) -->
        <div class="absolute bottom-10 left-0 right-0 z-30">
            <div class="container mx-auto px-6">
                <div class="flex items-center gap-4 overflow-x-auto pb-4 no-scrollbar">
                    <?php
                    if ($hero_query->have_posts()) : $count = 0;
                        while ($hero_query->have_posts()) : $hero_query->the_post();
                    ?>
                        <div class="hero-card <?php echo $count === 0 ? 'active' : ''; ?>" data-go="<?php echo $count; ?>">
                            <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover')); ?>
                            <div class="absolute inset-0 bg-black/40 flex items-end p-3">
                                <span class="text-[8px] font-black text-white uppercase tracking-tighter truncate"><?php the_title(); ?></span>
                            </div>
                        </div>
                    <?php $count++; endwhile; wp_reset_postdata(); endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Secondary News Grid (Excluding Hero Posts) -->
    <section class="py-24 relative z-10">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-16">
                <h2 class="text-4xl font-black text-white tracking-tighter uppercase">Actualidad <span class="text-ovp-accent">Penitenciaria</span></h2>
                <a href="#" class="text-xs font-bold text-ovp-accent uppercase tracking-widest border-b border-ovp-accent">Explorar Todo</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                $news = new WP_Query(array(
                    'post__not_in' => $hero_ids,
                    'posts_per_page' => 8
                ));
                if ($news->have_posts()) :
                    while ($news->have_posts()) : $news->the_post();
                ?>
                    <article class="glass-card group hover:-translate-y-2 transition-all duration-500 overflow-hidden">
                        <div class="aspect-video overflow-hidden">
                            <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-700')); ?>
                        </div>
                        <div class="p-6">
                            <span class="text-ovp-accent text-[8px] font-black uppercase tracking-widest block mb-2"><?php echo get_the_date(); ?></span>
                            <h3 class="text-sm font-black text-white leading-tight mb-4 group-hover:text-ovp-accent transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <a href="<?php the_permalink(); ?>" class="text-[8px] font-black uppercase tracking-widest text-slate-500 hover:text-white transition-colors">Ver Detalles &rarr;</a>
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
        cards.forEach(c => c.classList.remove('active'));

        slides[index].classList.replace('opacity-0', 'opacity-100');
        slides[index].classList.remove('scale-105', 'invisible');
        slides[index].classList.add('scale-100', 'visible');
        cards[index].classList.add('active');
        current = index;
    }

    cards.forEach(card => {
        card.addEventListener('click', () => show(parseInt(card.dataset.go)));
    });

    setInterval(() => show((current + 1) % slides.length), 8000);
});
</script>
