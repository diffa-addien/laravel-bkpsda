{{-- Navbar sekarang menjadi bagian dari header, tidak lagi 'fixed' --}}
<nav class="w-full transition-all duration-300"
     :class="{ 'bg-govRed shadow-lg': scrolled || !isHomepage, 'bg-transparent': !scrolled && isHomepage }">
    
    <div class="container mx-auto px-6 transition-all duration-300"
         :class="(scrolled || !isHomepage) ? 'py-2' : 'py-4'">
        <div class="flex items-center justify-between">
            
            <a href="/" class="flex items-center space-x-3">
                <img src="{{ url('assets/logo_haltim.png') }}" alt="Logo BKPSDM" 
                     class="transition-all duration-300"
                     :class="(scrolled || !isHomepage) ? 'h-12' : 'h-16'">
                <div class="text-white">
                    <span class="block font-bold leading-tight transition-all duration-300"
                          :class="(scrolled || !isHomepage) ? 'text-md' : 'text-lg'">BKPSDM</span>
                    <span class="block leading-tight transition-all duration-300"
                          :class="(scrolled || !isHomepage) ? 'text-sm' : 'text-md'">Kabupaten Halmahera Timur</span>
                </div>
            </a>

            <div class="hidden md:flex space-x-6 text-white">
                <a href="/" class="hover:text-govAmber">Beranda</a>
                <a href="#" class="hover:text-govAmber">Profil</a>
                <a href="{{ route('berita.index') }}" class="hover:text-govAmber">Berita</a>
                <a href="#" class="hover:text-govAmber">Unduhan</a>
                <a href="#" class="hover:text-govAmber">Kontak</a>
            </div>

            <div class="md:hidden">
                <button class="text-white focus:outline-none">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</nav>