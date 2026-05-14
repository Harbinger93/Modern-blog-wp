<?php
/**
 * Template part for displaying Instagram feed as a slider (Premium style)
 */
?>

<section class="py-20 bg-slate-50 dark:bg-[#030810] border-t border-slate-200 dark:border-white/5 overflow-hidden">
    <div class="container mx-auto px-6 mb-12">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-yellow-400 via-red-500 to-purple-600 p-0.5">
                    <div class="w-full h-full rounded-full bg-white dark:bg-[#050b18] p-0.5">
                        <img src="https://oveprisiones.com/wp-content/uploads/2016/09/logo-e1473295394529.png" class="w-full h-full rounded-full object-cover" alt="OVP Instagram">
                    </div>
                </div>
                <div>
                    <h3 class="font-black text-slate-900 dark:text-white leading-none">@oveprisiones</h3>
                    <p class="text-xs text-slate-500 mt-1">Sigue nuestra labor diaria</p>
                </div>
            </div>
            <a href="https://www.instagram.com/oveprisiones/" target="_blank" class="px-8 py-2.5 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-full text-xs font-black hover:bg-slate-50 dark:hover:bg-white/10 transition-all shadow-sm">SEGUIR EN INSTAGRAM</a>
        </div>
    </div>

    <div class="relative group/insta-slider">
        <!-- Slider Container -->
        <div id="insta-slider" class="flex overflow-x-auto snap-x snap-mandatory no-scrollbar scroll-smooth">
            <?php
            // Specific OVP Instagram Posts
            $insta_posts = array(
                array('id' => 1, 'img' => 'https://oveprisiones.com/wp-content/uploads/2026/05/Rodeo-I-OVP2.jpeg', 'caption' => 'Situación en Rodeo I. Monitoreo constante de los centros penitenciarios.'),
                array('id' => 2, 'img' => 'https://oveprisiones.com/wp-content/uploads/2026/05/image-1.jpg', 'caption' => 'Defensa técnica y acompañamiento a familiares.'),
                array('id' => 3, 'img' => 'https://oveprisiones.com/wp-content/uploads/2026/04/Copy-of-IMG_4095.jpg', 'caption' => 'Documentación de casos de violaciones a los DDHH.'),
                array('id' => 4, 'img' => 'https://oveprisiones.com/wp-content/uploads/2025/02/Tocoron.jpeg', 'caption' => 'Informe sobre la intervención en Tocorón.'),
                array('id' => 5, 'img' => 'https://oveprisiones.com/wp-content/uploads/2025/08/Restricciones-en-los-calabozos-del-Helicoide-ponen-en-grave-riesgo-la-salud-de-presos-politicos.jpeg', 'caption' => 'Grave riesgo a la salud de presos políticos en el Helicoide.'),
                array('id' => 6, 'img' => 'https://oveprisiones.com/wp-content/uploads/2023/11/Intervencion-en-carcel-de-Trujillo.jpeg', 'caption' => 'Intervención en la cárcel de Trujillo: Seguimiento de OVP.'),
            );

            foreach ($insta_posts as $post) : ?>
                <div class="flex-none w-1/2 md:w-1/3 lg:w-1/5 snap-start aspect-square relative cursor-pointer overflow-hidden border-r border-black/10 dark:border-white/5" 
                     onclick="openInstaModal('<?php echo $post['img']; ?>', '<?php echo addslashes($post['caption']); ?>')">
                    <img src="<?php echo $post['img']; ?>" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" alt="Insta">
                    <div class="absolute inset-0 bg-black/40 opacity-0 hover:opacity-100 transition-opacity flex items-center justify-center text-white font-bold text-sm gap-4">
                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg> 2k</span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Navigation Arrows -->
        <button onclick="scrollInsta(-1)" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-black/50 hover:bg-black/80 text-white rounded-full flex items-center justify-center opacity-0 group-hover/insta-slider:opacity-100 transition-opacity z-10 backdrop-blur-sm">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button onclick="scrollInsta(1)" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-black/50 hover:bg-black/80 text-white rounded-full flex items-center justify-center opacity-0 group-hover/insta-slider:opacity-100 transition-opacity z-10 backdrop-blur-sm">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
        </button>
    </div>
</section>

<!-- Reuse Modal from previous version or keep here -->
<div id="insta-modal" class="fixed inset-0 z-[300] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/90 backdrop-blur-md" onclick="closeInstaModal()"></div>
    <div class="relative bg-white dark:bg-[#0d1b32] w-full max-w-5xl rounded-[2.5rem] overflow-hidden shadow-2xl flex flex-col md:flex-row h-[80vh] md:h-auto">
        <div class="md:w-3/5 bg-black flex items-center justify-center">
            <img id="insta-modal-img" src="" class="max-w-full max-h-[80vh] object-contain">
        </div>
        <div class="md:w-2/5 p-8 flex flex-col">
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-3">
                    <img src="https://oveprisiones.com/wp-content/uploads/2016/09/logo-e1473295394529.png" class="w-10 h-10 rounded-full">
                    <span class="font-bold dark:text-white">oveprisiones</span>
                </div>
                <button onclick="closeInstaModal()" class="p-2 hover:bg-slate-100 dark:hover:bg-white/10 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <p id="insta-modal-caption" class="text-slate-700 dark:text-slate-300 leading-relaxed"></p>
        </div>
    </div>
</div>

<style>
.no-scrollbar::-webkit-scrollbar { display: none; }
.no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<script>
function scrollInsta(direction) {
    const slider = document.getElementById('insta-slider');
    const scrollAmount = slider.offsetWidth / 2;
    slider.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
}

function openInstaModal(img, caption) {
    const modal = document.getElementById('insta-modal');
    document.getElementById('insta-modal-img').src = img;
    document.getElementById('insta-modal-caption').innerText = caption;
    modal.classList.remove('hidden');
    setTimeout(() => modal.classList.add('opacity-100'), 10);
    document.body.style.overflow = 'hidden';
}

function closeInstaModal() {
    const modal = document.getElementById('insta-modal');
    modal.classList.remove('opacity-100');
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }, 300);
}
</script>
