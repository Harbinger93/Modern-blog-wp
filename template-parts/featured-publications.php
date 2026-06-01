<?php
/**
 * Template part for displaying Featured Publications
 * Each button links to the Biblioteca page filtered by the corresponding category.
 */

// Get the Biblioteca page URL (page with template 'page-biblioteca.php')
$biblioteca_url = '';
$biblioteca_pages = get_pages(array('meta_key' => '_wp_page_template', 'meta_value' => 'page-biblioteca.php'));
if (!empty($biblioteca_pages)) {
    $biblioteca_url = get_permalink($biblioteca_pages[0]->ID);
} else {
    // Fallback: try common slug
    $biblioteca_page = get_page_by_path('biblioteca');
    if ($biblioteca_page) {
        $biblioteca_url = get_permalink($biblioteca_page->ID);
    } else {
        $biblioteca_url = home_url('/biblioteca');
    }
}
?>

<section class="py-16 bg-slate-50 dark:bg-[#070e1e]">
    <div class="container mx-auto px-6">
        <div class="text-center mb-10">
            <span class="text-blue-600 text-xs font-bold uppercase tracking-wider">Documentación</span>
            <h2 class="text-2xl md:text-3xl font-black text-slate-900 dark:text-white tracking-tight mt-1">Publicaciones Especializadas</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-2 max-w-xl mx-auto">Accede a nuestro acervo documental organizado por tipo de publicación</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <?php
            $pubs = array(
                array(
                    'tipo'  => 'informe',
                    'icon'  => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>',
                    'label' => 'Informes',
                    'color' => 'text-emerald-600 dark:text-emerald-400',
                    'bg'    => 'hover:border-emerald-500/50 hover:shadow-[0_0_20px_rgba(16,185,129,0.12)]',
                ),
                array(
                    'tipo'  => 'infografia',
                    'icon'  => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/><path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/></svg>',
                    'label' => 'Infografías',
                    'color' => 'text-amber-600 dark:text-amber-400',
                    'bg'    => 'hover:border-amber-500/50 hover:shadow-[0_0_20px_rgba(245,158,11,0.12)]',
                ),
                array(
                    'tipo'  => 'boletin',
                    'icon'  => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2"/></svg>',
                    'label' => 'Boletines',
                    'color' => 'text-rose-600 dark:text-rose-400',
                    'bg'    => 'hover:border-rose-500/50 hover:shadow-[0_0_20px_rgba(244,63,94,0.12)]',
                ),
                array(
                    'tipo'  => 'folleto-guia',
                    'icon'  => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>',
                    'label' => 'Folletos y Guías',
                    'color' => 'text-sky-600 dark:text-sky-400',
                    'bg'    => 'hover:border-sky-500/50 hover:shadow-[0_0_20px_rgba(14,165,233,0.12)]',
                ),
                array(
                    'tipo'  => 'libro',
                    'icon'  => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>',
                    'label' => 'Libros',
                    'color' => 'text-violet-600 dark:text-violet-400',
                    'bg'    => 'hover:border-violet-500/50 hover:shadow-[0_0_20px_rgba(139,92,246,0.12)]',
                ),
                array(
                    'tipo'  => 'lectura',
                    'icon'  => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
                    'label' => 'Lecturas de Interés',
                    'color' => 'text-indigo-600 dark:text-indigo-400',
                    'bg'    => 'hover:border-indigo-500/50 hover:shadow-[0_0_20px_rgba(99,102,241,0.12)]',
                ),
            );
            foreach ($pubs as $pub) :
                $link = esc_url(add_query_arg('tipo', $pub['tipo'], $biblioteca_url));
            ?>
                <a href="<?php echo $link; ?>"
                   class="spotlight-card group relative bg-transparent border border-slate-200 dark:border-white/10 rounded-xl px-4 py-5 transition-all duration-500 overflow-hidden cursor-pointer <?php echo $pub['bg']; ?> hover:-translate-y-1 flex flex-col items-center text-center gap-3">
                    <div class="spotlight-glow absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none" style="background: radial-gradient(400px circle at var(--x) var(--y), rgba(37, 99, 235, 0.08), transparent 40%);"></div>
                    <div class="relative z-10 <?php echo $pub['color']; ?> group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        <?php echo $pub['icon']; ?>
                    </div>
                    <span class="relative z-10 text-xs font-semibold text-slate-700 dark:text-slate-300 group-hover:<?php echo explode(' ', $pub['color'])[0]; ?> transition-colors leading-tight">
                        <?php echo $pub['label']; ?>
                    </span>
                    <span class="relative z-10 inline-flex items-center gap-1 text-[10px] font-bold uppercase tracking-widest <?php echo $pub['color']; ?> opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        Ver todos
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-8">
            <a href="<?php echo esc_url($biblioteca_url); ?>"
               class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-blue-600/20 hover:shadow-blue-500/30 hover:-translate-y-0.5">
                Ver Biblioteca Completa
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>
