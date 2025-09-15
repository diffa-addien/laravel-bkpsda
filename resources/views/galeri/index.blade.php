<x-app-layout>
    {{-- Header Halaman --}}
    <div class="bg-gray-200 pt-32 pb-16">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-bold text-gray-800">Galeri Media</h1>
            <p class="text-gray-600">Dokumentasi visual kegiatan BKPSDM Halmahera Timur.</p>
        </div>
    </div>

    {{-- Konten Utama: Grid Gambar --}}
    <div class="py-16">
        <div class="container mx-auto px-6">
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @forelse ($mediaItems as $media)
                    <div class="group relative overflow-hidden rounded-lg shadow-md">
                        <a href="{{ $media->getUrl() }}" data-fancybox="gallery" data-caption="{{ $media->name }}">
                            <img src="{{ $media->getUrl() }}" 
                                 alt="{{ $media->name }}" 
                                 class="w-full h-full object-cover aspect-square transform transition-transform duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300"></div>
                        </a>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">Belum ada gambar yang diupload di Galeri atau Berita.</p>
                @endforelse
            </div>

            {{-- Paginasi --}}
            <div class="mt-12">
                {{ $mediaItems->links() }}
            </div>

        </div>
    </div>
</x-app-layout>