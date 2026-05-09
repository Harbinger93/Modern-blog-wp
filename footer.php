<?php
/**
 * The template for displaying the footer
 *
 * @package modern-blog-wp
 */
?>

    <footer id="colophon" class="site-footer bg-ovp-dark pt-24 pb-12 text-white border-t border-white/5 transition-colors duration-500">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-16 mb-20">
                
                <!-- Brand & Description -->
                <div class="md:col-span-4">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 bg-ovp-accent rounded-lg flex items-center justify-center font-black text-xl">M</div>
                        <span class="text-xl font-black tracking-tighter uppercase">Modern <span class="text-ovp-accent">Blog</span></span>
                    </div>
                    <p class="text-slate-400 text-sm font-light leading-relaxed mb-8 max-w-sm">
                        Vigilancia técnica e independiente de los derechos fundamentales. Transformamos la información en acción para un futuro más justo.
                    </p>
                    <div class="flex gap-4">
                        <?php 
                        $socials = array('twitter', 'facebook', 'instagram', 'youtube');
                        foreach($socials as $social): ?>
                            <a href="#" class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center hover:bg-ovp-accent hover:border-ovp-accent transition-all">
                                <span class="sr-only"><?php echo $social; ?></span>
                                <div class="w-4 h-4 bg-white/20 rounded-sm"></div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="md:col-span-2">
                    <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-ovp-accent mb-8">Explorar</h4>
                    <ul class="space-y-4 text-sm text-slate-400 font-light">
                        <li><a href="#" class="hover:text-white transition-colors">Quiénes Somos</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Archivo de Noticias</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Informes Técnicos</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Recursos Multimedia</a></li>
                    </ul>
                </div>

                <div class="md:col-span-2">
                    <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-ovp-accent mb-8">Líneas de Acción</h4>
                    <ul class="space-y-4 text-sm text-slate-400 font-light">
                        <li><a href="#" class="hover:text-white transition-colors">Monitoreo Penitenciario</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Asistencia Legal</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Incidencia Internacional</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Educación en DDHH</a></li>
                    </ul>
                </div>

                <!-- Trust Badge / Security -->
                <div class="md:col-span-4">
                    <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-ovp-accent mb-8">Seguridad</h4>
                    <div class="glass-card p-8 border-white/5 bg-white/[0.02]">
                        <div class="flex items-start gap-4">
                            <svg class="w-6 h-6 text-ovp-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-widest mb-2">Cifrado de Extremo a Extremo</p>
                                <p class="text-[10px] text-slate-500 leading-relaxed font-light">
                                    Toda la información transmitida en este portal está protegida por protocolos de cifrado avanzado para garantizar la seguridad de nuestras fuentes y usuarios.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Bar -->
            <div class="pt-12 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6 text-[10px] text-slate-500 font-bold uppercase tracking-widest">
                <p>&copy; <?php echo date('Y'); ?> Modern Blog WP. Desarrollado con integridad para la defensa de los Derechos Humanos.</p>
                <div class="flex gap-8">
                    <a href="#" class="hover:text-ovp-accent transition-colors">Privacidad</a>
                    <a href="#" class="hover:text-ovp-accent transition-colors">Términos</a>
                    <a href="#" class="hover:text-ovp-accent transition-colors">Acceso / I+D</a>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
