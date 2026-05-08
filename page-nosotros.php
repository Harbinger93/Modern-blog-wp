<?php
/**
 * Template Name: Nosotros
 *
 * @package modern-blog-wp
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Hero Page -->
    <header class="py-32 mesh-bg relative overflow-hidden">
        <div class="absolute inset-0 bg-ovp-dark/60 z-10"></div>
        <div class="container mx-auto px-6 relative z-20 text-center">
            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter mb-6">Quiénes Somos</h1>
            <p class="text-xl text-white/70 max-w-2xl mx-auto font-light leading-relaxed">
                Una institución dedicada a la vigilancia técnica, objetiva e imparcial de los derechos humanos en el sistema penitenciario.
            </p>
        </div>
    </header>

    <!-- Content Section -->
    <section class="py-24 bg-white dark:bg-ovp-dark transition-colors duration-500">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="space-y-8">
                    <div class="glass-card p-1 bg-ovp-accent/10 inline-block px-4 py-1 text-ovp-accent font-bold text-xs uppercase tracking-widest rounded-full">
                        Nuestra Misión
                    </div>
                    <h2 class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter leading-tight">
                        Compromiso con la Transparencia y la Justicia Social.
                    </h2>
                    <p class="text-lg text-slate-600 dark:text-white/60 leading-relaxed font-light">
                        Desde nuestra fundación, hemos trabajado para ser la voz de aquellos que se encuentran en situaciones de vulnerabilidad extrema. Nuestro enfoque no es solo denunciar, sino proporcionar informes técnicos que sirvan de base para reformas estructurales.
                    </p>
                    <div class="grid grid-cols-2 gap-8 pt-8">
                        <div>
                            <div class="text-4xl font-black text-ovp-accent mb-2">20+</div>
                            <div class="text-sm font-bold text-slate-500 dark:text-white/40 uppercase tracking-widest">Años de Trayectoria</div>
                        </div>
                        <div>
                            <div class="text-4xl font-black text-ovp-accent mb-2">500+</div>
                            <div class="text-sm font-bold text-slate-500 dark:text-white/40 uppercase tracking-widest">Informes Publicados</div>
                        </div>
                    </div>
                </div>
                <div class="relative group">
                    <div class="absolute -inset-4 bg-ovp-accent/20 blur-3xl rounded-full opacity-50"></div>
                    <div class="relative glass-card overflow-hidden rounded-[3rem] border-white/20 aspect-square">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Sobre Nosotros" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team / Structure Section -->
    <section class="py-24 bg-slate-50 dark:bg-white/5 transition-colors duration-500">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter mb-16">Estructura Organizativa</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <?php for($i=1; $i<=3; $i++): ?>
                    <div class="glass-card p-10 hover:-translate-y-2 transition-transform duration-500">
                        <div class="w-24 h-24 bg-slate-200 dark:bg-white/10 rounded-full mx-auto mb-6 overflow-hidden">
                             <img src="https://i.pravatar.cc/150?u=<?php echo $i; ?>" alt="Team Member">
                        </div>
                        <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-1">Director Ejecutivo</h4>
                        <div class="text-ovp-accent text-sm font-bold uppercase tracking-widest mb-4">Área Técnica</div>
                        <p class="text-slate-500 dark:text-white/50 text-sm font-light">
                            Especialista en derechos humanos con amplia experiencia en sistemas internacionales.
                        </p>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
