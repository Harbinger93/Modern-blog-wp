<?php
/**
 * Template part for displaying Featured Publications
 */
?>

<section class="py-16 bg-slate-50 dark:bg-[#070e1e]">
    <div class="container mx-auto px-6">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Publicaciones Especializadas</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            <?php
            $pubs = array(
                array('icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>', 'label' => 'Libros'),
                array('icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2"/></svg>', 'label' => 'Revistas'),
                array('icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>', 'label' => 'Guías'),
                array('icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>', 'label' => 'Trifolios'),
                array('icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>', 'label' => 'Otros'),
            );
            foreach ($pubs as $pub) :
            ?>
                <div class="spotlight-card group relative bg-transparent border border-slate-200 dark:border-white/10 rounded-xl px-6 py-5 transition-all duration-500 overflow-hidden cursor-pointer hover:border-blue-500/50 hover:shadow-[0_0_20px_rgba(37,99,235,0.1)]">
                    <div class="spotlight-glow absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none" style="background: radial-gradient(400px circle at var(--x) var(--y), rgba(37, 99, 235, 0.1), transparent 40%);"></div>
                    <div class="relative z-10 flex items-center gap-3">
                        <div class="text-blue-600 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500"><?php echo $pub['icon']; ?></div>
                        <span class="text-sm font-semibold text-slate-700 dark:text-slate-300 group-hover:text-blue-600 transition-colors"><?php echo $pub['label']; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
