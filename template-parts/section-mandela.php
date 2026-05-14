<?php
/**
 * Template part for displaying Mandela Quote and Rules
 */
?>

<section class="py-24 bg-slate-900 dark:bg-[#030810] relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
        <img src="https://oveprisiones.com/wp-content/uploads/2016/10/mandela1.png" class="h-full w-auto object-cover grayscale" alt="Mandela BG">
    </div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <!-- Mandela Quote -->
            <div class="lg:w-2/3 text-center lg:text-left">
                <div class="flex flex-col lg:flex-row items-center lg:items-start gap-8">
                    <img src="https://oveprisiones.com/wp-content/uploads/2016/10/mandela1.png" class="w-32 h-32 rounded-full border-4 border-blue-600/30 object-cover shadow-2xl" alt="Nelson Mandela">
                    <div>
                        <svg class="w-10 h-10 text-blue-500/40 mb-6 mx-auto lg:mx-0" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                        <blockquote class="text-2xl md:text-3xl font-light text-white leading-relaxed italic mb-8">
                            "Nadie conoce realmente a una nación hasta que no ha estado en sus cárceles. Una nación no debe juzgarse por cómo trata a sus ciudadanos con mejor posición, sino por cómo trata a los que tienen poco o nada."
                        </blockquote>
                        <div class="w-12 h-0.5 bg-blue-600 mb-4 mx-auto lg:mx-0"></div>
                        <cite class="text-blue-400 font-bold text-sm uppercase tracking-wider not-italic">Nelson Mandela</cite>
                    </div>
                </div>
            </div>

            <!-- Reglas Mandela CTA -->
            <div class="lg:w-1/3 w-full">
                <div class="bg-white/5 backdrop-blur-md border border-white/10 p-8 rounded-[2.5rem] text-center group cursor-pointer hover:bg-white/10 transition-all duration-500" onclick="document.getElementById('modal-mandela').classList.remove('hidden', 'opacity-0')">
                    <div class="relative mb-6 inline-block">
                        <img src="https://oveprisiones.com/wp-content/uploads/2016/11/Reglas-Mandela200x300.png" class="h-64 w-auto rounded-xl shadow-2xl group-hover:scale-105 transition-transform duration-500" alt="Reglas Mandela">
                        <div class="absolute inset-0 bg-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity rounded-xl flex items-center justify-center">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-black text-white mb-2">Reglas Mandela</h3>
                    <p class="text-slate-400 text-sm mb-6">Reglas Mínimas de las Naciones Unidas para el Tratamiento de los Reclusos.</p>
                    <span class="inline-flex items-center gap-2 text-blue-400 font-bold text-xs uppercase tracking-widest">Ver Documento →</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reglas Mandela Modal -->
<div id="modal-mandela" class="fixed inset-0 z-[200] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/90 backdrop-blur-sm" onclick="this.parentElement.classList.add('hidden', 'opacity-0')"></div>
    <div class="relative bg-white dark:bg-[#0d1b32] w-full max-w-4xl h-[80vh] rounded-3xl overflow-hidden shadow-2xl flex flex-col">
        <div class="flex justify-between items-center p-6 border-b border-slate-100 dark:border-white/5">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white">Reglas Mandela (PDF)</h3>
            <button class="p-2 hover:bg-slate-100 dark:hover:bg-white/10 rounded-xl transition-colors" onclick="this.closest('#modal-mandela').classList.add('hidden', 'opacity-0')">
                <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="flex-1 bg-slate-100 dark:bg-black/20">
            <iframe src="https://www.unodc.org/documents/justice-and-prison-reform/Nelson_Mandela_Rules-S-ebook.pdf" class="w-full h-full border-0"></iframe>
        </div>
    </div>
</div>
