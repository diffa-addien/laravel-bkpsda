<x-app-layout>

    {{-- HERO SECTION (REVISED WITH PARALLAX) --}}
    @php
        // Menyiapkan array URL gambar untuk Alpine.js dari Spatie
        $sliderImages = $sliders->map(function($slider) {
            return $slider->getFirstMediaUrl('sliders');
        });
    @endphp
    <section class="relative h-screen overflow-hidden" x-data="{ 
             activeSlide: 0, 
             slides: {{ $sliderImages->toJson() }},
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

            {{-- LAYANAN ICONS (TEXT UPDATED) --}}
            <div class="w-full grid grid-cols-4 sm:grid-cols-4 md:grid-cols-7 gap-4 lg:gap-6">
                {{-- Style: flex-col untuk menumpuk ikon dan teks secara vertikal --}}
                <a href="{{ route('bidang.show', 'sekretariat') }}" class="block">
                    <div class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                        <div class="text-2xl text-white mb-2"><i class="fa-solid fa-building"></i></div>
                        <span class="text-white text-xs text-center font-medium">Sekretariat</span>
                    </div>
                </a>
                <a href="{{ route('bidang.show', 'bidang-ppp') }}" class="block">
                    <div class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                        <div class="text-2xl text-white mb-2"><i class="fa-solid fa-person-digging"></i></div>
                        <span class="text-white text-xs text-center font-medium">Bidang PPP</span>
                    </div>
                </a>
                <a href="{{ route('bidang.show', 'bidang-mutasi') }}" class="block">
                    <div class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                        <div class="text-2xl text-white mb-2"><i class="fa-solid fa-book"></i></div>
                        <span class="text-white text-xs text-center font-medium">Bidang Mutasi</span>
                    </div>
                </a>
                <a href="{{ route('bidang.show', 'bidang-pkp') }}" class="block">
                    <div class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                        <div class="text-2xl text-white mb-2"><i class="fa-solid fa-gear"></i></div>
                        <span class="text-white text-xs text-center font-medium">Bidang PKP</span>
                    </div>
                </a>
                <a href="{{ route('bidang.show', 'bidang-inka') }}" class="block">
                    <div class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                        <div class="text-2xl text-white mb-2"><i class="fa-solid fa-people-group"></i></div>
                        <span class="text-white text-xs text-center font-medium">Bidang INKA</span>
                    </div>
                </a>
                <a href="{{ route('bidang.show', 'upenkom') }}" class="block">
                    <div class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                        <div class="text-2xl text-white mb-2"><i class="fa-solid fa-laptop-code"></i></div>
                        <span class="text-white text-xs text-center font-medium">Upenkom</span>
                    </div>
                </a>
                <a href="{{ route('bidang.show', 'ppid') }}" class="block">
                    <div class="p-3 rounded-lg shadow-lg bg-black bg-opacity-25 backdrop-blur-sm flex flex-col items-center justify-center cursor-pointer hover:bg-opacity-40 transition-all duration-300 aspect-square">
                        <div class="text-2xl text-white mb-2"><i class="fa-solid fa-chart-line"></i></div>
                        <span class="text-white text-xs text-center font-medium">PPID</span>
                    </div>
                </a>
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

    @if($pengumumans->isNotEmpty())
        <style>
            /* Animasi untuk marquee */
            @keyframes marquee {
                0% {
                    transform: translateX(100%);
                }

                100% {
                    transform: translateX(-100%);
                }
            }

            .animate-marquee {
                animation: marquee 30s linear infinite;
            }
        </style>
        <section class="bg-govRed py-3 text-white">
            <div class="container mx-auto px-6 flex items-center">
                <span class="font-bold text-lg mr-4 flex-shrink-0">PENGUMUMAN</span>
                <div class="overflow-x-hidden flex-grow">
                    <div class="whitespace-nowrap animate-marquee">
                        @foreach($pengumumans as $pengumuman)
                            <span class="mx-4">
                                <i class="fa-solid fa-star-of-life text-xs mr-2 text-govAmber"></i>
                                {{ $pengumuman }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- BERITA TERBARU SECTION (DINAMIS) --}}
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-2 text-gray-800 text-center">Berita Terkini</h2>
            <div class="h-1 w-20 bg-govRed mx-auto mb-10"></div>

            @if($beritas->isNotEmpty())
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @php
                    $beritaUtama = $beritas->first();
                    $beritaLainnya = $beritas->skip(1);
                @endphp

                {{-- KIRI: Berita Utama --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                    <a href="{{ route('berita.show', $beritaUtama) }}">
                        <img src="{{ $beritaUtama->getFirstMediaUrl('berita_images') ?: 'https://via.placeholder.com/800x600' }}" alt="{{ $beritaUtama->judul }}" class="w-full h-72 object-cover">
                    </a>
                    <div class="p-6">
                        <span class="text-gray-500 text-sm block mb-2"><i class="fa-regular fa-calendar-alt mr-1"></i> {{ $beritaUtama->published_at->format('d F Y') }}</span>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">
                            <a href="{{ route('berita.show', $beritaUtama) }}" class="hover:text-govRed">{{ $beritaUtama->judul }}</a>
                        </h3>
                        <p class="text-gray-600 text-base mb-4 line-clamp-3">
                            {{ Str::limit(strip_tags($beritaUtama->isi_berita), 200) }}
                        </p>
                        <a href="{{ route('berita.show', $beritaUtama) }}" class="text-govRed hover:underline font-semibold">Baca Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i></a>
                    </div>
                </div>

                {{-- KANAN: Daftar Berita Lainnya --}}
                <div class="relative pl-6">
                    <div class="absolute inset-0 bg-white rounded-lg shadow-md transform translate-x-3 translate-y-3 opacity-60"></div>
                    <div class="relative bg-white rounded-lg shadow-lg p-6">
                        @foreach ($beritaLainnya as $berita)
                        <a href="{{ route('berita.show', $berita) }}" class="flex items-start mb-6 group">
                            <img src="{{ $berita->getFirstMediaUrl('berita_images') ?: 'https://via.placeholder.com/150' }}" alt="{{ $berita->judul }}" class="w-24 h-16 object-cover rounded mr-4 flex-shrink-0">
                            <div>
                                <span class="text-gray-500 text-xs block mb-1 group-hover:text-govRed transition-colors duration-200"><i class="fa-regular fa-clock mr-1"></i> {{ $berita->published_at->format('d M Y') }}</span>
                                <h4 class="text-base font-semibold text-gray-800 group-hover:text-govRed transition-colors duration-200">{{ $berita->judul }}</h4>
                            </div>
                        </a>
                        @endforeach
                        
                        <div class="mt-4 text-right">
                            <a href="{{ route('berita.index') }}" class="text-govRed hover:underline font-semibold">Semua berita <i class="fa-solid fa-arrow-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <p class="text-center text-gray-500">Belum ada berita yang dipublikasikan.</p>
            @endif
        </div>
    </section>

</x-app-layout>