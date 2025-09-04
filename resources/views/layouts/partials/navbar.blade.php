<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
     :class="{ 'bg-govRed shadow-lg': scrolled, 'bg-transparent': !scrolled }">
    <div class="container mx-auto px-6 py-2"> {{-- Padding vertikal (py) dikurangi sedikit --}}
        <div class="flex items-center justify-between">
            
            {{-- Logo dan Teks Dua Baris --}}
            <a href="/" class="flex items-center space-x-3">
                {{-- Ganti 'logo.png' jika nama file Anda berbeda --}}
                <img src="{{ url('assets/logo_haltim.png') }}" alt="Logo BKPSDM" class="h-12"> 
                <div class="text-white">
                    <span class="block text-md font-bold leading-tight">BKPSDM</span>
                    <span class="block text-sm leading-tight">Kabupaten Halmahera Timur</span>
                </div>
            </a>

            {{-- Menu (Desktop) --}}
            <div class="hidden md:flex space-x-6 text-white">
                <a href="#" class="hover:text-govAmber">Beranda</a>
                <a href="#" class="hover:text-govAmber">Profil</a>
                <a href="#" class="hover:text-govAmber">Berita</a>
                <a href="#" class="hover:text-govAmber">Unduhan</a>
                <a href="#" class="hover:text-govAmber">Kontak</a>
            </div>

            {{-- Tombol Menu (Mobile) --}}
            <div class="md:hidden">
                <button class="text-white focus:outline-none">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</nav>