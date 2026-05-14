<?php
/**
 * Template Name: Publicaciones
 * Description: Grid masonry de publicaciones institucionales
 *
 * @package ovp-theme
 */

get_header(); ?>

<main id="primary" class="site-main bg-white dark:bg-[#050b18]">

    <!-- HERO -->
    <section class="relative h-[45vh] md:h-[50vh] bg-slate-900 overflow-hidden flex items-end pb-12">
        <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&q=80&w=2000" class="absolute inset-0 w-full h-full object-cover opacity-25" alt="Publicaciones">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-black/20"></div>
        <div class="absolute bottom-0 left-0 right-0 h-40 bg-gradient-to-t from-slate-50 dark:from-[#070e1e] to-transparent"></div>
        <div class="container mx-auto px-6 relative z-10">
            <span class="inline-block px-4 py-1.5 bg-blue-600/20 border border-blue-500/30 text-blue-400 text-xs font-bold uppercase tracking-wider rounded-full mb-4">Biblioteca</span>
            <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight">Publicaciones</h1>
            <p class="text-white/50 mt-3 text-lg font-light">Informes, investigaciones y material especializado en materia penitenciaria.</p>
        </div>
    </section>

    <!-- MASONRY GRID -->
    <section class="py-20 md:py-28 bg-slate-50 dark:bg-[#070e1e]">
        <div class="container mx-auto px-6">
            <?php
            $pubs = array(
                array(
                    'title' => 'Biblioteca',
                    'desc' => 'Colección de libros especializados en derechos humanos y sistema penitenciario.',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>',
                    'color' => 'blue',
                    'hex' => '59, 130, 246',
                    'span' => 'md:col-span-2 md:row-span-2',
                    'link' => '/biblioteca/',
                ),
                array(
                    'title' => 'Boletín Digital',
                    'desc' => 'Publicación periódica con datos actualizados.',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5"/></svg>',
                    'color' => 'indigo',
                    'hex' => '99, 102, 241',
                    'span' => '',
                    'link' => '/boletin-digital/',
                ),
                array(
                    'title' => 'Informes',
                    'desc' => 'Reportes técnicos sobre la situación carcelaria.',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M18.7 8l-5.1 5.2-2.8-2.7L7 14.3"/></svg>',
                    'color' => 'sky',
                    'hex' => '14, 165, 233',
                    'span' => '',
                    'link' => '/informes/',
                ),
                array(
                    'title' => 'Infografías',
                    'desc' => 'Datos visuales sobre la crisis penitenciaria.',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z"/><path d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z"/></svg>',
                    'color' => 'emerald',
                    'hex' => '16, 185, 129',
                    'span' => '',
                    'link' => '/categoria/infografias/',
                ),
                array(
                    'title' => 'Otros',
                    'desc' => 'Material diverso y publicaciones complementarias.',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 4.5v15m7.5-7.5h-15"/></svg>',
                    'color' => 'slate',
                    'hex' => '100, 116, 139',
                    'span' => '',
                    'link' => '/otros/',
                ),
                array(
                    'title' => 'Informes CIDH',
                    'desc' => 'Documentos presentados ante la Comisión Interamericana de Derechos Humanos.',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5a17.92 17.92 0 01-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"/></svg>',
                    'color' => 'amber',
                    'hex' => '245, 158, 11',
                    'span' => 'md:col-span-2',
                    'link' => '/informes-cidh/',
                ),
                array(
                    'title' => 'Informes Temáticos',
                    'desc' => 'Investigaciones especializadas por temática.',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/><path d="M6 6h.008v.008H6V6z"/></svg>',
                    'color' => 'violet',
                    'hex' => '139, 92, 246',
                    'span' => '',
                    'link' => '/informes-tematicos/',
                ),
                array(
                    'title' => 'Lecturas de Interés',
                    'desc' => 'Material recomendado y artículos relevantes.',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342"/></svg>',
                    'color' => 'rose',
                    'hex' => '244, 63, 94',
                    'span' => '',
                    'link' => '/lecturas-de-interes/',
                ),
            );
            ?>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 auto-rows-[280px]">
                <?php foreach ($pubs as $pub) : ?>
                    <?php 
                        $border_class = "border-{$pub['color']}-500/20 dark:border-{$pub['color']}-500/30";
                        $hover_border = "group-hover:border-{$pub['color']}-500/60";
                        $icon_bg = "bg-{$pub['color']}-500/10 dark:bg-{$pub['color']}-500/20";
                        $text_accent = "text-{$pub['color']}-600 dark:text-{$pub['color']}-400";
                    ?>
                    <a href="<?php echo esc_url($pub['link']); ?>" 
                       class="spotlight-card <?php echo $pub['span']; ?> group relative rounded-[2.5rem] overflow-hidden border <?php echo $border_class; ?> <?php echo $hover_border; ?> bg-white/40 dark:bg-white/5 backdrop-blur-xl hover:shadow-2xl hover:shadow-<?php echo $pub['color']; ?>-500/10 transition-all duration-500">
                        
                        <div class="spotlight-glow absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none" 
                             style="background: radial-gradient(600px circle at var(--x) var(--y), rgba(<?php echo $pub['hex']; ?>, 0.15), transparent 40%);"></div>
                        
                        <div class="relative h-full flex flex-col justify-between p-8 md:p-10 z-10">
                            <!-- Icon at the top -->
                            <div class="w-16 h-16 <?php echo $icon_bg; ?> rounded-2xl flex items-center justify-center <?php echo $text_accent; ?> group-hover:scale-110 transition-all duration-500 shadow-lg shadow-<?php echo $pub['color']; ?>-500/10">
                                <?php echo $pub['icon']; ?>
                            </div>
                            
                            <!-- Text content at the bottom -->
                            <div class="flex flex-col">
                                <h3 class="text-2xl font-black text-slate-800 dark:text-white leading-tight"><?php echo $pub['title']; ?></h3>
                                <p class="text-slate-500 dark:text-slate-400 text-sm mt-2 leading-relaxed font-medium line-clamp-2"><?php echo $pub['desc']; ?></p>
                                <span class="inline-flex items-center gap-1.5 <?php echo $text_accent; ?> text-[10px] font-black mt-6 opacity-70 group-hover:opacity-100 transition-all uppercase tracking-[0.2em]">
                                    Explorar
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
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
