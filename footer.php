<?php
/**
 * The template for displaying the footer
 *
 * @package modern-blog-wp
 */

?>

    <footer id="colophon" class="site-footer bg-ovp-darker pt-24 pb-12 border-t border-white/5 relative z-50">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-24">
                <!-- Branding & About -->
                <div class="space-y-8">
                    <div class="site-branding">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-ovp-accent rounded-xl flex items-center justify-center font-black text-white text-xl shadow-lg shadow-ovp-accent/20">O</div>
                            <span class="text-2xl font-black text-white tracking-tighter uppercase">OVP<span class="text-ovp-accent">.</span></span>
                        </a>
                    </div>
                    <p class="text-ovp-slate text-sm font-light leading-relaxed">
                        Organización no gubernamental dedicada a la defensa de los derechos humanos de las personas privadas de libertad en Venezuela.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-slate-400 hover:bg-ovp-accent hover:text-white transition-all">&times;</a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-slate-400 hover:bg-ovp-accent hover:text-white transition-all">f</a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-slate-400 hover:bg-ovp-accent hover:text-white transition-all">i</a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white text-xs font-black uppercase tracking-[0.3em] mb-10">Explorar</h4>
                    <ul class="space-y-4 text-ovp-slate text-sm font-light uppercase tracking-widest">
                        <li><a href="#" class="hover:text-ovp-accent transition-all">Quiénes Somos</a></li>
                        <li><a href="#" class="hover:text-ovp-accent transition-all">Informes Técnicos</a></li>
                        <li><a href="#" class="hover:text-ovp-accent transition-all">Multimedia</a></li>
                        <li><a href="#" class="hover:text-ovp-accent transition-all">Noticias</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-white text-xs font-black uppercase tracking-[0.3em] mb-10">Contacto</h4>
                    <ul class="space-y-4 text-ovp-slate text-sm font-light">
                        <li class="flex items-start gap-4">
                            <span class="text-ovp-accent font-bold">A:</span>
                            <span>Caracas, Venezuela</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="text-ovp-accent font-bold">E:</span>
                            <a href="mailto:info@oveprisiones.com" class="hover:text-white transition-all">info@oveprisiones.com</a>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="text-ovp-accent font-bold">T:</span>
                            <span>+58 (212) 555-5555</span>
                        </li>
                    </ul>
                </div>

                <!-- Strategic Partners (OMCT, etc) -->
                <div>
                    <h4 class="text-white text-xs font-black uppercase tracking-[0.3em] mb-10">Alianzas</h4>
                    <div class="space-y-8">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Ashoka_Logo.svg/2560px-Ashoka_Logo.svg.png" class="h-10 grayscale invert opacity-50 hover:opacity-100 transition-all" alt="Ashoka">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center font-black text-white text-xs">OMCT</div>
                            <span class="text-[10px] text-ovp-slate font-black uppercase tracking-widest leading-tight">Red SOS-Tortura</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright Area -->
            <div class="pt-12 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-8">
                <p class="text-ovp-slate text-[10px] font-black uppercase tracking-[0.2em]">
                    &copy; <?php echo date('Y'); ?> OVP. DESARROLLADO CON INTEGRIDAD PARA LA DEFENSA DE LOS DERECHOS HUMANOS.
                </p>
                <div class="flex gap-8 text-[10px] font-black uppercase tracking-[0.2em] text-ovp-slate">
                    <a href="#" class="hover:text-white transition-all">Privacidad</a>
                    <a href="#" class="hover:text-white transition-all">Términos</a>
                    <a href="#" class="hover:text-white transition-all">Acceso I/D</a>
                </div>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
