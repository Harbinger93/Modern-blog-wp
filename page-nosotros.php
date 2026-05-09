<?php
/**
 * Template Name: Nosotros
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main bg-ovp-light dark:bg-ovp-dark transition-colors duration-500">

    <!-- Page Header -->
    <section class="relative pt-40 pb-20 overflow-hidden mesh-bg">
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-6xl md:text-8xl font-black text-white tracking-tighter mb-8">Quiénes Somos</h1>
            <p class="text-xl text-slate-300 font-light max-w-2xl mx-auto leading-relaxed">
                Una institución dedicada a la vigilancia técnica, objetiva e imparcial de los derechos humanos en el sistema penitenciario.
            </p>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-24">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="relative">
                    <div class="aspect-square rounded-3xl overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=1000" class="w-full h-full object-cover" alt="Misión">
                    </div>
                    <!-- Stats Overlap -->
                    <div class="absolute -bottom-10 -right-10 glass-card p-10 hidden md:block">
                        <div class="flex gap-12">
                            <div>
                                <span class="block text-4xl font-black text-ovp-accent">20+</span>
                                <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Años de Trayectoria</span>
                            </div>
                            <div>
                                <span class="block text-4xl font-black text-ovp-accent">500+</span>
                                <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Informes Publicados</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <span class="inline-block px-4 py-1 mb-6 text-[10px] font-black tracking-widest uppercase bg-ovp-accent/10 text-ovp-accent rounded-full">Nuestra Misión</span>
                    <h2 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tighter mb-8 leading-tight">
                        Compromiso con la Transparencia y la Justicia Social.
                    </h2>
                    <p class="text-lg text-slate-600 dark:text-slate-400 font-light leading-relaxed mb-8">
                        Desde nuestra fundación, hemos trabajado para ser la voz de aquellos que se encuentran en situaciones de vulnerabilidad extrema. Nuestro enfoque no es solo denunciar, sino proporcionar informes técnicos que sirvan de base para reformas estructurales.
                    </p>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-6 h-6 rounded-full bg-ovp-accent/20 flex items-center justify-center mt-1">
                                <div class="w-2 h-2 rounded-full bg-ovp-accent"></div>
                            </div>
                            <p class="text-slate-700 dark:text-slate-300 font-bold">Investigación de campo rigurosa y verificable.</p>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-6 h-6 rounded-full bg-ovp-accent/20 flex items-center justify-center mt-1">
                                <div class="w-2 h-2 rounded-full bg-ovp-accent"></div>
                            </div>
                            <p class="text-slate-700 dark:text-slate-300 font-bold">Incidencia en organismos internacionales.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Organizational Structure -->
    <section class="py-24 bg-slate-50 dark:bg-white/[0.02]">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter mb-20">Estructura Organizativa</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <?php 
                $team = array(
                    array('name' => 'Director Ejecutivo', 'role' => 'Área Técnica', 'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=300'),
                    array('name' => 'Coordinación Legal', 'role' => 'Derechos Humanos', 'img' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&q=80&w=300'),
                    array('name' => 'Investigación', 'role' => 'Monitoreo', 'img' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&q=80&w=300'),
                );
                foreach($team as $member): ?>
                    <div class="glass-card p-10 hover:border-ovp-accent/30 transition-all group">
                        <img src="<?php echo $member['img']; ?>" class="w-24 h-24 rounded-full mx-auto mb-6 grayscale group-hover:grayscale-0 transition-all border-4 border-white dark:border-white/5 shadow-xl" alt="<?php echo $member['name']; ?>">
                        <h4 class="text-xl font-black text-slate-900 dark:text-white mb-2"><?php echo $member['name']; ?></h4>
                        <p class="text-xs font-black uppercase tracking-widest text-ovp-accent mb-6"><?php echo $member['role']; ?></p>
                        <p class="text-sm text-slate-500 font-light leading-relaxed">
                            Especialista en derechos humanos con amplia experiencia en sistemas internacionales.
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<?php get_header(); ?>
