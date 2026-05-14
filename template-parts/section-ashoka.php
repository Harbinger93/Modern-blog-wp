<?php
/**
 * Template part for displaying Ashoka Fellow section
 */
?>

<section class="py-24 bg-white dark:bg-[#050b18]">
    <div class="container mx-auto px-6">
        <div class="bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-[3rem] p-12 md:p-20 flex flex-col lg:flex-row items-center gap-12 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
            <div class="shrink-0 relative">
                <!-- Ashoka Logo (Main Large) -->
                <div class="w-40 h-40 md:w-48 md:h-48 rounded-full bg-white flex items-center justify-center p-8 border-8 border-white dark:border-[#0d1b32] shadow-2xl relative z-20 group-hover:scale-105 transition-transform duration-700">
                    <img src="https://oveprisiones.com/wp-content/uploads/2016/10/ashoka.jpg" class="w-full h-auto" alt="Ashoka">
                </div>
                <!-- Humberto Prado Photo (Overlay Small) -->
                <div class="absolute -bottom-4 -right-4 w-24 h-24 rounded-2xl overflow-hidden shadow-xl z-30 border-4 border-white dark:border-[#0d1b32]">
                    <img src="https://oveprisiones.com/wp-content/uploads/2016/12/humbertoprado-745x510.jpg" class="w-full h-full object-cover" alt="Humberto Prado">
                </div>
            </div>
            <div class="text-center lg:text-left relative z-10 flex-1">
                <span class="text-blue-600 text-xs font-black uppercase tracking-[0.3em] mb-4 block">Reconocimiento Global</span>
                <h2 class="text-3xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tighter mb-6 leading-tight">
                    Humberto Prado: <span class="text-blue-600">Fellow de Ashoka</span>
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-lg md:text-xl leading-relaxed font-medium">
                    Pertenecemos a la red más importante de emprendedores sociales del mundo. Como Fellow de Ashoka, Humberto Prado lidera cambios sistémicos para la transformación de los derechos humanos en los sistemas penitenciarios.
                </p>
            </div>
        </div>
    </div>
</section>
