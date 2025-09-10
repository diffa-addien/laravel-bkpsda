<x-app-layout>
    <div class="bg-gray-800 text-white pt-32 pb-16">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-bold leading-tight">{{ $berita->judul }}</h1>
            <div class="mt-4 text-gray-300">
                <span><i class="fa-solid fa-user mr-2"></i>{{ $berita->author->name }}</span>
                <span class="mx-3">|</span>
                <span><i class="fa-solid fa-calendar-alt mr-2"></i>{{ $berita->published_at->format('d F Y') }}</span>
            </div>
        </div>
    </div>

    <div class="py-16">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                {{-- Tampilkan gambar pertama sebagai gambar utama --}}
                @if($berita->hasMedia('berita_images'))
                    <img src="{{ $berita->getFirstMediaUrl('berita_images') }}" alt="{{ $berita->judul }}" class="w-full h-auto rounded-lg shadow-lg mb-8">
                @endif
                
                {{-- Isi berita dari Rich Editor --}}
                <div class="prose max-w-none">
                    {!! $berita->isi_berita !!}
                </div>

                {{-- Galeri untuk gambar-gambar lainnya --}}
                @if($berita->getMedia('berita_images')->count() > 1)
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold mb-4">Galeri Foto</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($berita->getMedia('berita_images')->skip(1) as $media)
                                <a href="{{ $media->getUrl() }}" data-fancybox="gallery">
                                    <img src="{{ $media->getUrl() }}" class="rounded-lg shadow-md w-full h-full object-cover">
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="mt-12">
                    <a href="{{ route('berita.index') }}" class="text-govRed hover:underline font-semibold"><i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Arsip Berita</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>