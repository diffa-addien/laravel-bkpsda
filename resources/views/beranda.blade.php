<x-app-layout>

    {{-- HERO SECTION (REVISED WITH PARALLAX) --}}
    <section class="relative h-screen overflow-hidden" x-data="{ 
             activeSlide: 0, 
             slides: [
                 'https://images.unsplash.com/photo-1755004609094-1d91b019aaa2?q=80&w=434&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', // Gambar contoh 1
                 'https://images.unsplash.com/photo-1754597302822-4b96f3442d3f?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', // Gambar contoh 2
                 'https://images.unsplash.com/photo-1533088734020-f5cd2d192134?q=80&w=2070&auto=format&fit=crop'  // Gambar contoh 3
             ],
             parallaxOffset: 0, // State baru untuk parallax
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
         }" x-init="startAutoplay()" @mouseenter="stopAutoplay()" @mouseleave="startAutoplay()"
        @scroll.window="parallaxOffset = window.scrollY * 0.4"> {{-- Listener untuk update posisi parallax --}}

        {{-- Slider Images --}}
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index" x-transition:enter="transition ease-out duration-1000"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="absolute inset-0 bg-cover bg-center" {{-- Style diupdate
                dengan transform untuk parallax --}}
                :style="`background-image: url('${slide}'); transform: scale(1.2) translateY(${parallaxOffset}px);`">
            </div>
        </template>

        {{-- Overlay (Unchanged) --}}
        <div class="absolute inset-0 bg-black opacity-40"></div>

        {{-- Main Content of Hero Section (Unchanged) --}}
        <div class="relative z-10 flex flex-col justify-end h-full container mx-auto px-6 py-10 text-white">

            {{-- LAYANAN ICONS (Unchanged) --}}
            <div class="w-full grid grid-cols-4 sm:grid-cols-4 md:grid-cols-7 gap-4 lg:gap-6">
                <div
                    class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                    <div class="text-2xl text-white mb-2"><i class="fa-solid fa-building"></i></div>
                    <span class="text-white text-xs text-center font-medium">Sekretariat</span>
                </div>
                <div
                    class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                    <div class="text-2xl text-white mb-2"><i class="fa-solid fa-person-digging"></i></div>
                    <span class="text-white text-xs text-center font-medium">Mutasi & Promosi</span>
                </div>
                <div
                    class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                    <div class="text-2xl text-white mb-2"><i class="fa-solid fa-book"></i></div>
                    <span class="text-white text-xs text-center font-medium">Diklat & Kompetensi</span>
                </div>
                <div
                    class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                    <div class="text-2xl text-white mb-2"><i class="fa-solid fa-gear"></i></div>
                    <span class="text-white text-xs text-center font-medium">Data & Informasi</span>
                </div>
                <div
                    class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                    <div class="text-2xl text-white mb-2"><i class="fa-solid fa-people-group"></i></div>
                    <span class="text-white text-xs text-center font-medium">Pengadaan Pegawai</span>
                </div>
                <div
                    class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                    <div class="text-2xl text-white mb-2"><i class="fa-solid fa-laptop-code"></i></div>
                    <span class="text-white text-xs text-center font-medium">e-Kinerja</span>
                </div>
                <div
                    class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                    <div class="text-2xl text-white mb-2"><i class="fa-solid fa-chart-line"></i></div>
                    <span class="text-white text-xs text-center font-medium">Kesejahteraan</span>
                </div>
            </div>
        </div>

        {{-- Slider Navigation Buttons (Unchanged) --}}
        <button @click="prev()"
            class="absolute left-4 top-1/2 -translate-y-1/2 text-2xl md:text-4xl text-white p-2 rounded-full bg-black bg-opacity-30 hover:bg-opacity-50 transition-all duration-300">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button @click="next()"
            class="absolute right-4 top-1/2 -translate-y-1/2 text-2xl md:text-4xl text-white p-2 rounded-full bg-black bg-opacity-30 hover:bg-opacity-50 transition-all duration-300">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </section>

    {{-- BERITA TERBARU SECTION (REVISED LAYOUT) --}}
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-2 text-gray-800 text-center">Berita Terkini Kabupaten Halmahera Timur</h2>
            <div class="h-1 w-20 bg-govRed mx-auto mb-10"></div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- KIRI: Berita Utama -->
                <div
                    class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1635961726947-0f821cf9ba28?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3"
                        alt="Berita Utama" class="w-full h-72 object-cover">
                    <div class="p-6">
                        <span class="text-gray-500 text-sm block mb-2"><i class="fa-regular fa-calendar-alt mr-1"></i>
                            09 September 2025</span>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">BKD Kabupaten Halmahera Timur Adakan Sesi
                            Berbagi Kebijakan BKN tentang Gelar ASN, Uji Kompetensi, dan Kenaikan Pangkat</h3>
                        <p class="text-gray-600 text-base mb-4 line-clamp-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <a href="#" class="text-govRed hover:underline font-semibold">Baca Selengkapnya <i
                                class="fa-solid fa-arrow-right ml-2"></i></a>
                    </div>
                </div>

                <!-- KANAN: Daftar Berita Lainnya dengan Efek Layered Cards -->
                <div class="relative pl-6">
                    <!-- Card Lapis Bawah (Dekoratif) -->
                    <div
                        class="absolute inset-0 bg-white rounded-lg shadow-md transform translate-x-3 translate-y-6 h-[calc(100%-2rem)] opacity-60">
                    </div>

                    <!-- Card Utama (Berita List) -->
                    <div class="relative bg-white rounded-lg shadow-lg p-6">
                        <!-- Item Berita 1 -->
                        <a href="#" class="flex items-start mb-6 group">
                            <img src="https://images.unsplash.com/photo-1534483754970-1372c057639e?q=80&w=2070&auto=format&fit=crop"
                                alt="Berita Kecil 1" class="w-24 h-16 object-cover rounded mr-4 flex-shrink-0">
                            <div>
                                <span
                                    class="text-gray-500 text-xs block mb-1 group-hover:text-govRed transition-colors duration-200"><i
                                        class="fa-regular fa-clock mr-1"></i> 27 Agustus 2025</span>
                                <h4
                                    class="text-base font-semibold text-gray-800 group-hover:text-govRed transition-colors duration-200">
                                    Seleksi Kompetensi Kepala Bagian Umum Universitas Tidar di BKD Kabupaten Halmahera
                                    Timur</h4>
                            </div>
                        </a>

                        <!-- Item Berita 2 -->
                        <a href="#" class="flex items-start mb-6 group">
                            <img src="https://images.unsplash.com/photo-1544372957-2e21b777a8b3?q=80&w=2070&auto=format&fit=crop"
                                alt="Berita Kecil 2" class="w-24 h-16 object-cover rounded mr-4 flex-shrink-0">
                            <div>
                                <span
                                    class="text-gray-500 text-xs block mb-1 group-hover:text-govRed transition-colors duration-200"><i
                                        class="fa-regular fa-clock mr-1"></i> 26 Agustus 2025</span>
                                <h4
                                    class="text-base font-semibold text-gray-800 group-hover:text-govRed transition-colors duration-200">
                                    Dukung Survei Penilaian Integritas Kabupaten Halmahera Timur 2025</h4>
                            </div>
                        </a>

                        <!-- Item Berita 3 -->
                        <a href="#" class="flex items-start mb-6 group">
                            <img src="https://images.unsplash.com/photo-1502086223501-7ee58882173e?q=80&w=2070&auto=format&fit=crop"
                                alt="Berita Kecil 3" class="w-24 h-16 object-cover rounded mr-4 flex-shrink-0">
                            <div>
                                <span
                                    class="text-gray-500 text-xs block mb-1 group-hover:text-govRed transition-colors duration-200"><i
                                        class="fa-regular fa-clock mr-1"></i> 26 Agustus 2025</span>
                                <h4
                                    class="text-base font-semibold text-gray-800 group-hover:text-govRed transition-colors duration-200">
                                    BKD Kabupaten Halmahera Timur Sosialisasikan Pengisian Survei Penilaian Integritas
                                    (SPI) 2025</h4>
                            </div>
                        </a>

                        <!-- Link Selengkapnya -->
                        <div class="mt-4 text-right">
                            <a href="#" class="text-govRed hover:underline font-semibold">Selengkapnya <i
                                    class="fa-solid fa-arrow-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>