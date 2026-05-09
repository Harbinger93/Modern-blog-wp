<?php
/**
 * Template Name: Nosotros - Deep Blue Edition
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main">

    <!-- Page Header -->
    <section class="relative pt-48 pb-24 overflow-hidden">
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-6xl md:text-8xl font-black text-white tracking-tighter mb-8 animate-slideUp">Institución</h1>
            <p class="text-xl text-ovp-slate font-light max-w-2xl mx-auto leading-relaxed animate-fadeIn delay-300">
                Observatorio Venezolano de Prisiones: Vigilancia técnica, objetiva e imparcial del sistema penitenciario desde hace más de dos décadas.
            </p>
        </div>
    </section>

    <!-- Core Purpose -->
    <section class="py-24 border-y border-white/5 bg-ovp-darker/30">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
                <div class="relative group">
                    <div class="glass-card p-4 -rotate-3 group-hover:rotate-0 transition-all duration-700">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=1000" class="rounded-2xl grayscale group-hover:grayscale-0 transition-all" alt="Misión">
                    </div>
                </div>
                <div>
                    <span class="text-ovp-accent text-[10px] font-black uppercase tracking-[0.4em] mb-6 block">Nuestra Misión</span>
                    <h2 class="text-4xl md:text-5xl font-black text-white tracking-tighter mb-8 leading-tight">
                        Transformando el monitoreo en justicia tangible.
                    </h2>
                    <p class="text-lg text-ovp-slate font-light leading-relaxed mb-10">
                        Nuestra labor trasciende la simple documentación. Somos una organización dedicada a incidir en las políticas públicas y en la defensa activa de los derechos fundamentales de las personas privadas de libertad ante tribunales nacionales y organismos internacionales.
                    </p>
                    <div class="grid grid-cols-2 gap-10">
                        <div>
                            <span class="block text-4xl font-black text-white">20+</span>
                            <span class="text-[9px] font-black uppercase tracking-widest text-slate-500">Años de Lucha</span>
                        </div>
                        <div>
                            <span class="block text-4xl font-black text-white">OEA</span>
                            <span class="text-[9px] font-black uppercase tracking-widest text-slate-500">Aliado Técnico</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
