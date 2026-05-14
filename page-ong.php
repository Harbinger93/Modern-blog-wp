<?php
/**
 * Template Name: ONGs Aliadas
 * Description: Carrusel de organizaciones aliadas
 *
 * @package ovp-theme
 */

get_header(); ?>

<main id="primary" class="site-main bg-white dark:bg-[#050b18]">

    <!-- HERO -->
    <section class="relative h-[45vh] md:h-[50vh] bg-slate-900 overflow-hidden flex items-end pb-12">
        <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&q=80&w=2000" class="absolute inset-0 w-full h-full object-cover opacity-25" alt="Alianzas">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-black/20"></div>
        <div class="absolute bottom-0 left-0 right-0 h-40 bg-gradient-to-t from-slate-50 dark:from-[#070e1e] to-transparent"></div>
        <div class="container mx-auto px-6 relative z-10">
            <span class="inline-block px-4 py-1.5 bg-blue-600/20 border border-blue-500/30 text-blue-400 text-xs font-bold uppercase tracking-wider rounded-full mb-4">Red Internacional</span>
            <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight">Organizaciones Aliadas</h1>
            <p class="text-white/50 mt-3 text-lg font-light">Red de instituciones comprometidas con los derechos humanos.</p>
        </div>
    </section>

    <!-- LOGO CAROUSEL -->
    <section class="py-20 md:py-28 bg-slate-50 dark:bg-[#070e1e] overflow-hidden">
        <div class="container mx-auto px-6 text-center mb-14">
            <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Nuestros Aliados</h2>
            <p class="text-slate-500 dark:text-slate-400 mt-3 max-w-xl mx-auto">Trabajamos junto a las principales organizaciones internacionales de derechos humanos.</p>
        </div>

        <!-- Infinite Scroll Carousel -->
        <div class="overflow-hidden mb-16">
            <div class="flex gap-12 items-center ong-marquee">
                <?php
                $ongs = array(
                    array('name' => 'IIDH', 'full' => 'Instituto Interamericano de Derechos Humanos', 'url' => 'https://www.iidh.ed.cr/'),
                    array('name' => 'APT', 'full' => 'Asociación para la Prevención de la Tortura', 'url' => 'https://www.apt.ch/'),
                    array('name' => 'FLD', 'full' => 'Front Line Defenders', 'url' => 'https://www.frontlinedefenders.org/'),
                    array('name' => 'CICR', 'full' => 'Comité Internacional de la Cruz Roja', 'url' => 'https://www.icrc.org/'),
                    array('name' => 'CEJIL', 'full' => 'Centro por la Justicia y el Derecho Internacional', 'url' => 'https://cejil.org/'),
                    array('name' => 'OMCT', 'full' => 'Organización Mundial Contra la Tortura', 'url' => 'https://www.omct.org/'),
                    array('name' => 'HRW', 'full' => 'Human Rights Watch', 'url' => 'https://www.hrw.org/'),
                    array('name' => 'AI', 'full' => 'Amnistía Internacional', 'url' => 'https://www.amnesty.org/'),
                );
                for ($dup = 0; $dup < 2; $dup++) :
                    foreach ($ongs as $ong) :
                ?>
                    <a href="<?php echo esc_url($ong['url']); ?>" target="_blank" class="flex-shrink-0 w-[200px] group">
                        <div class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl p-8 text-center hover:border-blue-300 dark:hover:border-blue-500/30 hover:shadow-lg transition-all">
                            <div class="w-20 h-20 mx-auto bg-slate-100 dark:bg-white/10 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-blue-50 dark:group-hover:bg-blue-600/10 transition-colors">
                                <span class="text-2xl font-black text-slate-700 dark:text-slate-300 group-hover:text-blue-600 transition-colors"><?php echo esc_html($ong['name']); ?></span>
                            </div>
                            <p class="text-xs font-medium text-slate-500 dark:text-slate-400 leading-tight"><?php echo esc_html($ong['full']); ?></p>
                        </div>
                    </a>
                <?php endforeach; endfor; ?>
            </div>
        </div>

        <style>
            @keyframes ong-scroll { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
            .ong-marquee { animation: ong-scroll 50s linear infinite; width: max-content; }
            .ong-marquee:hover { animation-play-state: paused; }
        </style>

        <!-- Full Grid -->
        <div class="container mx-auto px-6">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-8 text-center">Directorio Completo</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-5xl mx-auto">
                <?php foreach ($ongs as $ong) : ?>
                    <a href="<?php echo esc_url($ong['url']); ?>" target="_blank" class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl p-6 text-center hover:border-blue-300 dark:hover:border-blue-500/30 hover:shadow-lg transition-all group">
                        <div class="w-16 h-16 mx-auto bg-slate-100 dark:bg-white/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-600 transition-colors">
                            <span class="text-xl font-black text-slate-600 dark:text-slate-300 group-hover:text-white transition-colors"><?php echo esc_html($ong['name']); ?></span>
                        </div>
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white"><?php echo esc_html($ong['full']); ?></h4>
                        <span class="inline-flex items-center gap-1 text-blue-600 text-xs font-medium mt-3 group-hover:gap-2 transition-all">
                            Visitar
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
