<?php
/**
 * The template for displaying the footer
 *
 * @package modern-blog-wp
 */

?>
	<footer id="colophon" class="site-footer mt-auto py-24 bg-white dark:bg-ovp-dark border-t border-slate-100 dark:border-white/5 transition-colors duration-500">
		<div class="container mx-auto px-6">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-24">
                
                <!-- Col 1: Branding & Philosophy -->
                <div class="space-y-8">
                    <div class="site-branding">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2">
                            <div class="w-10 h-10 bg-ovp-accent rounded-lg flex items-center justify-center font-black text-white text-xl">M</div>
                            <span class="text-xl font-black text-slate-900 dark:text-white tracking-tighter uppercase">Modern Blog<span class="text-ovp-accent">.</span></span>
                        </a>
                    </div>
                    <p class="text-slate-500 dark:text-white/50 text-sm leading-relaxed font-light">
                        Vigilancia técnica e independiente de los derechos fundamentales. Transformamos la información en acción para un futuro más justo.
                    </p>
                    <div class="flex gap-4">
                        <?php
                        $socials = array('twitter', 'facebook', 'instagram', 'youtube');
                        foreach($socials as $social): ?>
                            <a href="#" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center text-slate-400 hover:bg-ovp-accent hover:text-white transition-all">
                                <span class="sr-only"><?php echo $social; ?></span>
                                <i class="fab fa-<?php echo $social; ?>"></i>
                                <!-- Using placeholder icons for now -->
                                <div class="w-4 h-4 bg-current rounded-sm"></div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h3 class="text-xs font-black uppercase tracking-[0.3em] text-ovp-accent mb-10">Explorar</h3>
                    <nav class="flex flex-col gap-4">
                        <a href="<?php echo esc_url( home_url('/nosotros') ); ?>" class="text-slate-600 dark:text-white/70 hover:text-ovp-accent transition-colors text-sm">Quiénes Somos</a>
                        <a href="<?php echo esc_url( home_url('/noticias') ); ?>" class="text-slate-600 dark:text-white/70 hover:text-ovp-accent transition-colors text-sm">Archivo de Noticias</a>
                        <a href="<?php echo esc_url( home_url('/publicaciones') ); ?>" class="text-slate-600 dark:text-white/70 hover:text-ovp-accent transition-colors text-sm">Informes Técnicos</a>
                        <a href="#" class="text-slate-600 dark:text-white/70 hover:text-ovp-accent transition-colors text-sm">Recursos Multimedia</a>
                    </nav>
                </div>

                <!-- Col 3: Topics -->
                <div>
                    <h3 class="text-xs font-black uppercase tracking-[0.3em] text-ovp-accent mb-10">Líneas de Acción</h3>
                    <nav class="flex flex-col gap-4">
                        <a href="#" class="text-slate-600 dark:text-white/70 hover:text-ovp-accent transition-colors text-sm">Monitoreo Penitenciario</a>
                        <a href="#" class="text-slate-600 dark:text-white/70 hover:text-ovp-accent transition-colors text-sm">Asistencia Legal</a>
                        <a href="#" class="text-slate-600 dark:text-white/70 hover:text-ovp-accent transition-colors text-sm">Incidencia Internacional</a>
                        <a href="#" class="text-slate-600 dark:text-white/70 hover:text-ovp-accent transition-colors text-sm">Educación en DDHH</a>
                    </nav>
                </div>

                <!-- Col 4: Trust & Security -->
                <div>
                    <h3 class="text-xs font-black uppercase tracking-[0.3em] text-ovp-accent mb-10">Seguridad</h3>
                    <div class="glass-card p-6 border-slate-100 dark:border-white/5 space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-ovp-accent/10 rounded-lg flex items-center justify-center text-ovp-accent">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <div class="text-xs font-bold text-slate-900 dark:text-white">Cifrado de Extremo a Extremo</div>
                        </div>
                        <p class="text-[10px] text-slate-500 dark:text-white/40 leading-relaxed">
                            Toda la información transmitida en este portal está protegida por protocolos de cifrado avanzado para garantizar la seguridad de nuestras fuentes y usuarios.
                        </p>
                    </div>
                </div>

            </div>

            <!-- Bottom Bar -->
            <div class="pt-12 border-t border-slate-100 dark:border-white/5 flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="text-xs text-slate-400 dark:text-white/20 font-medium">
                    &copy; <?php echo date('Y'); ?> Modern Blog WP. Desarrollado con integridad para la defensa de los Derechos Humanos.
                </div>
                <div class="flex gap-8 text-[10px] font-bold uppercase tracking-widest text-slate-400 dark:text-white/20">
                    <a href="#" class="hover:text-ovp-accent transition-colors">Privacidad</a>
                    <a href="#" class="hover:text-ovp-accent transition-colors">Términos</a>
                    <a href="#" class="hover:text-ovp-accent transition-colors">Accesibilidad</a>
                </div>
            </div>

		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
