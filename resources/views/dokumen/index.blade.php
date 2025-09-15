<x-app-layout>
    {{-- Header Halaman --}}
    <div class="bg-gray-200 pt-32 pb-16">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-bold text-gray-800">Pusat Unduhan</h1>
            <p class="text-gray-600">Temukan dokumen, formulir, dan peraturan resmi di sini.</p>
        </div>
    </div>

    {{-- Konten Utama: Search dan List Dokumen --}}
    <div class="py-16">
        <div class="container mx-auto px-6">
            
            {{-- Form Pencarian --}}
            <form action="{{ route('dokumen.index') }}" method="GET" class="mb-12 max-w-lg mx-auto">
                <div class="relative">
                    <input type="text" name="search" placeholder="Cari dokumen..." 
                           class="w-full py-3 pl-4 pr-12 text-gray-700 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-govRed"
                           value="{{ request('search') }}">
                    <button type="submit" class="absolute top-0 right-0 h-full px-5 text-white bg-govRed rounded-r-full hover:bg-opacity-90">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </div>
            </form>

            {{-- Grid untuk Kartu Dokumen --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse ($dokumens as $dokumen)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center bg-red-100 text-govRed rounded-full mr-4">
                                    {{-- Ikon dinamis berdasarkan tipe file --}}
                                    @php
                                        $extension = pathinfo($dokumen->getFirstMedia('dokumen_file')->file_name, PATHINFO_EXTENSION);
                                        $icon = 'fa-solid fa-file'; // default icon
                                        if (in_array($extension, ['pdf'])) $icon = 'fa-solid fa-file-pdf';
                                        if (in_array($extension, ['doc', 'docx'])) $icon = 'fa-solid fa-file-word';
                                        if (in_array($extension, ['xls', 'xlsx'])) $icon = 'fa-solid fa-file-excel';
                                    @endphp
                                    <i class="{{ $icon }} text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 line-clamp-2">{{ $dokumen->judul }}</h3>
                            </div>
                            @if($dokumen->deskripsi)
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $dokumen->deskripsi }}</p>
                            @endif
                        </div>
                        <a href="{{ $dokumen->getFirstMediaUrl('dokumen_file') }}" target="_blank" 
                           class="mt-4 w-full text-center bg-govRed text-white py-2 rounded-lg hover:bg-opacity-90 transition-colors duration-300">
                            Unduh <i class="fa-solid fa-download ml-2"></i>
                        </a>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">
                        @if(request('search'))
                            Dokumen dengan kata kunci "{{ request('search') }}" tidak ditemukan.
                        @else
                            Belum ada dokumen yang dipublikasikan.
                        @endif
                    </p>
                @endforelse
            </div>

            {{-- Paginasi --}}
            <div class="mt-12">
                {{ $dokumens->links() }}
            </div>
        </div>
    </div>
</x-app-layout>