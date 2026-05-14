<!doctype html>
<html <?php language_attributes(); ?> class="dark">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<style>
		/* Content justification and spacing ONLY in articles */
		.entry-content p {
			text-align: justify;
			text-justify: inter-word;
			margin-bottom: 1.5rem;
		}
		/* General paragraph spacing for readability elsewhere */
		.site-main p {
			margin-bottom: 1.25rem;
		}

		/* Automatic Rounded Images in Posts */
		.prose img, .entry-content img, .post-content img {
			border-radius: 1rem;
			overflow: hidden;
			box-shadow: 0 10px 30px -10px rgba(0,0,0,0.1);
		}

		/* Premium Testimonials / Blockquotes */
		blockquote {
			position: relative;
			padding: 2rem 2.5rem;
			margin: 3rem 0;
			background: rgba(37, 99, 235, 0.05);
			border-left: 4px solid #2563eb;
			border-radius: 0 1.5rem 1.5rem 0;
			font-style: italic;
			color: #1e293b;
		}
		.dark blockquote {
			background: rgba(37, 99, 235, 0.1);
			color: #f1f5f9;
		}
		blockquote::before {
			content: '"';
			position: absolute;
			top: -10px;
			left: 10px;
			font-size: 5rem;
			font-family: serif;
			color: #2563eb;
			opacity: 0.2;
			line-height: 1;
		}

		/* Media Players Styling */
		audio {
			width: 100%;
			height: 45px;
			border-radius: 50px;
			background: #f1f5f9;
			padding: 5px;
			margin: 2rem 0;
		}
		.dark audio {
			background: rgba(255,255,255,0.05);
			filter: invert(1) hue-rotate(180deg);
		}

		/* Video & PDF Containers */
		.video-container, .pdf-container {
			border-radius: 1.5rem;
			overflow: hidden;
			margin: 2.5rem 0;
			box-shadow: 0 20px 40px -15px rgba(0,0,0,0.2);
		}

		/* Mega Menu Styling */
		.mega-menu-trigger:hover .mega-menu {
			opacity: 1;
			visibility: visible;
			transform: translateX(-50%) translateY(0);
		}
		.mega-menu {
			position: absolute;
			top: 100%;
			left: 50%;
			transform: translateX(-50%) translateY(-10px); /* Start slightly up for fade down */
			width: min(900px, 95vw);
			background: white;
			border: 1px solid rgba(0,0,0,0.05);
			border-radius: 2rem;
			padding: 2rem;
			box-shadow: 0 30px 60px -12px rgba(0,0,0,0.25);
			opacity: 0;
			visibility: hidden;
			transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
			display: grid;
			grid-template-columns: 1.5fr 1fr;
			gap: 2rem;
			z-index: 200;
		}
		.dark .mega-menu {
			background: #0d1b32;
			border-color: rgba(255,255,255,0.1);
		}

		/* Reading Progress Bar */
		#reading-progress {
			position: fixed;
			top: 0;
			left: 0;
			width: 0%;
			height: 3px;
			background: linear-gradient(to right, #2563eb, #60a5fa);
			z-index: 1000;
			transition: width 0.1s ease;
		}
	</style>
	<script>
		/* Critical: apply theme BEFORE paint to prevent flash */
		(function(){
			var t = localStorage.getItem('ovp-theme');
			if (t === 'light') {
				document.documentElement.classList.remove('dark');
			} else {
				document.documentElement.classList.add('dark');
			}
		})();
	</script>
</head>

<body <?php body_class('antialiased min-h-screen bg-white dark:bg-[#050b18] text-slate-900 dark:text-slate-100 transition-colors duration-300'); ?>>
<?php wp_body_open(); ?>

<!-- Reading Progress Bar -->
<?php if (is_single()) : ?>
<div id="reading-progress"></div>
<?php endif; ?>

<div id="page" class="site flex flex-col min-h-screen">

	<header id="masthead" class="site-header fixed top-0 inset-x-0 z-[100]">
		<div class="container mx-auto px-4 md:px-6 py-3">
			<div class="bg-white/80 dark:bg-[#0a1628]/80 backdrop-blur-xl border border-slate-200/60 dark:border-white/10 rounded-2xl px-6 py-2.5 flex justify-between items-center shadow-lg shadow-black/5 dark:shadow-black/30">

				<!-- Branding -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="flex items-center gap-2.5 shrink-0 group">
					<img src="https://oveprisiones.com/wp-content/uploads/2016/09/logo-e1473295394529.png" class="h-16 w-auto block dark:hidden" alt="OVP">
					<img src="https://oveprisiones.com/wp-content/uploads/2016/12/OVPlogo_blanco320x99-1.png" class="h-16 w-auto hidden dark:block" alt="OVP">
				</a>

				<!-- Desktop Navigation -->
				<nav id="site-navigation" class="main-navigation hidden lg:block">
					<ul class="flex items-center gap-6">
						<li><a href="<?php echo home_url(); ?>" class="text-sm font-bold hover:text-blue-600 transition-colors">Inicio</a></li>
						<li><a href="<?php echo home_url('/nosotros'); ?>" class="text-sm font-bold hover:text-blue-600 transition-colors">Nosotros</a></li>
						<li><a href="<?php echo home_url('/noticias'); ?>" class="text-sm font-bold hover:text-blue-600 transition-colors">Noticias</a></li>
						<li class="relative mega-menu-trigger">
							<a href="<?php echo home_url('/publicaciones'); ?>" class="text-sm font-bold hover:text-blue-600 transition-colors flex items-center gap-1">
								Publicaciones <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
							</a>
							<!-- Mega Menu -->
							<div class="mega-menu">
								<div>
									<span class="text-[10px] font-black uppercase tracking-widest text-blue-600 mb-4 block">Publicaciones</span>
									<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
										<a href="<?php echo home_url('/biblioteca'); ?>" class="p-3 rounded-xl hover:bg-slate-50 dark:hover:bg-white/5 transition-all group">
											<h4 class="text-sm font-bold group-hover:text-blue-600">Biblioteca</h4>
										</a>
										<a href="<?php echo home_url('/boletin-digital'); ?>" class="p-3 rounded-xl hover:bg-slate-50 dark:hover:bg-white/5 transition-all group">
											<h4 class="text-sm font-bold group-hover:text-blue-600">Boletín digital</h4>
										</a>
										<a href="<?php echo home_url('/informes'); ?>" class="p-3 rounded-xl hover:bg-slate-50 dark:hover:bg-white/5 transition-all group">
											<h4 class="text-sm font-bold group-hover:text-blue-600">Informes</h4>
										</a>
										<a href="<?php echo home_url('/infografias'); ?>" class="p-3 rounded-xl hover:bg-slate-50 dark:hover:bg-white/5 transition-all group">
											<h4 class="text-sm font-bold group-hover:text-blue-600">Infografías</h4>
										</a>
										<a href="<?php echo home_url('/informes-cidh'); ?>" class="p-3 rounded-xl hover:bg-slate-50 dark:hover:bg-white/5 transition-all group">
											<h4 class="text-sm font-bold group-hover:text-blue-600">Informes CIDH</h4>
										</a>
										<a href="<?php echo home_url('/informes-tematicos'); ?>" class="p-3 rounded-xl hover:bg-slate-50 dark:hover:bg-white/5 transition-all group">
											<h4 class="text-sm font-bold group-hover:text-blue-600">Informes temáticos</h4>
										</a>
										<a href="<?php echo home_url('/lecturas-de-interes'); ?>" class="p-3 rounded-xl hover:bg-slate-50 dark:hover:bg-white/5 transition-all group">
											<h4 class="text-sm font-bold group-hover:text-blue-600">Lecturas de interés</h4>
										</a>
										<a href="<?php echo home_url('/otros'); ?>" class="p-3 rounded-xl hover:bg-slate-50 dark:hover:bg-white/5 transition-all group">
											<h4 class="text-sm font-bold group-hover:text-blue-600">Otros</h4>
										</a>
									</div>
								</div>
								<div class="bg-blue-600 rounded-3xl p-6 text-white relative overflow-hidden flex flex-col justify-end min-h-[250px] group/featured">
									<img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&q=80&w=800" class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover/featured:scale-110 transition-transform duration-700" alt="Informes">
									<div class="absolute inset-0 bg-gradient-to-t from-blue-900 via-blue-900/40 to-transparent"></div>
									<div class="relative z-10">
										<span class="px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-[10px] font-bold uppercase tracking-wider">Destacado</span>
										<h4 class="text-xl font-black mt-2 leading-tight">Informes Especiales 2026</h4>
										<p class="text-white/80 text-xs mt-2 mb-6">Accede a nuestros informes técnicos de máxima importancia.</p>
										<a href="<?php echo home_url('/informes'); ?>" class="inline-block px-6 py-3 bg-white text-blue-600 font-bold rounded-xl text-sm hover:scale-105 transition-transform shadow-xl">Ver Informes</a>
									</div>
								</div>
							</div>
						</li>
						<li><a href="<?php echo home_url('/ong'); ?>" class="text-sm font-bold hover:text-blue-600 transition-colors">ONG</a></li>
						<li><a href="<?php echo home_url('/multimedia'); ?>" class="text-sm font-bold hover:text-blue-600 transition-colors">Multimedia</a></li>
					</ul>
				</nav>

				<!-- Tools -->
				<div class="flex items-center gap-2 lg:gap-4">
					<!-- Social Icons (Desktop) -->
					<div class="hidden xl:flex items-center gap-2 border-r border-slate-200 dark:border-white/10 pr-4 mr-2">
						<a href="#" class="p-2 text-slate-400 hover:text-blue-600 transition-colors" title="X (Twitter)">
							<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
						</a>
						<a href="#" class="p-2 text-slate-400 hover:text-blue-600 transition-colors" title="Facebook">
							<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
						</a>
						<a href="#" class="p-2 text-slate-400 hover:text-blue-600 transition-colors" title="Instagram">
							<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37zM17.5 6.5h.01"/></svg>
						</a>
						<a href="#" class="p-2 text-slate-400 hover:text-blue-600 transition-colors" title="YouTube">
							<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
						</a>
					</div>

					<!-- Search -->
					<div class="relative" id="real-time-search">
						<div class="flex items-center">
							<button id="search-trigger" class="p-2.5 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-white/10 transition-all">
								<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
							</button>
							<div id="search-input-container" class="absolute right-0 top-1/2 -translate-y-1/2 w-0 overflow-hidden transition-all duration-300 opacity-0">
								<form role="search" method="get" action="<?php echo home_url('/'); ?>">
									<input type="text" id="search-input" name="s" placeholder="Buscar..." class="w-64 lg:w-80 bg-white dark:bg-[#0d1b32] border border-blue-500 rounded-xl px-4 py-2.5 text-sm text-slate-900 dark:text-white outline-none shadow-xl">
								</form>
							</div>
						</div>
						<!-- Results Dropdown -->
						<div id="search-results" class="absolute top-full right-0 mt-4 w-80 lg:w-96 bg-white dark:bg-[#0d1b32] border border-slate-200 dark:border-white/10 rounded-2xl shadow-2xl overflow-hidden opacity-0 invisible transition-all z-[110]">
							<div id="results-container" class="max-h-[400px] overflow-y-auto p-2">
								<!-- Results will appear here -->
							</div>
							<a id="search-view-more" href="#" class="block p-3 text-center text-xs font-bold text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-600/10 border-t border-slate-100 dark:border-white/5 transition-colors">
								Ver todos los resultados
							</a>
						</div>
					</div>

					<button id="dark-mode-toggle" class="p-2.5 rounded-xl bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors" aria-label="Cambiar tema">
						<!-- Sun icon (shown in dark mode) -->
						<svg class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
						<!-- Moon icon (shown in light mode) -->
						<svg class="w-4 h-4 block dark:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
					</button>
					<button id="mobile-menu-trigger" class="lg:hidden p-2.5 rounded-xl bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-white transition-colors">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
					</button>
				</div>
			</div>
		</div>

		<!-- Mobile Overlay -->
		<div id="mobile-menu-overlay" class="fixed inset-0 bg-white/95 dark:bg-[#050b18]/95 backdrop-blur-2xl z-[120] opacity-0 invisible transition-all duration-300 lg:hidden flex flex-col">
			<div class="flex justify-between items-center p-6">
				<div class="flex gap-4">
					<a href="#" class="text-slate-400 hover:text-blue-600"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>
					<a href="#" class="text-slate-400 hover:text-blue-600"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
				</div>
				<button id="mobile-menu-close" class="p-3 rounded-xl bg-slate-100 dark:bg-white/10 text-slate-900 dark:text-white">
					<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
				</button>
			</div>
			<div class="flex items-center px-8 mb-8">
				<form role="search" method="get" action="<?php echo home_url('/'); ?>" class="w-full">
					<input type="text" name="s" placeholder="Buscar..." class="w-full bg-slate-100 dark:bg-white/5 border border-transparent focus:border-blue-500 rounded-xl px-5 py-4 text-slate-900 dark:text-white outline-none">
				</form>
			</div>
			<div class="flex-1 flex items-center justify-center p-8 overflow-y-auto">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'flex flex-col gap-6 text-center text-3xl font-black uppercase tracking-tight text-slate-900 dark:text-white',
				) );
				?>
			</div>
		</div>
	</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
	/* Search Toggle Logic */
	var searchTrigger = document.getElementById('search-trigger');
	var searchInputContainer = document.getElementById('search-input-container');
	var searchInput = document.getElementById('search-input');
	var searchResults = document.getElementById('search-results');
	var resultsContainer = document.getElementById('results-container');
	var viewMore = document.getElementById('search-view-more');
	var searchTimer;

	if (searchTrigger) {
		searchTrigger.addEventListener('click', function() {
			var isOpen = !searchInputContainer.classList.contains('opacity-0');
			if (!isOpen) {
				searchInputContainer.classList.remove('w-0', 'opacity-0');
				searchInputContainer.classList.add('w-64', 'lg:w-80', 'opacity-100');
				searchInput.focus();
			} else {
				searchInputContainer.classList.add('w-0', 'opacity-0');
				searchInputContainer.classList.remove('w-64', 'lg:w-80', 'opacity-100');
				searchResults.classList.add('opacity-0', 'invisible');
			}
		});
	}

	if (searchInput) {
		searchInput.addEventListener('input', function() {
			clearTimeout(searchTimer);
			var query = this.value.trim();
			
			if (query.length < 3) {
				searchResults.classList.add('opacity-0', 'invisible');
				return;
			}

			viewMore.href = '<?php echo home_url("/"); ?>?s=' + encodeURIComponent(query);

			searchTimer = setTimeout(function() {
				var restUrl = '<?php echo esc_url( get_rest_url( null, "/wp/v2/posts" ) ); ?>';
				var sep = restUrl.includes('?') ? '&' : '?';
				fetch(restUrl + sep + 'search=' + encodeURIComponent(query) + '&_embed&per_page=5')
					.then(response => response.json())
					.then(posts => {
						resultsContainer.innerHTML = '';
						if (!Array.isArray(posts) || posts.length === 0) {
							resultsContainer.innerHTML = '<div class="p-4 text-center text-slate-500 text-sm">No se encontraron resultados</div>';
						} else {
							posts.forEach(post => {
								var thumb = post._embedded && post._embedded['wp:featuredmedia'] ? post._embedded['wp:featuredmedia'][0].source_url : '';
								var div = document.createElement('a');
								div.href = post.link;
								div.className = 'flex items-center gap-3 p-3 hover:bg-blue-50 dark:hover:bg-blue-600/10 rounded-xl transition-colors group';
								div.innerHTML = `
									${thumb ? `<img src="${thumb}" class="w-12 h-12 rounded-lg object-cover shrink-0">` : `<div class="w-12 h-12 rounded-lg bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 font-bold">OVP</div>`}
									<div class="min-w-0 flex-1">
										<h4 class="text-sm font-bold text-slate-900 dark:text-white truncate group-hover:text-blue-600">${post.title.rendered}</h4>
										<p class="text-[10px] text-slate-500 truncate">Publicado el ${new Date(post.date).toLocaleDateString()}</p>
									</div>
								`;
								resultsContainer.appendChild(div);
							});
						}
						searchResults.classList.remove('opacity-0', 'invisible');
					});
			}, 300);
		});

		document.addEventListener('click', function(e) {
			if (!document.getElementById('real-time-search').contains(e.target)) {
				searchResults.classList.add('opacity-0', 'invisible');
				if (searchInput.value === '') {
					searchInputContainer.classList.add('w-0', 'opacity-0');
					searchInputContainer.classList.remove('w-64', 'lg:w-80', 'opacity-100');
				}
			}
		});
	}

	/* Dark Mode Toggle */
	var toggle = document.getElementById('dark-mode-toggle');
	if (toggle) {
		toggle.addEventListener('click', function() {
			document.documentElement.classList.toggle('dark');
			var isDark = document.documentElement.classList.contains('dark');
			localStorage.setItem('ovp-theme', isDark ? 'dark' : 'light');
		});
	}

	/* Mobile Menu */
	var trigger = document.getElementById('mobile-menu-trigger');
	var close = document.getElementById('mobile-menu-close');
	var overlay = document.getElementById('mobile-menu-overlay');
	if (trigger && overlay) {
		trigger.addEventListener('click', function() {
			overlay.classList.remove('opacity-0', 'invisible');
		});
	}
	if (close && overlay) {
		close.addEventListener('click', function() {
			overlay.classList.add('opacity-0', 'invisible');
		});
	}

	/* Nav Menu: style links based on theme */
	var navLinks = document.querySelectorAll('.nav-menu > ul > li > a');
	navLinks.forEach(function(link) {
		link.classList.add('text-slate-700', 'dark:text-slate-300', 'hover:text-blue-600', 'dark:hover:text-blue-400');
	});

	/* Sub-menu styling */
	var subMenus = document.querySelectorAll('.nav-menu > ul > li > ul.sub-menu');
	subMenus.forEach(function(submenu) {
		submenu.classList.add('bg-white', 'dark:bg-[#0a1628]', 'border', 'border-slate-200', 'dark:border-white/10', 'shadow-2xl');
	});
	var subLinks = document.querySelectorAll('.nav-menu > ul > li > ul.sub-menu > li > a');
	subLinks.forEach(function(link) {
		link.classList.add('text-slate-600', 'dark:text-slate-300', 'hover:bg-blue-50', 'dark:hover:bg-white/5', 'hover:text-blue-600', 'dark:hover:text-blue-400');
	});
});
</script>
