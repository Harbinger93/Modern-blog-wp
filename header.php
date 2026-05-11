<!doctype html>
<html <?php language_attributes(); ?> class="dark">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
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

<div id="page" class="site flex flex-col min-h-screen">

	<header id="masthead" class="site-header fixed top-0 inset-x-0 z-[100]">
		<div class="container mx-auto px-4 md:px-6 py-3">
			<div class="bg-white/80 dark:bg-[#0a1628]/80 backdrop-blur-xl border border-slate-200/60 dark:border-white/10 rounded-2xl px-6 py-2.5 flex justify-between items-center shadow-lg shadow-black/5 dark:shadow-black/30">

				<!-- Branding -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="flex items-center gap-2.5 shrink-0 group">
					<div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center font-black text-white text-base shadow-md shadow-blue-600/30 group-hover:scale-110 transition-transform">O</div>
					<span class="text-lg font-black text-slate-900 dark:text-white tracking-tight">OVP</span>
				</a>

				<!-- Desktop Navigation -->
				<nav id="site-navigation" class="main-navigation hidden lg:block">
					<div class="nav-menu">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'container'      => false,
							'fallback_cb'    => false,
						) );
						?>
					</div>
				</nav>

				<!-- Tools -->
				<div class="flex items-center gap-2">
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
			<div class="flex justify-end p-6">
				<button id="mobile-menu-close" class="p-3 rounded-xl bg-slate-100 dark:bg-white/10 text-slate-900 dark:text-white">
					<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
				</button>
			</div>
			<div class="flex-1 flex items-center justify-center p-8">
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
