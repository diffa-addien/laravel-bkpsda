<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
     :class="{ 'bg-govRed shadow-lg': scrolled, 'bg-transparent': !scrolled }">
    <div class="container mx-auto px-6 transition-all duration-300"
         :class="scrolled ? 'py-2' : 'py-4'"> {{-- Padding vertikal dinamis --}}
        <div class="flex items-center justify-between">
            
            {{-- Logo dan Teks Dua Baris dengan Efek Shrink --}}
            <a href="/" class="flex items-center space-x-3">
                <img src="{{ url('assets/logo_haltim.png') }}" alt="Logo BKPSDM" 
                     class="transition-all duration-300"
                     :class="scrolled ? 'h-12' : 'h-16'"> {{-- Ukuran logo dinamis --}}
                <div class="text-white">
                    <span class="block font-bold leading-tight transition-all duration-300"
                          :class="scrolled ? 'text-md' : 'text-lg'">BKPSDM</span> {{-- Ukuran teks dinamis --}}
                    <span class="block leading-tight transition-all duration-300"
                          :class="scrolled ? 'text-sm' : 'text-md'">Kabupaten Halmahera Timur</span> {{-- Ukuran teks dinamis --}}
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