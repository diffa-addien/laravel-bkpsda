<x-app-layout>
    <div class="bg-gray-200 pt-32 pb-16">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-bold text-gray-800">Arsip Berita</h1>
            <p class="text-gray-600">Informasi dan kegiatan terbaru dari BKPSDM Halmahera Timur</p>
        </div>
    </div>

    <div class="py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($beritas as $berita)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                        <a href="{{ route('berita.show', $berita) }}">
                            <img src="{{ $berita->getFirstMediaUrl('berita_images') ?: 'https://via.placeholder.com/800x600' }}" alt="{{ $berita->judul }}" class="w-full h-48 object-cover">
                        </a>
                        <div class="p-6">
                            <span class="text-gray-500 text-sm block mb-2"><i class="fa-regular fa-calendar-alt mr-1"></i> {{ $berita->published_at->format('d F Y') }}</span>
                            <h3 class="text-lg font-bold text-gray-800 mb-2 h-20 overflow-hidden">
                                <a href="{{ route('berita.show', $berita) }}" class="hover:text-govRed">{{ $berita->judul }}</a>
                            </h3>
                            <a href="{{ route('berita.show', $berita) }}" class="text-govRed hover:underline font-semibold">Baca Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i></a>
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">Belum ada berita yang dipublikasikan.</p>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $beritas->links() }}
            </div>
        </div>
    </div>
</x-app-layout>