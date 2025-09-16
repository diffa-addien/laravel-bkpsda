<x-app-layout>
    {{-- Header Halaman --}}
    <div class="bg-gray-200 pt-32 pb-16">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-bold text-gray-800">{{ $laman->judul }}</h1>
        </div>
    </div>

    {{-- Konten Utama --}}
    <div class="py-16">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
                <div class="prose max-w-none">
                    {!! $laman->isi !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>