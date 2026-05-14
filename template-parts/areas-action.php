<?php
/**
 * Template part for displaying Areas of Action
 */
?>

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
                <div class="spotlight-card group relative bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl p-8 text-center transition-all duration-500 overflow-hidden cursor-pointer hover:-translate-y-2">
                    <div class="spotlight-glow absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none" style="background: radial-gradient(600px circle at var(--x) var(--y), rgba(37, 99, 235, 0.15), transparent 40%);"></div>
                    <div class="relative z-10">
                        <div class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-blue-50 dark:bg-blue-600/10 text-blue-600 mb-4 group-hover:bg-blue-600 group-hover:text-white group-hover:scale-110 transition-all duration-500">
                            <?php echo $area['icon']; ?>
                        </div>
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white"><?php echo $area['title']; ?></h4>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
