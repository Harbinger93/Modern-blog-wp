<?php ?>

<?php get_template_part('template-parts/instagram-feed'); ?>

<footer id="colophon"
	class="site-footer bg-slate-50 dark:bg-[#030810] pt-16 pb-8 border-t border-slate-200 dark:border-white/5 transition-colors">
	<div class="container mx-auto px-6">
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
			<!-- Brand -->
			<div class="space-y-5">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2.5">
					<img src="https://oveprisiones.com/wp-content/uploads/2016/09/logo-e1473295394529.png"
						class="h-10 w-auto block dark:hidden" alt="OVP">
					<img src="https://oveprisiones.com/wp-content/uploads/2016/12/OVPlogo_blanco320x99-1.png"
						class="h-10 w-auto hidden dark:block" alt="OVP">
				</a>
				<p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Organización dedicada a la defensa
					de los derechos humanos de las personas privadas de libertad en Venezuela.</p>
				<div class="flex gap-3">
					<a href="#"
						class="w-9 h-9 rounded-lg bg-slate-200 dark:bg-white/10 hover:bg-blue-600 text-slate-500 dark:text-slate-400 hover:text-white flex items-center justify-center transition-colors">
						<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
							<path
								d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
						</svg>
					</a>
					<a href="#"
						class="w-9 h-9 rounded-lg bg-slate-200 dark:bg-white/10 hover:bg-blue-600 text-slate-500 dark:text-slate-400 hover:text-white flex items-center justify-center transition-colors">
						<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
							<path
								d="M12 2.04c-5.5 0-10 4.49-10 10.02 0 5 3.66 9.15 8.44 9.9v-7H7.9v-2.9h2.54V9.85c0-2.52 1.49-3.93 3.78-3.93 1.09 0 2.24.2 2.24.2v2.47h-1.26c-1.24 0-1.63.78-1.63 1.57v1.88h2.78l-.45 2.9h-2.33v7a10 10 0 008.44-9.9c0-5.53-4.5-10.02-10-10.02z" />
						</svg>
					</a>
					<a href="#"
						class="w-9 h-9 rounded-lg bg-slate-200 dark:bg-white/10 hover:bg-blue-600 text-slate-500 dark:text-slate-400 hover:text-white flex items-center justify-center transition-colors">
						<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
							<path
								d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
						</svg>
					</a>
				</div>
			</div>

			<!-- Links -->
			<div>
				<h4 class="text-slate-900 dark:text-white text-sm font-bold mb-6">Explorar</h4>
				<ul class="space-y-3 text-slate-500 dark:text-slate-400 text-sm">
					<li><a href="#" class="hover:text-blue-600 dark:hover:text-white transition-colors">Quiénes
							Somos</a></li>
					<li><a href="#" class="hover:text-blue-600 dark:hover:text-white transition-colors">Noticias</a>
					</li>
					<li><a href="#" class="hover:text-blue-600 dark:hover:text-white transition-colors">Informes
							Técnicos</a></li>
					<li><a href="#" class="hover:text-blue-600 dark:hover:text-white transition-colors">Multimedia</a>
					</li>
				</ul>
			</div>

			<!-- Contact -->
			<div>
				<h4 class="text-slate-900 dark:text-white text-sm font-bold mb-6">Contacto</h4>
				<ul class="space-y-3 text-slate-500 dark:text-slate-400 text-sm">
					<li>Caracas, Venezuela</li>
					<li><a href="mailto:info@oveprisiones.com"
							class="hover:text-blue-600 dark:hover:text-white transition-colors">info@oveprisiones.com</a>
					</li>
				</ul>
			</div>

			<!-- Partners -->
			<div>
				<h4 class="text-slate-900 dark:text-white text-sm font-bold mb-6">Alianzas</h4>
				<div class="space-y-4">
					<div class="flex items-center gap-3">
						<img src="https://oveprisiones.com/wp-content/uploads/2016/10/ashoka.jpg"
							class="h-10 bg-white rounded-lg p-1 opacity-70 hover:opacity-100 transition-opacity"
							alt="Ashoka">
						<span class="text-slate-500 text-xs">Fellow de Ashoka</span>
					</div>
					<div class="flex items-center gap-3">
						<div
							class="w-10 h-10 bg-slate-200 dark:bg-white/10 rounded-lg flex items-center justify-center text-slate-600 dark:text-white text-[10px] font-bold">
							OMCT</div>
						<span class="text-slate-500 text-xs">Red SOS-Tortura</span>
					</div>
				</div>
			</div>
		</div>

		<!-- Copyright -->
		<div
			class="pt-8 border-t border-slate-200 dark:border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
			<p class="text-slate-500 text-xs">&copy; <?php echo date('Y'); ?> OVP. Todos los derechos reservados.</p>
			<div class="flex gap-6 text-xs text-slate-500">
				<a href="#" class="hover:text-slate-900 dark:hover:text-white transition-colors">Privacidad</a>
				<a href="#" class="hover:text-slate-900 dark:hover:text-white transition-colors">Términos</a>
			</div>
		</div>
	</div>
</footer>

</div><!-- #page -->
<?php wp_footer(); ?>
</body>

</html>