<?php
/**
 * The front page template file - CINEMA V5 VERTICAL EDITION
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Hero Slider: Vertical Thumbnails & Fusion -->
    <section class="relative h-screen bg-ovp-darker overflow-hidden">
        <div class="absolute inset-0 z-0">
            <?php
            $hero_query = new WP_Query(array('posts_per_page' => 5, 'post_status' => 'publish'));
            $hero_ids = array();
            if ($hero_query->have_posts()) : $count = 0;
                while ($hero_query->have_posts()) : $hero_query->the_post();
                    $hero_ids[] = get_the_ID();
            ?>
                <div class="hero-slide absolute inset-0 transition-all duration-1000 transform <?php echo $count === 0 ? 'opacity-100 scale-100 visible' : 'opacity-0 scale-105 invisible'; ?>" data-slide="<?php echo $count; ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover opacity-50')); ?>
                    <?php endif; ?>
                    
                    <!-- Cinematic Gradients -->
                    <div class="absolute inset-0 bg-gradient-to-r from-ovp-darker via-ovp-darker/40 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-ovp-darker via-transparent to-transparent"></div>
                    
                    <!-- Fusion Gradient (Bottom) -->
                    <div class="absolute inset-x-0 bottom-0 h-64 bg-gradient-to-t from-ovp-dark via-ovp-dark/80 to-transparent z-20"></div>
                    
                    <div class="container mx-auto px-6 h-full flex flex-col justify-center relative z-10">
                        <div class="max-w-3xl space-y-8 slide-content">
                            <div class="overflow-hidden">
                                <span class="inline-block px-4 py-1 bg-ovp-accent text-white text-[10px] font-black uppercase tracking-[0.3em] rounded-sm transform translate-y-full transition-transform duration-700 delay-100 badge">Reporte Crítico</span>
                            </div>
                            <div class="overflow-hidden">
                                <h2 class="text-6xl md:text-8xl font-black text-white tracking-tighter leading-[0.85] uppercase transform translate-y-full transition-transform duration-700 delay-200 title"><?php the_title(); ?></h2>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-xl text-ovp-slate font-light max-w-xl leading-relaxed transform translate-y-full transition-transform duration-700 delay-300 excerpt"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                            </div>
                            <div class="overflow-hidden">
                                <div class="transform translate-y-full transition-transform duration-700 delay-400 btn-wrap">
                                    <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-4 px-12 py-5 bg-white text-ovp-darker font-black uppercase text-[10px] tracking-[0.3em] rounded-md hover:bg-ovp-accent hover:text-white transition-all shadow-2xl">
                                        Explorar Noticia
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $count++; endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <!-- Vertical Thumbnails Row (Right Side) -->
        <div class="absolute top-1/2 -translate-y-1/2 right-10 z-30 hidden lg:flex flex-col gap-4">
            <?php
            if ($hero_query->have_posts()) : $count = 0;
                while ($hero_query->have_posts()) : $hero_query->the_post();
            ?>
                <div class="hero-card-vertical w-40 h-24 glass-card p-1 cursor-pointer transition-all duration-500 overflow-hidden <?php echo $count === 0 ? 'ring-2 ring-ovp-accent scale-110' : 'opacity-40 hover:opacity-100 hover:scale-105'; ?>" data-go="<?php echo $count; ?>">
                    <div class="w-full h-full rounded-2xl overflow-hidden relative">
                        <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover')); ?>
                        <div class="absolute inset-0 bg-ovp-darker/60 flex items-center justify-center p-2 text-center">
                            <span class="text-[7px] font-black text-white uppercase tracking-tighter line-clamp-2"><?php the_title(); ?></span>
                        </div>
                    </div>
                </div>
            <?php $count++; endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </section>

    <!-- News Grid: Next-Gen Bento -->
    <section class="py-32 relative bg-ovp-dark">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-24">
                <h2 class="text-5xl md:text-8xl font-black text-white tracking-tighter uppercase leading-none">Noticias <span class="text-ovp-accent">OVP</span></h2>
                <a href="#" class="text-[10px] font-black uppercase tracking-widest text-ovp-accent border-b-2 border-ovp-accent pb-2">Ver Histórico</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <?php
                $news = new WP_Query(array('post__not_in' => $hero_ids, 'posts_per_page' => 9));
                if ($news->have_posts()) :
                    while ($news->have_posts()) : $news->the_post();
                ?>
                    <article class="news-card group">
                        <div class="relative h-72 overflow-hidden">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110')); ?>
                            <div class="absolute top-6 left-6">
                                <span class="px-4 py-1.5 bg-ovp-darker/90 backdrop-blur-xl text-white text-[8px] font-black uppercase tracking-widest rounded-full border border-white/10">
                                    <?php echo get_the_date(); ?>
                                </span>
                            </div>
                        </div>
                        <div class="p-10 space-y-5">
                            <h3 class="text-2xl font-black text-white leading-tight uppercase group-hover:text-ovp-accent transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-ovp-slate text-sm font-light leading-relaxed line-clamp-3">
                                <?php echo wp_trim_words(get_the_excerpt(), 22); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="inline-block text-[9px] font-black uppercase tracking-[0.2em] text-white border-b-2 border-ovp-accent/30 hover:border-ovp-accent pb-1 transition-all">Leer Reportaje completo</a>
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
    const cards = document.querySelectorAll('.hero-card-vertical');
    let current = 0;

    function animateIn(slide) {
        const elements = slide.querySelectorAll('.badge, .title, .excerpt, .btn-wrap');
        elements.forEach(el => {
            el.style.transform = 'translateY(100%)';
            setTimeout(() => {
                el.style.transform = 'translateY(0)';
            }, 50);
        });
    }

    function show(index) {
        slides.forEach(s => {
            s.classList.replace('opacity-100', 'opacity-0');
            s.classList.add('scale-105', 'invisible');
            s.classList.remove('scale-100', 'visible');
        });
        cards.forEach(c => {
            c.classList.remove('ring-2', 'ring-ovp-accent', 'scale-110');
            c.classList.add('opacity-40');
        });

        slides[index].classList.replace('opacity-0', 'opacity-100');
        slides[index].classList.remove('scale-105', 'invisible');
        slides[index].classList.add('scale-100', 'visible');
        
        cards[index].classList.add('ring-2', 'ring-ovp-accent', 'scale-110');
        cards[index].classList.remove('opacity-40');
        
        animateIn(slides[index]);
        current = index;
    }

    cards.forEach(card => card.addEventListener('click', () => show(parseInt(card.dataset.go))));
    setInterval(() => show((current + 1) % slides.length), 9000);
    
    // Initial animation
    animateIn(slides[0]);
});
</script>
