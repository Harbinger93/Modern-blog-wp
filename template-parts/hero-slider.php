<?php
/**
 * Template part for displaying the Hero Slider
 * Reverted to original working version
 */
?>

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
                            <span class="inline-block px-3 py-1 bg-blue-600 text-white text-[11px] font-bold uppercase tracking-wider rounded">Destacado</span>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slide-dot');
    const prevBtn = document.querySelector('.prev-slide');
    const nextBtn = document.querySelector('.next-slide');
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach(s => s.classList.replace('opacity-100', 'opacity-0'));
        dots.forEach(d => d.classList.remove('bg-blue-500', 'w-8'));
        dots.forEach(d => d.classList.add('bg-white/40'));

        slides[index].classList.replace('opacity-0', 'opacity-100');
        dots[index].classList.remove('bg-white/40');
        dots[index].classList.add('bg-blue-500', 'w-8');
        currentSlide = index;
    }

    nextBtn.addEventListener('click', () => {
        let next = (currentSlide + 1) % slides.length;
        showSlide(next);
    });

    prevBtn.addEventListener('click', () => {
        let prev = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(prev);
    });

    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            showSlide(parseInt(dot.dataset.dot));
        });
    });

    setInterval(() => {
        let next = (currentSlide + 1) % slides.length;
        showSlide(next);
    }, 5000);
});
</script>
