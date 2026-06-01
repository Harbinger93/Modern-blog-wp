<!doctype html>
<html <?php language_attributes(); ?> class="dark">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<!-- Performance Optimizations: Preconnects & Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
	
	<!-- Dynamic Hero LCP Preload -->
	<?php if ( is_single() && has_post_thumbnail() ) : ?>
		<link rel="preload" as="image" href="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>">
	<?php endif; ?>

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

		/* Responsive video, iframe and embed corrections */
		.wp-block-video video,
		.entry-content video:not(.mejs-tech):not(.wp-video-shortcode),
		.prose video:not(.mejs-tech):not(.wp-video-shortcode),
		.wp-block-embed iframe,
		.entry-content iframe:not([title*="PDF"]):not([src*=".pdf"]),
		.prose iframe:not([title*="PDF"]):not([src*=".pdf"]) {
			width: 100% !important;
			max-width: 100% !important;
			height: 500px !important;
			border-radius: 1.5rem !important;
			margin-left: auto !important;
			margin-right: auto !important;
			display: block !important;
			object-fit: contain !important;
			background: #000 !important;
		}

		/* If the video block has an alignment wrapper */
		.wp-video,
		.wp-block-video,
		.wp-block-embed,
		.wp-block-embed__wrapper {
			width: 100% !important;
			max-width: 100% !important;
			height: auto !important;
		}

		/* MediaElement.js (mejs) player responsive overrides */
		.mejs-container {
			width: 100% !important;
			min-width: 100% !important;
			max-width: 100% !important;
			height: 500px !important;
			background: #000 !important;
			border-radius: 1.5rem !important;
			overflow: hidden !important;
			margin: 2.5rem auto !important;
			display: block !important;
			position: relative !important;
		}

		/* mejs inner elements and controls */
		.mejs-container .mejs-inner,
		.mejs-container .mejs-mediaelement,
		.mejs-container .mejs-layers,
		.mejs-container .mejs-overlay {
			width: 100% !important;
			height: 100% !important;
			min-height: 100% !important;
		}

		.mejs-container .mejs-mediaelement video {
			width: 100% !important;
			height: 100% !important;
			object-fit: contain !important;
			background: #000 !important;
		}

		.mejs-container .mejs-controls {
			width: 100% !important;
			height: 40px !important;
			min-height: 40px !important;
			background: rgba(0,0,0,0.7) !important;
			position: absolute !important;
			bottom: 0 !important;
			left: 0 !important;
			z-index: 100 !important;
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
		}
		/* Mobile & Desktop Search Overrides */
		#search-input-container {
			transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
		}
		#search-input-container.search-open {
			opacity: 1 !important;
			visibility: visible !important;
			width: 100% !important;
		}
		@media (min-width: 1024px) {
			#search-input-container.search-open {
				width: 320px !important;
			}
		}

		/* Premium Glassmorphic Mobile Menu Overlay Overlay */
		#mobile-menu-overlay {
			transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
			transform: translateY(-20px);
		}
		#mobile-menu-overlay:not(.invisible) {
			transform: translateY(0);
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
					<img src="https://oveprisiones.com/wp-content/uploads/2016/09/logo-e1473295394529.png" class="h-9 xs:h-10 sm:h-12 md:h-16 w-auto block dark:hidden" alt="OVP">
					<img src="https://oveprisiones.com/wp-content/uploads/2016/12/OVPlogo_blanco320x99-1.png" class="h-9 xs:h-10 sm:h-12 md:h-16 w-auto hidden dark:block" alt="OVP">
				</a>

				<!-- Desktop Navigation -->
				<nav id="site-navigation" class="main-navigation hidden lg:block">
					<ul class="flex items-center gap-6">
						<li><a href="<?php echo home_url(); ?>" class="text-sm font-bold hover:text-blue-600 transition-colors <?php echo is_front_page() ? 'text-blue-600' : 'text-slate-700 dark:text-slate-300'; ?>">Inicio</a></li>
						<li><a href="<?php echo home_url('/nosotros'); ?>" class="text-sm font-bold hover:text-blue-600 transition-colors <?php echo is_page('nosotros') ? 'text-blue-600' : 'text-slate-700 dark:text-slate-300'; ?>">Nosotros</a></li>
						<li><a href="<?php echo home_url('/noticias'); ?>" class="text-sm font-bold hover:text-blue-600 transition-colors <?php echo is_page('noticias') ? 'text-blue-600' : 'text-slate-700 dark:text-slate-300'; ?>">Noticias</a></li>
						<li><a href="<?php echo home_url('/biblioteca'); ?>" class="text-sm font-bold hover:text-blue-600 transition-colors <?php echo is_page_template('page-biblioteca.php') ? 'text-blue-600' : 'text-slate-700 dark:text-slate-300'; ?>">Biblioteca</a></li>
						<li><a href="<?php echo home_url('/ong'); ?>" class="text-sm font-bold hover:text-blue-600 transition-colors <?php echo is_page('ong') ? 'text-blue-600' : 'text-slate-700 dark:text-slate-300'; ?>">ONG</a></li>
						<li><a href="<?php echo home_url('/multimedia'); ?>" class="text-sm font-bold hover:text-blue-600 transition-colors <?php echo is_page('multimedia') ? 'text-blue-600' : 'text-slate-700 dark:text-slate-300'; ?>">Multimedia</a></li>
					</ul>
				</nav>

				<!-- Tools -->
				<div class="flex items-center gap-2 lg:gap-4">
					<!-- Social Icons (Desktop) -->
					<div class="hidden xl:flex items-center gap-2 border-r border-slate-200 dark:border-white/10 pr-4 mr-2">
						<a href="https://x.com/oveprisiones" target="_blank" rel="noopener" class="p-2 text-slate-400 hover:text-blue-600 transition-colors" title="X (Twitter)">
							<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
						</a>
						<a href="https://www.facebook.com/ObservatorioVenezolanoDePrisionesOVP" target="_blank" rel="noopener" class="p-2 text-slate-400 hover:text-blue-600 transition-colors" title="Facebook">
							<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
						</a>
						<a href="https://www.instagram.com/oveprisiones/" target="_blank" rel="noopener" class="p-2 text-slate-400 hover:text-blue-600 transition-colors" title="Instagram">
							<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37zM17.5 6.5h.01"/></svg>
						</a>
						<a href="https://www.youtube.com/@observatoriovenezolanodepr4992" target="_blank" rel="noopener" class="p-2 text-slate-400 hover:text-blue-600 transition-colors" title="YouTube">
							<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
						</a>
					</div>

					<!-- Search -->
					<div class="relative" id="real-time-search">
						<div class="flex items-center">
							<button id="search-trigger" class="p-2.5 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-white/10 transition-all">
								<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
							</button>
							<div id="search-input-container" class="fixed top-[88px] inset-x-4 w-0 opacity-0 invisible lg:absolute lg:top-1/2 lg:-translate-y-1/2 lg:right-0 lg:left-auto lg:w-0 lg:inset-x-auto bg-white/95 dark:bg-[#0a1628]/95 backdrop-blur-xl border border-slate-200/60 dark:border-white/10 rounded-2xl p-3 lg:p-0 lg:bg-transparent lg:border-0 lg:rounded-none lg:backdrop-blur-none lg:shadow-none shadow-2xl overflow-hidden z-[115]">
								<form role="search" method="get" action="<?php echo home_url('/'); ?>">
									<input type="text" id="search-input" name="s" placeholder="Buscar..." class="w-full bg-white dark:bg-[#0d1b32] border border-blue-500 rounded-xl px-4 py-2.5 text-sm text-slate-900 dark:text-white outline-none shadow-xl">
								</form>
							</div>
						</div>
						<!-- Results Dropdown -->
						<div id="search-results" class="absolute top-full left-0 right-0 mt-3 w-full bg-white dark:bg-[#0d1b32] border border-slate-200 dark:border-white/10 rounded-2xl shadow-2xl overflow-hidden opacity-0 invisible transition-all z-[110] lg:right-0 lg:left-auto lg:w-96">
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
		<div id="mobile-menu-overlay" class="fixed top-[88px] inset-x-4 max-h-[calc(100vh-110px)] bg-white/90 dark:bg-[#0a1628]/90 backdrop-blur-xl border border-slate-200/60 dark:border-white/10 rounded-2xl shadow-2xl transition-all duration-300 opacity-0 invisible z-[120] lg:hidden flex flex-col overflow-hidden">
			<div class="flex justify-between items-center p-5 border-b border-slate-100 dark:border-white/5">
				<div class="flex items-center gap-2">
					<a href="https://x.com/oveprisiones" target="_blank" rel="noopener" class="p-1.5 text-slate-400 hover:text-blue-600 transition-colors" title="X (Twitter)">
						<svg class="w-4.5 h-4.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
					</a>
					<a href="https://www.facebook.com/ObservatorioVenezolanoDePrisionesOVP" target="_blank" rel="noopener" class="p-1.5 text-slate-400 hover:text-blue-600 transition-colors" title="Facebook">
						<svg class="w-4.5 h-4.5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
					</a>
					<a href="https://www.instagram.com/oveprisiones/" target="_blank" rel="noopener" class="p-1.5 text-slate-400 hover:text-blue-600 transition-colors" title="Instagram">
						<svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37zM17.5 6.5h.01"/></svg>
					</a>
					<a href="https://www.youtube.com/@observatoriovenezolanodepr4992" target="_blank" rel="noopener" class="p-1.5 text-slate-400 hover:text-blue-600 transition-colors" title="YouTube">
						<svg class="w-4.5 h-4.5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
					</a>
				</div>
				<button id="mobile-menu-close" class="p-2 rounded-xl bg-slate-100 dark:bg-white/10 text-slate-900 dark:text-white hover:text-blue-600 transition-colors">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
				</button>
			</div>
			<div class="px-6 mt-5 relative" id="mobile-search-container">
				<form role="search" method="get" action="<?php echo home_url('/'); ?>" class="w-full">
					<input type="text" id="mobile-search-input" name="s" placeholder="Buscar..." class="w-full bg-slate-100 dark:bg-white/5 border border-transparent focus:border-blue-500 rounded-xl px-4 py-3 text-sm text-slate-900 dark:text-white outline-none">
				</form>
				<!-- Mobile Results Dropdown -->
				<div id="mobile-search-results" class="absolute top-full left-6 right-6 mt-2 bg-white dark:bg-[#0d1b32] border border-slate-200 dark:border-white/10 rounded-2xl shadow-2xl overflow-hidden opacity-0 invisible transition-all z-[130]">
					<div id="mobile-results-container" class="max-h-[250px] overflow-y-auto p-2">
						<!-- Results will appear here -->
					</div>
					<a id="mobile-search-view-more" href="#" class="block p-3 text-center text-xs font-bold text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-600/10 border-t border-slate-100 dark:border-white/5 transition-colors">
						Ver todos los resultados
					</a>
				</div>
			</div>
			<div class="flex-1 flex flex-col items-center justify-center gap-5 p-6 overflow-y-auto min-h-[300px]">
				<a href="<?php echo home_url(); ?>" class="text-2xl font-black uppercase tracking-tight hover:text-blue-600 transition-colors <?php echo is_front_page() ? 'text-blue-600' : 'text-slate-900 dark:text-white'; ?>">Inicio</a>
				<a href="<?php echo home_url('/nosotros'); ?>" class="text-2xl font-black uppercase tracking-tight hover:text-blue-600 transition-colors <?php echo is_page('nosotros') ? 'text-blue-600' : 'text-slate-900 dark:text-white'; ?>">Nosotros</a>
				<a href="<?php echo home_url('/noticias'); ?>" class="text-2xl font-black uppercase tracking-tight hover:text-blue-600 transition-colors <?php echo is_page('noticias') ? 'text-blue-600' : 'text-slate-900 dark:text-white'; ?>">Noticias</a>
				<a href="<?php echo home_url('/biblioteca'); ?>" class="text-2xl font-black uppercase tracking-tight hover:text-blue-600 transition-colors <?php echo is_page_template('page-biblioteca.php') ? 'text-blue-600' : 'text-slate-900 dark:text-white'; ?>">Biblioteca</a>
				<a href="<?php echo home_url('/ong'); ?>" class="text-2xl font-black uppercase tracking-tight hover:text-blue-600 transition-colors <?php echo is_page('ong') ? 'text-blue-600' : 'text-slate-900 dark:text-white'; ?>">ONG</a>
				<a href="<?php echo home_url('/multimedia'); ?>" class="text-2xl font-black uppercase tracking-tight hover:text-blue-600 transition-colors <?php echo is_page('multimedia') ? 'text-blue-600' : 'text-slate-900 dark:text-white'; ?>">Multimedia</a>
			</div>
		</div>
	</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
	/* Reusable Real-Time Search Engine */
	function setupRealTimeSearch(inputEl, resultsEl, containerEl, viewMoreEl) {
		if (!inputEl || !resultsEl || !containerEl || !viewMoreEl) return;
		var timer;
		
		inputEl.addEventListener('input', function() {
			clearTimeout(timer);
			var query = this.value.trim();
			
			if (query.length < 3) {
				resultsEl.classList.add('opacity-0', 'invisible');
				return;
			}

			viewMoreEl.href = '<?php echo home_url("/"); ?>?s=' + encodeURIComponent(query);

			timer = setTimeout(function() {
				var restUrl = '<?php echo esc_url( get_rest_url( null, "/wp/v2/posts" ) ); ?>';
				var sep = restUrl.includes('?') ? '&' : '?';
				fetch(restUrl + sep + 'search=' + encodeURIComponent(query) + '&_embed&per_page=5')
					.then(response => response.json())
					.then(posts => {
						containerEl.innerHTML = '';
						if (!Array.isArray(posts) || posts.length === 0) {
							containerEl.innerHTML = '<div class="p-4 text-center text-slate-500 text-sm">No se encontraron resultados</div>';
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
								containerEl.appendChild(div);
							});
						}
						resultsEl.classList.remove('opacity-0', 'invisible');
					});
			}, 300);
		});

		// Close results on escape
		inputEl.addEventListener('keydown', function(e) {
			if (e.key === 'Escape') {
				resultsEl.classList.add('opacity-0', 'invisible');
			}
		});
	}

	/* Search Toggles & Event Handling */
	var searchTrigger = document.getElementById('search-trigger');
	var searchInputContainer = document.getElementById('search-input-container');
	var searchInput = document.getElementById('search-input');
	var searchResults = document.getElementById('search-results');
	var resultsContainer = document.getElementById('results-container');
	var viewMore = document.getElementById('search-view-more');

	if (searchTrigger && searchInputContainer) {
		searchTrigger.addEventListener('click', function(e) {
			e.stopPropagation();
			var isOpen = searchInputContainer.classList.contains('search-open');
			if (!isOpen) {
				searchInputContainer.classList.add('search-open');
				if (searchInput) searchInput.focus();
			} else {
				searchInputContainer.classList.remove('search-open');
				if (searchResults) searchResults.classList.add('opacity-0', 'invisible');
			}
		});

		// Close search on click outside
		document.addEventListener('click', function(e) {
			if (!document.getElementById('real-time-search').contains(e.target) && !searchInputContainer.contains(e.target)) {
				if (searchResults) searchResults.classList.add('opacity-0', 'invisible');
				if (searchInput && searchInput.value === '') {
					searchInputContainer.classList.remove('search-open');
				}
			}
		});
	}

	/* Instantiate Real-Time Search for Header & Mobile Menu */
	setupRealTimeSearch(
		searchInput, 
		searchResults, 
		resultsContainer, 
		viewMore
	);

	setupRealTimeSearch(
		document.getElementById('mobile-search-input'),
		document.getElementById('mobile-search-results'),
		document.getElementById('mobile-results-container'),
		document.getElementById('mobile-search-view-more')
	);

	/* Close Mobile Search Dropdown on Click Outside */
	document.addEventListener('click', function(e) {
		var mobileSearchContainer = document.getElementById('mobile-search-container');
		var mobileResults = document.getElementById('mobile-search-results');
		if (mobileSearchContainer && mobileResults && !mobileSearchContainer.contains(e.target)) {
			mobileResults.classList.add('opacity-0', 'invisible');
		}
	});

	/* Dark Mode Toggle */
	var toggle = document.getElementById('dark-mode-toggle');
	if (toggle) {
		toggle.addEventListener('click', function() {
			document.documentElement.classList.toggle('dark');
			var isDark = document.documentElement.classList.contains('dark');
			localStorage.setItem('ovp-theme', isDark ? 'dark' : 'light');
		});
	}

	/* Mobile Menu Overlay Toggles */
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

	/* Nav Menu Link Styles */
	var navLinks = document.querySelectorAll('.nav-menu > ul > li > a');
	navLinks.forEach(function(link) {
		link.classList.add('text-slate-700', 'dark:text-slate-300', 'hover:text-blue-600', 'dark:hover:text-blue-400');
	});

	/* Sub-Menu Hover Overrides */
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
