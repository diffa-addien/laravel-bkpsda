<x-app-layout>
    {{-- Header Halaman --}}
    <div class="bg-gray-200 pt-32 pb-16">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl font-bold text-gray-800">Bidang {{ $bidang->judul }}</h1>
        </div>
    </div>

    {{-- Konten Utama --}}
    <div class="py-16">
        <div class="container mx-auto px-6 text-center">

            <div class="mb-12">
                <span class="inline-block bg-govRed text-white text-lg font-semibold px-8 py-3 rounded">{{ strtoupper($bidang->judul) }}</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 max-w-4xl mx-auto">
                {{-- Sub Halaman 1 --}}
                @if($bidang->sub_halaman_1_judul)
                    <a href="{{ $bidang->sub_halaman_1_url ?? '#' }}" class="block group">
                        <div class="text-6xl text-govRed mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fa-solid fa-file-lines"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">{{ $bidang->sub_halaman_1_judul }}</h3>
                        <p class="text-gray-600">{{ $bidang->sub_halaman_1_deskripsi }}</p>
                    </a>
                @endif

                {{-- Sub Halaman 2 --}}
                @if($bidang->sub_halaman_2_judul)
                    <a href="{{ $bidang->sub_halaman_2_url ?? '#' }}" class="block group">
                        <div class="text-6xl text-govRed mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">{{ $bidang->sub_halaman_2_judul }}</h3>
                        <p class="text-gray-600">{{ $bidang->sub_halaman_2_deskripsi }}</p>
                    </a>
                @endif

                {{-- Sub Halaman 3 --}}
                @if($bidang->sub_halaman_3_judul)
                    <a href="{{ $bidang->sub_halaman_3_url ?? '#' }}" class="block group">
                        <div class="text-6xl text-govRed mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fa-solid fa-sitemap"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">{{ $bidang->sub_halaman_3_judul }}</h3>
                        <p class="text-gray-600">{{ $bidang->sub_halaman_3_deskripsi }}</p>
                    </a>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>