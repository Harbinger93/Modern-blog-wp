<!doctype html>
<html <?php language_attributes(); ?> class="dark">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class('antialiased selection:bg-ovp-accent selection:text-white'); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site min-h-screen flex flex-col bg-ovp-light dark:bg-ovp-dark transition-colors duration-300">
    <!-- Top Bar: Utility & Urgency -->
    <div class="bg-ovp-dark text-white/60 text-[10px] py-2 uppercase tracking-[0.3em] font-bold border-b border-white/5">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <span>Venezuela • Monitoreo Penitenciario 24/7</span>
            <div class="flex gap-4">
                <a href="#" class="hover:text-white transition-colors">Alertas</a>
                <a href="#" class="hover:text-white transition-colors">Donar</a>
            </div>
        </div>
    </div>

	<header id="masthead" class="site-header sticky top-0 z-[100] transition-all duration-300">
        <div class="mx-4 mt-4">
            <div class="container mx-auto glass-card border-white/10 px-6 py-4 flex justify-between items-center">
                <div class="site-branding">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="flex items-center gap-2 group">
                        <div class="w-10 h-10 bg-ovp-accent rounded-lg flex items-center justify-center font-black text-white text-xl group-hover:rotate-12 transition-transform">M</div>
                        <span class="text-xl font-black text-slate-900 dark:text-white tracking-tighter uppercase">Modern Blog<span class="text-ovp-accent">.</span></span>
                    </a>
                </div>

                <nav id="site-navigation" class="hidden lg:flex items-center gap-8">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'flex items-center gap-8 text-sm font-bold uppercase tracking-widest text-slate-600 dark:text-white/70',
                        'fallback_cb'    => false,
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ) );
                    ?>
                    
                    <!-- Search & Tools -->
                    <div class="flex items-center gap-4 pl-4 border-l border-slate-200 dark:border-white/10">
                        <button class="text-slate-500 dark:text-white/50 hover:text-ovp-accent transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </button>
                        <!-- Dark Mode Toggle -->
                        <button id="dark-mode-toggle" class="p-2 rounded-full bg-slate-100 dark:bg-white/5 text-slate-500 dark:text-white/50">
                            <svg class="w-4 h-4 dark:hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                            <svg class="w-4 h-4 hidden dark:block" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                </nav>

                <!-- Mobile Menu Button -->
                <button class="lg:hidden text-slate-900 dark:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </div>
	</header>
