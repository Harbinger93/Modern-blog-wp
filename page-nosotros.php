<?php
/**
 * Template Name: Nosotros
 * Description: Plantilla institucional para la página "Quiénes Somos"
 *
 * @package ovp-theme
 */

get_header(); ?>

<main id="primary" class="site-main bg-white dark:bg-[#050b18]">

    <!-- HERO BANNER -->
    <section class="relative h-[60vh] md:h-[70vh] bg-slate-900 overflow-hidden flex items-center">
        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&q=80&w=2000"
            class="absolute inset-0 w-full h-full object-cover opacity-30" alt="Derechos Humanos">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-black/20"></div>
        <div
            class="absolute bottom-0 left-0 right-0 h-40 bg-gradient-to-t from-white dark:from-[#050b18] to-transparent">
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-3xl">
                <span
                    class="inline-block px-4 py-1.5 bg-blue-600/20 border border-blue-500/30 text-blue-400 text-xs font-bold uppercase tracking-wider rounded-full mb-6">Sobre
                    Nosotros</span>
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white tracking-tight leading-[0.95] mb-6">
                    Observatorio Venezolano de Prisiones</h1>
                <p class="text-lg md:text-xl text-white/60 font-light leading-relaxed max-w-2xl">Defendiendo los
                    derechos humanos de las personas privadas de libertad desde 2002.</p>
            </div>
        </div>
    </section>

    <!-- QUIÉNES SOMOS / NUESTRA HISTORIA -->
    <section class="py-20 md:py-28 bg-white dark:bg-[#050b18]">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="text-blue-600 text-xs font-bold uppercase tracking-wider">Nuestra Historia</span>
                    <h2 class="text-3xl md:text-4xl font-black text-slate-900 dark:text-white tracking-tight mt-2 mb-6">
                        24 años velando por la dignidad humana</h2>
                    <div class="space-y-5 text-slate-600 dark:text-slate-400 leading-relaxed">
                        <p>El Observatorio Venezolano de Prisiones es una organización no gubernamental, fundada en el
                            año 2002, que tiene como principal atribución velar por el debido respeto de los derechos
                            humanos de las personas privadas de su libertad en el territorio nacional.</p>
                        <p>Nuestro equipo está integrado por diversos profesionales: Politólogos, Criminólogos,
                            Sociólogos, Arquitectos y Penitenciaristas, todos comprometidos con la construcción de un
                            sistema penitenciario que respete la dignidad humana.</p>
                    </div>
                </div>
                <div class="relative group">
                    <!-- Main Image (Humberto Prado) -->
                    <div
                        class="aspect-[4/3] rounded-[2.5rem] overflow-hidden border border-slate-200 dark:border-white/10 shadow-2xl transition-transform duration-500 group-hover:scale-[1.02]">
                        <img src="https://oveprisiones.com/wp-content/uploads/2016/12/humbertoprado-745x510.jpg"
                            class="w-full h-full object-cover" alt="Abg. Humberto Prado">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity">
                        </div>
                    </div>

                    <!-- Overlaid Director Card -->
                    <div
                        class="absolute -bottom-8 -right-4 md:-right-8 bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 rounded-3xl p-6 md:p-8 shadow-2xl max-w-[280px] md:max-w-[320px] backdrop-blur-xl">
                        <div class="flex items-center gap-4 mb-4">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center text-white font-black shrink-0">
                                HP</div>
                            <div>
                                <h3 class="font-black text-slate-900 dark:text-white text-base leading-tight">Abg.
                                    Humberto Prado</h3>
                                <p
                                    class="text-blue-600 dark:text-blue-400 text-[10px] font-bold uppercase tracking-widest mt-1">
                                    Director General</p>
                            </div>
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 text-xs leading-relaxed">Abogado penalista,
                            defensor de DDHH y Fellow de Ashoka. Más de dos décadas liderando la lucha por la dignidad
                            penitenciaria.</p>
                    </div>

                    <!-- Years Badge -->
                    <div
                        class="absolute -top-6 -left-6 bg-blue-600 text-white rounded-2xl p-5 shadow-xl shadow-blue-600/20 hidden md:block z-10">
                        <span class="text-3xl font-black block">+22</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-blue-100">Años de
                            servicio</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PILARES INSTITUCIONALES — Interactive Orbital Section -->
    <section class="py-20 md:py-28 bg-slate-50 dark:bg-[#070e1e] overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="text-center mb-14">
                <span class="text-blue-600 text-xs font-bold uppercase tracking-wider">Lo que nos define</span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 dark:text-white tracking-tight mt-2">Pilares
                    Institucionales</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center max-w-6xl mx-auto">
                <!-- Left: Interactive Orbital Ring -->
                <div class="relative flex items-center justify-center" style="min-height: 420px;">
                    <div class="absolute w-[340px] h-[340px] md:w-[400px] md:h-[400px] rounded-full border border-dashed border-slate-300 dark:border-white/10"
                        style="animation: spin-slow 40s linear infinite;"></div>
                    <div class="absolute w-[340px] h-[340px] md:w-[400px] md:h-[400px]"
                        style="animation: spin-slow 40s linear infinite;">
                        <button data-pillar="0"
                            class="pillar-orbit-btn absolute -top-5 left-1/2 -translate-x-1/2 w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center shadow-lg shadow-blue-600/30 hover:scale-110 transition-transform z-10"
                            style="animation: counter-spin 40s linear infinite;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                        </button>
                        <button data-pillar="1"
                            class="pillar-orbit-btn absolute top-1/2 -right-5 -translate-y-1/2 w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center shadow-lg shadow-blue-600/30 hover:scale-110 transition-transform z-10"
                            style="animation: counter-spin 40s linear infinite;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                        <button data-pillar="2"
                            class="pillar-orbit-btn absolute -bottom-5 left-1/2 -translate-x-1/2 w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center shadow-lg shadow-blue-600/30 hover:scale-110 transition-transform z-10"
                            style="animation: counter-spin 40s linear infinite;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </button>
                        <button data-pillar="3"
                            class="pillar-orbit-btn absolute top-1/2 -left-5 -translate-y-1/2 w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center shadow-lg shadow-blue-600/30 hover:scale-110 transition-transform z-10"
                            style="animation: counter-spin 40s linear infinite;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                            </svg>
                        </button>
                    </div>
                    <div
                        class="relative w-[240px] h-[240px] md:w-[280px] md:h-[280px] bg-white dark:bg-white/5 rounded-full flex flex-col items-center justify-center text-center p-8 border border-slate-200 dark:border-white/10 shadow-2xl shadow-black/5 dark:shadow-black/30 z-20">
                        <h3 id="pillar-title"
                            class="text-2xl md:text-3xl font-black text-slate-900 dark:text-white mb-3 transition-all">
                            Misión</h3>
                        <p id="pillar-text"
                            class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed transition-all">Promover y
                            vigilar que los Derechos Humanos de las personas privadas de su libertad sean garantizados
                            por el Estado.</p>
                    </div>
                </div>

                <!-- Right: Tab Buttons -->
                <div class="space-y-4">
                    <button data-pillar="0"
                        class="pillar-tab w-full text-left bg-blue-600 text-white rounded-2xl p-6 transition-all duration-300 shadow-lg shadow-blue-600/20">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center shrink-0"><svg
                                    class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg></div>
                            <div>
                                <h4 class="font-bold text-base">Misión</h4>
                                <p class="text-sm opacity-80 mt-0.5 leading-snug">Promover y vigilar que los Derechos
                                    Humanos de las personas privadas de su libertad sean garantizados por el Estado.</p>
                            </div>
                        </div>
                    </button>
                    <button data-pillar="1"
                        class="pillar-tab w-full text-left bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-900 dark:text-white rounded-2xl p-6 transition-all duration-300 hover:border-blue-300 dark:hover:border-blue-500/30">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 bg-blue-50 dark:bg-blue-600/10 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg></div>
                            <div>
                                <h4 class="font-bold text-base">Visión</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400 mt-0.5 leading-snug">Ser la
                                    institución referencial para el cumplimiento de los Derechos Humanos en el ámbito
                                    penitenciario venezolano.</p>
                            </div>
                        </div>
                    </button>
                    <button data-pillar="2"
                        class="pillar-tab w-full text-left bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-900 dark:text-white rounded-2xl p-6 transition-all duration-300 hover:border-blue-300 dark:hover:border-blue-500/30">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 bg-blue-50 dark:bg-blue-600/10 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg></div>
                            <div>
                                <h4 class="font-bold text-base">Valores</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400 mt-0.5 leading-snug">Autenticidad,
                                    compromiso, confidencialidad, equidad, humanidad, mística, objetividad, probidad.
                                </p>
                            </div>
                        </div>
                    </button>
                    <button data-pillar="3"
                        class="pillar-tab w-full text-left bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-900 dark:text-white rounded-2xl p-6 transition-all duration-300 hover:border-blue-300 dark:hover:border-blue-500/30">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 bg-blue-50 dark:bg-blue-600/10 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                </svg></div>
                            <div>
                                <h4 class="font-bold text-base">Fortalezas</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400 mt-0.5 leading-snug">Recurso humano
                                    capacitado, presencia en medios, capacidad de denuncia, alianzas internacionales,
                                    credibilidad, trabajo en equipo.</p>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <style>
        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes counter-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(-360deg);
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var pillars = [
                { title: 'Misión', text: 'Promover y vigilar que los Derechos Humanos de las personas privadas de su libertad sean garantizados por el Estado.' },
                { title: 'Visión', text: 'Ser la institución referencial para el cumplimiento de los Derechos Humanos en el ámbito penitenciario venezolano.' },
                { title: 'Valores', text: 'Autenticidad, compromiso, confidencialidad, equidad, humanidad, mística, objetividad, probidad.' },
                { title: 'Fortalezas', text: 'Recurso Humano motivado y capacitado, presencia en medios de comunicación, capacidad de denunciar veraz y adecuadamente, alianzas nacionales e internacionales, credibilidad interna y externa, motivación al logro, trabajo en equipo.' }
            ];

            var titleEl = document.getElementById('pillar-title');
            var textEl = document.getElementById('pillar-text');
            var tabs = document.querySelectorAll('.pillar-tab');
            var orbitBtns = document.querySelectorAll('.pillar-orbit-btn');

            function activate(index) {
                titleEl.style.opacity = '0';
                textEl.style.opacity = '0';
                setTimeout(function () {
                    titleEl.textContent = pillars[index].title;
                    textEl.textContent = pillars[index].text;
                    titleEl.style.opacity = '1';
                    textEl.style.opacity = '1';
                }, 200);

                tabs.forEach(function (tab, i) {
                    if (i === index) {
                        tab.className = 'pillar-tab w-full text-left bg-blue-600 text-white rounded-2xl p-6 transition-all duration-300 shadow-lg shadow-blue-600/20';
                        tab.querySelector('div > div:first-child').className = 'w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center shrink-0';
                        var desc = tab.querySelector('div > div:last-child > p');
                        if (desc) desc.className = 'text-sm opacity-80 mt-0.5 leading-snug';
                    } else {
                        tab.className = 'pillar-tab w-full text-left bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-900 dark:text-white rounded-2xl p-6 transition-all duration-300 hover:border-blue-300 dark:hover:border-blue-500/30';
                        tab.querySelector('div > div:first-child').className = 'w-10 h-10 bg-blue-50 dark:bg-blue-600/10 rounded-xl flex items-center justify-center text-blue-600 shrink-0';
                        var desc = tab.querySelector('div > div:last-child > p');
                        if (desc) desc.className = 'text-sm text-slate-500 dark:text-slate-400 mt-0.5 leading-snug';
                    }
                });

                orbitBtns.forEach(function (btn, i) {
                    btn.style.transform = i === index ? 'scale(1.3)' : 'scale(1)';
                    btn.style.boxShadow = i === index ? '0 0 20px rgba(59,130,246,0.5)' : '';
                });
            }

            tabs.forEach(function (tab) {
                tab.addEventListener('click', function () { activate(parseInt(this.dataset.pillar)); });
            });
            orbitBtns.forEach(function (btn) {
                btn.addEventListener('click', function () { activate(parseInt(this.dataset.pillar)); });
            });

            var current = 0;
            setInterval(function () { current = (current + 1) % 4; activate(current); }, 6000);
        });
    </script>

    <!-- ALIANZAS: ASHOKA & OMCT -->
    <section class="relative py-24 md:py-32 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <!-- Fixed: Higher visibility for light mode bg -->
            <img src="https://oveprisiones.com/wp-content/uploads/2016/10/generica4.png"
                class="w-full h-full object-cover opacity-20 dark:opacity-30 grayscale dark:grayscale-0"
                alt="Alianzas BG">
            <div class="absolute inset-0 bg-white/80 dark:bg-[#050b18]/95 transition-colors duration-500"></div>
        </div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <div class="mb-16">
                <span
                    class="inline-block px-3 py-1 bg-blue-600/10 text-blue-600 dark:text-blue-400 text-[10px] font-bold uppercase tracking-widest rounded mb-4">Red
                    Internacional</span>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tight">Nuestras
                    Alianzas</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Ashoka Card -->
                <div
                    class="group relative bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-[2.5rem] p-10 md:p-14 flex flex-col items-center text-center transition-all duration-500 hover:shadow-2xl hover:shadow-blue-600/10 hover:-translate-y-1">
                    <div class="relative mb-10">
                        <div
                            class="w-24 h-24 bg-white rounded-3xl flex items-center justify-center p-2 shadow-inner border border-slate-100 overflow-hidden">
                            <img src="https://oveprisiones.com/wp-content/uploads/2016/10/ashoka.jpg"
                                class="w-full h-full object-contain" alt="Ashoka Official Logo">
                        </div>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 dark:text-white mb-4">Fellow de Ashoka</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed max-w-xs">Organización social
                        internacional presente en más de 85 países que promueve habilidades emprendedoras y soluciones
                        en áreas sociales.</p>
                    <a href="http://venezuela.ashoka.org/" target="_blank"
                        class="inline-flex items-center gap-2 mt-8 px-6 py-2.5 bg-blue-600/10 text-blue-600 dark:text-blue-400 text-xs font-black rounded-xl hover:bg-blue-600 hover:text-white transition-all uppercase tracking-widest">
                        Conocer más
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
                <!-- OMCT Card -->
                <div
                    class="group relative bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-[2.5rem] p-10 md:p-14 flex flex-col items-center text-center transition-all duration-500 hover:shadow-2xl hover:shadow-red-600/10 hover:-translate-y-1">
                    <div class="relative mb-10">
                        <div
                            class="w-24 h-24 bg-red-50 dark:bg-red-600/10 rounded-3xl flex items-center justify-center p-4">
                            <span class="text-2xl font-black text-slate-900 dark:text-white">OMCT</span></div>
                        <div
                            class="absolute -bottom-2 -right-2 px-2 py-1 bg-red-600 text-white text-[8px] font-bold rounded uppercase tracking-tighter">
                            SOS-TORTURA</div>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 dark:text-white mb-4">Miembros de la OMCT</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed max-w-xs">La principal
                        coalición internacional de ONG que lucha contra la tortura, ejecuciones sumarias y
                        desapariciones forzadas.</p>
                    <a href="https://www.omct.org/" target="_blank"
                        class="inline-flex items-center gap-2 mt-8 px-6 py-2.5 bg-red-600/10 text-red-600 dark:text-red-400 text-xs font-black rounded-xl hover:bg-red-600 hover:text-white transition-all uppercase tracking-widest">
                        Conocer más
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACTO -->
    <section class="py-20 bg-slate-50 dark:bg-[#070e1e]">
        <div class="container mx-auto px-6">
            <div
                class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl p-10 md:p-14 max-w-4xl mx-auto">
                <div class="text-center mb-10">
                    <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Información de
                        Contacto</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div
                            class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-600/10 text-blue-600 mb-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg></div>
                        <h4 class="font-bold text-slate-900 dark:text-white text-sm mb-1">Dirección</h4>
                        <p class="text-slate-500 dark:text-slate-400 text-sm">Av. Sur, entre esq. Cipreses a Hoyo,
                            Centro Empresarial Cipreses, PH, Caracas 1014</p>
                    </div>
                    <div class="text-center">
                        <div
                            class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-600/10 text-blue-600 mb-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg></div>
                        <h4 class="font-bold text-slate-900 dark:text-white text-sm mb-1">Teléfono</h4>
                        <p class="text-slate-500 dark:text-slate-400 text-sm">+58 212 4833725<br>+58 212 4824343</p>
                    </div>
                    <div class="text-center">
                        <div
                            class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-600/10 text-blue-600 mb-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg></div>
                        <h4 class="font-bold text-slate-900 dark:text-white text-sm mb-1">Email</h4>
                        <p class="text-slate-500 dark:text-slate-400 text-sm"><a href="mailto:info@oveprisiones.com"
                                class="hover:text-blue-600 transition-colors">info@oveprisiones.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>