<!doctype html>
<html <?php language_attributes(); ?> class="dark">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class('antialiased animated-mesh min-h-screen'); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site flex flex-col">
    <!-- Top Alert Bar -->
    <div class="bg-ovp-darker text-ovp-accent text-[9px] py-1.5 uppercase tracking-[0.4em] font-black border-b border-white/5 text-center relative z-[110]">
        <span>Venezuela • Monitoreo Penitenciario Crítico 24/7 • Libertad y Justicia</span>
    </div>

	<header id="masthead" class="site-header fixed top-6 inset-x-0 z-[100] transition-all duration-500">
        <div class="container mx-auto px-4 md:px-6">
            <div class="glass-card bg-ovp-darker/60 border-white/5 px-6 py-3 flex justify-between items-center">
                <!-- Branding -->
                <div class="site-branding shrink-0">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="flex items-center gap-3 group">
                        <div class="w-9 h-9 bg-ovp-accent rounded-xl flex items-center justify-center font-black text-white text-lg shadow-lg shadow-ovp-accent/20 group-hover:scale-110 transition-transform">O</div>
                        <span class="text-lg font-black text-white tracking-tighter uppercase">OVP<span class="text-ovp-accent">.</span></span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav id="site-navigation" class="main-navigation hidden lg:block">
                    <div class="nav-menu">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary-menu',
                            'menu_id'        => 'primary-menu',
                            'container'      => false,
                            'fallback_cb'    => false,
                        ) );
                        ?>
                    </div>
                </nav>
                
                <!-- Action Tools -->
                <div class="flex items-center gap-3">
                    <!-- Search -->
                    <button class="p-2 text-slate-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                    <!-- Dark Mode Toggle -->
                    <button id="dark-mode-toggle" class="p-2.5 rounded-xl bg-white/5 text-slate-400 hover:text-white transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    </button>
                    <!-- Mobile Toggle -->
                    <button id="mobile-menu-trigger" class="lg:hidden p-2 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu-overlay" class="fixed inset-0 bg-ovp-darker/95 backdrop-blur-2xl z-[120] opacity-0 invisible transition-all duration-500 lg:hidden">
            <div class="p-8">
                <button id="mobile-menu-close" class="absolute top-8 right-8 text-white">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
                <div class="mt-20">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary-menu',
                        'container'      => false,
                        'menu_class'     => 'flex flex-col gap-8 text-2xl font-black uppercase tracking-tighter text-white',
                    ) );
                    ?>
                </div>
            </div>
        </div>
	</header>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const trigger = document.getElementById('mobile-menu-trigger');
        const close = document.getElementById('mobile-menu-close');
        const overlay = document.getElementById('mobile-menu-overlay');

        trigger?.addEventListener('click', () => {
            overlay.classList.remove('opacity-0', 'invisible');
        });

        close?.addEventListener('click', () => {
            overlay.classList.add('opacity-0', 'invisible');
        });
    });
    </script>
