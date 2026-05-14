<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package ovp-theme
 */

get_header(); ?>

<style>
    /* Clean and Focused 404 UI */
    .error404 #colophon,
    .error404 section:has(#insta-slider) {
        display: none !important;
    }

    .bg-404-premium {
        background-color: #050b18;
        background-image:
            radial-gradient(at 0% 0%, rgba(37, 99, 235, 0.15) 0px, transparent 50%),
            radial-gradient(at 100% 100%, rgba(30, 64, 175, 0.1) 0px, transparent 50%),
            url('<?php echo MODERN_BLOG_URI; ?>/assets/media/404-bg.png');
        background-size: cover;
        background-position: center;
        background-blend-mode: overlay;
    }

    .glass-search {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .text-glow {
        text-shadow: 0 0 30px rgba(37, 99, 235, 0.3);
    }
</style>

<main id="primary"
    class="site-main flex-1 flex flex-col items-center justify-center relative overflow-hidden bg-404-premium min-h-screen text-white text-center px-6">

    <!-- Top Padding for Fixed Header -->
    <div class="h-24"></div>

    <div class="max-w-4xl w-full flex flex-col items-center">

        <!-- Large 404 with Subtle Effect -->
        <div class="relative mb-12">
            <span
                class="text-[10rem] md:text-[15rem] font-black leading-none opacity-10 tracking-tighter select-none">404</span>
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-4xl md:text-6xl font-black tracking-tight text-glow">Página no encontrada</h1>
            </div>
        </div>

        <p class="text-lg md:text-xl text-slate-400 max-w-xl mx-auto mb-12 font-medium leading-relaxed">
            Lo sentimos, el contenido que buscas no está disponible.
            Utiliza el buscador o vuelve a la página principal.
        </p>

        <!-- Search Bar -->
        <div class="w-full max-w-lg mb-12 relative" id="real-time-search-404">
            <div class="relative group">
                <input type="text" id="search-input-404"
                    class="w-full glass-search rounded-2xl px-6 py-4 pl-14 text-white outline-none focus:ring-2 ring-blue-500/50 transition-all text-lg placeholder-slate-500"
                    placeholder="¿Qué estás buscando?">
                <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

            <!-- Real-time Results Dropdown -->
            <div id="search-results-404"
                class="absolute top-full left-0 right-0 mt-3 bg-[#0d1b32]/95 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden opacity-0 invisible transition-all z-[110] text-left">
                <div id="results-container-404" class="max-h-[300px] overflow-y-auto p-2"></div>
            </div>
        </div>

        <!-- Call to Action -->
        <a href="<?php echo home_url(); ?>"
            class="inline-flex items-center gap-3 px-8 py-4 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl transition-all shadow-lg shadow-blue-600/30 hover:-translate-y-1 active:translate-y-0 group">
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor"
                stroke-width="2" viewBox="0 0 24 24">
                <path d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            VOLVER AL INICIO
        </a>

    </div>

</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var searchInput = document.getElementById('search-input-404');
        var searchResults = document.getElementById('search-results-404');
        var resultsContainer = document.getElementById('results-container-404');
        var searchTimer;

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                clearTimeout(searchTimer);
                var query = this.value.trim();

                if (query.length < 3) {
                    searchResults.classList.add('opacity-0', 'invisible');
                    return;
                }

                searchTimer = setTimeout(function () {
                    var restUrl = '<?php echo esc_url(get_rest_url(null, "/wp/v2/posts")); ?>';
                    var sep = restUrl.includes('?') ? '&' : '?';
                    fetch(restUrl + sep + 'search=' + encodeURIComponent(query) + '&_embed&per_page=5')
                        .then(response => response.json())
                        .then(posts => {
                            resultsContainer.innerHTML = '';
                            if (!Array.isArray(posts) || posts.length === 0) {
                                resultsContainer.innerHTML = '<div class="p-4 text-center text-slate-400 text-sm italic">No se encontraron resultados</div>';
                            } else {
                                posts.forEach(post => {
                                    var thumb = post._embedded && post._embedded['wp:featuredmedia'] ? post._embedded['wp:featuredmedia'][0].source_url : '';
                                    var div = document.createElement('a');
                                    div.href = post.link;
                                    div.className = 'flex items-center gap-4 p-3 hover:bg-white/5 rounded-xl transition-colors group';
                                    div.innerHTML = `
                                    ${thumb ? `<img src="${thumb}" class="w-12 h-12 rounded-lg object-cover">` : `<div class="w-12 h-12 rounded-lg bg-blue-900/50 flex items-center justify-center text-blue-400 font-bold">OVP</div>`}
                                    <div class="min-w-0 flex-1">
                                        <h4 class="text-sm font-bold text-white truncate group-hover:text-blue-400">${post.title.rendered}</h4>
                                        <p class="text-[10px] text-slate-500 truncate">Hace un momento</p>
                                    </div>
                                `;
                                    resultsContainer.appendChild(div);
                                });
                            }
                            searchResults.classList.remove('opacity-0', 'invisible');
                        });
                }, 300);
            });

            document.addEventListener('click', function (e) {
                if (!document.getElementById('real-time-search-404').contains(e.target)) {
                    searchResults.classList.add('opacity-0', 'invisible');
                }
            });
        }
    });
</script>

<?php get_footer(); ?>