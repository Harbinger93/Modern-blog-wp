<?php
/**
 * Template Name: Multimedia
 * Description: Plantilla para contenido multimedia (videos, audios, podcasts)
 *
 * @package ovp-theme
 */

get_header(); ?>

<main id="primary" class="site-main bg-white dark:bg-[#050b18]">

    <!-- HERO -->
    <section class="relative h-[45vh] md:h-[50vh] bg-slate-900 overflow-hidden flex items-end pb-12">
        <img src="https://images.unsplash.com/photo-1478737270239-2f02b77fc618?auto=format&fit=crop&q=80&w=2000"
            class="absolute inset-0 w-full h-full object-cover opacity-25" alt="Multimedia">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-black/20"></div>
        <div
            class="absolute bottom-0 left-0 right-0 h-40 bg-gradient-to-t from-white dark:from-[#050b18] to-transparent">
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <span
                class="inline-block px-4 py-1.5 bg-blue-600/20 border border-blue-500/30 text-blue-400 text-xs font-bold uppercase tracking-wider rounded-full mb-4">Centro
                Multimedia</span>
            <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight">Multimedia</h1>
            <p class="text-white/50 mt-3 text-lg font-light">Videos, cápsulas informativas, podcasts y galerías
                fotográficas.</p>
        </div>
    </section>

    <!-- CATEGORY FILTER TABS -->
    <section class="bg-white dark:bg-[#050b18] border-b border-slate-200 dark:border-white/10 sticky top-[72px] z-50">
        <div class="container mx-auto px-6">
            <div class="flex gap-1 overflow-x-auto py-4 no-scrollbar" id="media-tabs">
                <button data-filter="all"
                    class="media-tab px-5 py-2.5 rounded-xl text-sm font-semibold bg-blue-600 text-white shrink-0 transition-all">Todo</button>
                <button data-filter="video"
                    class="media-tab px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-white/5 hover:bg-blue-50 dark:hover:bg-blue-600/10 shrink-0 transition-all">Videos</button>
                <button data-filter="capsulas"
                    class="media-tab px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-white/5 hover:bg-blue-50 dark:hover:bg-blue-600/10 shrink-0 transition-all">Cápsulas</button>
                <button data-filter="podcast"
                    class="media-tab px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-white/5 hover:bg-blue-50 dark:hover:bg-blue-600/10 shrink-0 transition-all">Podcast</button>
                <button data-filter="radio"
                    class="media-tab px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-white/5 hover:bg-blue-50 dark:hover:bg-blue-600/10 shrink-0 transition-all">Radio</button>
                <button data-filter="fotos"
                    class="media-tab px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-white/5 hover:bg-blue-50 dark:hover:bg-blue-600/10 shrink-0 transition-all">Fotos</button>
            </div>
        </div>
    </section>

    <!-- FEATURED MEDIA (Hero card) -->
    <section id="featured-media" class="py-16 bg-white dark:bg-[#050b18]">
        <div class="container mx-auto px-6">
            <?php
            $featured = new WP_Query(array('posts_per_page' => 1, 'category_name' => 'multimedia'));
            if ($featured->have_posts()):
                $featured->the_post();
                ?>
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-stretch">
                    <div class="lg:col-span-3 relative rounded-2xl overflow-hidden group cursor-pointer border border-slate-200 dark:border-white/10"
                        data-type="video">
                        <div class="aspect-video">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-700')); ?>
                            <?php else: ?>
                                <div class="w-full h-full bg-gradient-to-br from-blue-800 to-indigo-900"></div>
                            <?php endif; ?>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-black/20"></div>
                        <div
                            class="absolute bottom-0 left-0 right-0 h-40 bg-gradient-to-t from-white dark:from-[#050b18] to-transparent">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="w-20 h-20 bg-blue-600/90 backdrop-blur rounded-full flex items-center justify-center pl-1.5 shadow-2xl shadow-blue-600/30 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8 z-10">
                            <span
                                class="inline-block px-3 py-1 bg-blue-600 text-white text-[10px] font-bold uppercase tracking-wider rounded mb-3">Destacado</span>
                            <h2 class="text-2xl md:text-3xl font-bold text-white leading-tight"><?php the_title(); ?></h2>
                            <time class="text-white/50 text-sm mt-2 block"><?php echo get_the_date(); ?></time>
                        </div>
                    </div>
                    <div class="lg:col-span-2 flex flex-col gap-4">
                        <?php wp_reset_postdata();
                        $sidebar = new WP_Query(array('posts_per_page' => 3, 'offset' => 1, 'category_name' => 'multimedia'));
                        if ($sidebar->have_posts()):
                            while ($sidebar->have_posts()):
                                $sidebar->the_post();
                                ?>
                                <a href="<?php the_permalink(); ?>"
                                    class="flex gap-4 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl p-4 hover:border-blue-300 dark:hover:border-blue-500/30 hover:shadow-lg transition-all group flex-1"
                                    data-type="video">
                                    <div class="w-28 h-20 rounded-lg overflow-hidden shrink-0 relative">
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail('thumbnail', array('class' => 'w-full h-full object-cover')); ?>
                                        <?php else: ?>
                                            <div class="w-full h-full bg-gradient-to-br from-blue-700 to-blue-900"></div>
                                        <?php endif; ?>
                                        <div class="absolute inset-0 flex items-center justify-center bg-black/20">
                                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1 flex flex-col justify-center min-w-0">
                                        <h4
                                            class="text-sm font-bold text-slate-900 dark:text-white leading-snug line-clamp-2 group-hover:text-blue-600 transition-colors">
                                            <?php the_title(); ?></h4>
                                        <time class="text-xs text-slate-400 mt-1"><?php echo get_the_date(); ?></time>
                                    </div>
                                </a>
                            <?php endwhile;
                            wp_reset_postdata(); endif; ?>
                    </div>
                </div>
            <?php else:
                wp_reset_postdata(); endif; ?>
        </div>
    </section>

    <!-- MEDIA GRID -->
    <section class="py-16 bg-slate-50 dark:bg-[#070e1e]">
        <div class="container mx-auto px-6">
            <h2 id="media-grid-title" class="text-2xl font-black text-slate-900 dark:text-white tracking-tight mb-10">
                Todo el Contenido</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="media-grid">
                <?php
                $media_types = array(
                    array('type' => 'video', 'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>', 'label' => 'Video', 'color' => 'bg-red-600'),
                    array('type' => 'podcast', 'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"/></svg>', 'label' => 'Podcast', 'color' => 'bg-purple-600'),
                    array('type' => 'capsulas', 'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>', 'label' => 'Cápsula', 'color' => 'bg-amber-600'),
                    array('type' => 'radio', 'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>', 'label' => 'Radio', 'color' => 'bg-emerald-600'),
                    array('type' => 'fotos', 'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>', 'label' => 'Fotos', 'color' => 'bg-sky-600'),
                    array('type' => 'video', 'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>', 'label' => 'Video', 'color' => 'bg-red-600'),
                );

                $all_media = new WP_Query(array('posts_per_page' => 12, 'category_name' => 'multimedia'));
                $mi = 0;
                if ($all_media->have_posts()):
                    while ($all_media->have_posts()):
                        $all_media->the_post();
                        $mt = $media_types[$mi % count($media_types)];
                        ?>
                        <article
                            class="media-item group bg-white dark:bg-white/5 rounded-2xl overflow-hidden border border-slate-200 dark:border-white/10 hover:shadow-xl transition-all"
                            data-type="<?php echo $mt['type']; ?>">
                            <a href="<?php the_permalink(); ?>" class="block">
                                <div class="aspect-video relative overflow-hidden">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500')); ?>
                                    <?php else: ?>
                                        <div class="w-full h-full bg-gradient-to-br from-slate-700 to-slate-900"></div>
                                    <?php endif; ?>
                                    <div
                                        class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors flex items-center justify-center">
                                        <div
                                            class="w-14 h-14 <?php echo $mt['color']; ?> rounded-full flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform">
                                            <?php echo $mt['icon']; ?>
                                        </div>
                                    </div>
                                    <span
                                        class="absolute top-3 left-3 px-2.5 py-1 <?php echo $mt['color']; ?> text-white text-[10px] font-bold uppercase tracking-wider rounded-lg"><?php echo $mt['label']; ?></span>
                                </div>
                                <div class="p-5">
                                    <h3
                                        class="font-bold text-slate-900 dark:text-white leading-snug group-hover:text-blue-600 transition-colors line-clamp-2">
                                        <?php the_title(); ?></h3>
                                    <div class="flex items-center gap-3 mt-3">
                                        <time class="text-xs text-slate-400"><?php echo get_the_date(); ?></time>
                                        <span class="w-1 h-1 bg-slate-300 dark:bg-slate-600 rounded-full"></span>
                                        <span class="text-xs text-slate-400"><?php echo $mt['label']; ?></span>
                                    </div>
                                </div>
                            </a>
                        </article>
                        <?php $mi++; endwhile;
                    wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tabs = document.querySelectorAll('.media-tab');
        var items = document.querySelectorAll('.media-item');
        var featured = document.getElementById('featured-media');
        var gridTitle = document.getElementById('media-grid-title');

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                var filter = this.dataset.filter;
                var label = this.innerText;

                /* Style tabs */
                tabs.forEach(function (t) {
                    t.className = 'media-tab px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-white/5 hover:bg-blue-50 dark:hover:bg-blue-600/10 shrink-0 transition-all';
                });
                this.className = 'media-tab px-5 py-2.5 rounded-xl text-sm font-semibold bg-blue-600 text-white shrink-0 transition-all';

                /* Filter items */
                items.forEach(function (item) {
                    if (filter === 'all' || item.dataset.type === filter) {
                        item.style.display = '';
                        item.style.animation = 'fadeIn 0.4s ease';
                    } else {
                        item.style.display = 'none';
                    }
                });

                /* Handle Featured Visibility and Title */
                if (filter === 'all') {
                    featured.style.display = '';
                    gridTitle.innerText = 'Todo el Contenido';
                } else {
                    featured.style.display = 'none';
                    gridTitle.innerText = 'Resultados para: ' + label;
                }

                /* Smooth scroll to grid if filter active */
                if (filter !== 'all') {
                    gridTitle.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    });
</script>
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<?php get_footer(); ?>