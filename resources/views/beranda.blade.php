<x-app-layout>

    {{-- HERO SECTION (REVISED) --}}
    <section class="relative h-screen overflow-hidden" 
             x-data="{ 
                 activeSlide: 0, 
                 slides: [
                     'https://images.unsplash.com/photo-1519010470956-6d877008eaa4?q=80&w=2070&auto=format&fit=crop', // Gambar contoh 1
                     'https://images.unsplash.com/photo-1756814879165-d2eb1606c3c0?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', // Gambar contoh 2
                     'https://images.unsplash.com/photo-1533088734020-f5cd2d192134?q=80&w=2070&auto=format&fit=crop'  // Gambar contoh 3
                 ],
                 next() {
                     this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                 },
                 prev() {
                     this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
                 },
                 autoplayInterval: null,
                 startAutoplay() {
                     this.autoplayInterval = setInterval(() => { this.next(); }, 5000);
                 },
                 stopAutoplay() {
                     clearInterval(this.autoplayInterval);
                 }
             }"
             x-init="startAutoplay()"
             @mouseenter="stopAutoplay()"
             @mouseleave="startAutoplay()">

        {{-- Slider Images --}}
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index" 
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-1000"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 bg-cover bg-center"
                 :style="`background-image: url('${slide}')`">
            </div>
        </template>

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-black opacity-40"></div>

        {{-- Main Content of Hero Section (Text is removed, container pushes content to bottom) --}}
        <div class="relative z-10 flex flex-col justify-end h-full container mx-auto px-6 py-10 text-white">
            
            {{-- LAYANAN ICONS (ICON SMALLER, WITH TEXT) --}}
            <div class="w-full grid grid-cols-4 sm:grid-cols-4 md:grid-cols-7 gap-4 lg:gap-6">
                {{-- Style baru: flex-col untuk menumpuk ikon dan teks secara vertikal --}}
                <div class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                    <div class="text-2xl text-white mb-2"><i class="fa-solid fa-building"></i></div>
                    <span class="text-white text-xs text-center font-medium">Sekretariat</span>
                </div>
                <div class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                    <div class="text-2xl text-white mb-2"><i class="fa-solid fa-person-digging"></i></div>
                    <span class="text-white text-xs text-center font-medium">Mutasi & Promosi</span>
                </div>
                <div class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                    <div class="text-2xl text-white mb-2"><i class="fa-solid fa-book"></i></div>
                    <span class="text-white text-xs text-center font-medium">Diklat & Kompetensi</span>
                </div>
                <div class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                    <div class="text-2xl text-white mb-2"><i class="fa-solid fa-gear"></i></div>
                    <span class="text-white text-xs text-center font-medium">Data & Informasi</span>
                </div>
                <div class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                    <div class="text-2xl text-white mb-2"><i class="fa-solid fa-people-group"></i></div>
                    <span class="text-white text-xs text-center font-medium">Pengadaan Pegawai</span>
                </div>
                <div class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                    <div class="text-2xl text-white mb-2"><i class="fa-solid fa-laptop-code"></i></div>
                    <span class="text-white text-xs text-center font-medium">e-Kinerja</span>
                </div>
                <div class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                    <div class="text-2xl text-white mb-2"><i class="fa-solid fa-chart-line"></i></div>
                    <span class="text-white text-xs text-center font-medium">Kesejahteraan</span>
                </div>
            </div>
        </div>

        {{-- Slider Navigation Buttons (Unchanged) --}}
        <button @click="prev()" class="absolute left-0 top-1/2 -translate-y-1/2 text-xl md:text-2xl text-white p-4 ps-6 bg-black bg-opacity-40 hover:bg-opacity-60 transition-all duration-300">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button @click="next()" class="absolute right-0 top-1/2 -translate-y-1/2 text-xl md:text-2xl text-white p-4 pe-6 bg-black bg-opacity-40 hover:bg-opacity-60 transition-all duration-300">
            <i class="fa-solid fa-chevron-right"></i>
        </button>

    </section>

    {{-- BERITA TERBARU SECTION (Unchanged) --}}
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-2 text-gray-800">Berita Terkini</h2>
            <div class="h-1 w-20 bg-govRed mx-auto mb-10"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Contoh Berita 1 --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1546768292-fb1413155700?q=80&w=2070&auto=format&fit=crop" alt="Berita 1" class="w-full h-48 object-cover">
                    <div class="p-6 text-left">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Pemberian Penghargaan ASN Teladan</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <a href="#" class="text-govRed hover:underline font-semibold">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                {{-- Contoh Berita 2 --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1534483754970-1372c057639e?q=80&w=2070&auto=format&fit=crop" alt="Berita 2" class="w-full h-48 object-cover">
                    <div class="p-6 text-left">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Workshop Peningkatan Kapasitas Pegawai</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <a href="#" class="text-govRed hover:underline font-semibold">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                {{-- Contoh Berita 3 --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1544372957-2e21b777a8b3?q=80&w=2070&auto=format&fit=crop" alt="Berita 3" class="w-full h-48 object-cover">
                    <div class="p-6 text-left">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Kunjungan Kerja BKN Regional</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                        <a href="#" class="text-govRed hover:underline font-semibold">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <button class="mt-10 px-8 py-3 bg-govRed text-white rounded-full hover:bg-opacity-90 transition-all duration-300">
                Lihat Semua Berita <i class="fa-solid fa-arrow-right ml-2"></i>
            </button>
        </div>
    </section>

</x-app-layout>