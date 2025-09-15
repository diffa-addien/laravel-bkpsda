<nav class="w-full transition-all duration-300"
     :class="{ 'bg-govRed shadow-lg': scrolled || !isHomepage, 'bg-transparent': !scrolled && isHomepage }">
    
    @php
        $isHomepage = request()->is('/');
    @endphp

    <div class="container mx-auto px-6 transition-all duration-300"
         :class="(scrolled || !{{ json_encode($isHomepage) }}) ? 'py-2' : 'py-4'">
        <div class="flex items-center justify-between">
            
            <a href="/" class="flex items-center space-x-3">
                <img src="{{ url('assets/logo_haltim.png') }}" alt="Logo BKPSDM" 
                     class="transition-all duration-300"
                     :class="(scrolled || !{{ json_encode($isHomepage) }}) ? 'h-12' : 'h-16'">
                <div class="text-white">
                    <span class="block font-bold leading-tight transition-all duration-300"
                          :class="(scrolled || !{{ json_encode($isHomepage) }}) ? 'text-md' : 'text-lg'">BKPSDM</span>
                    <span class="block leading-tight transition-all duration-300"
                          :class="(scrolled || !{{ json_encode($isHomepage) }}) ? 'text-sm' : 'text-md'">Kabupaten Halmahera Timur</span>
                </div>
            </a>

            <div class="hidden md:flex space-x-6 text-white items-center">
                <a href="/" class="hover:text-govAmber">Beranda</a>
                
                {{-- [PERUBAHAN] Dropdown Profil --}}
                <div x-data="{ open: false }" class="relative">
                    <button @mouseover="open = true" @mouseleave="open = false" class="flex items-center hover:text-govAmber">
                        <span>Profil</span>
                        <i class="fa-solid fa-chevron-down text-xs ml-2"></i>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         @mouseover="open = true" @mouseleave="open = false"
                         class="absolute right-0 mt-2 w-56 bg-white rounded-md shadow-lg z-20" x-cloak>
                        
                        <div class="py-2">
                            @if($nav_profils->isNotEmpty())
                                @foreach ($nav_profils as $profil)
                                    <a href="{{ route('profil.show', $profil->slug) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-govRed">{{ $profil->judul }}</a>
                                @endforeach
                            @else
                                <span class="block px-4 py-2 text-sm text-gray-500">Belum ada halaman</span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <a href="{{ route('galeri.index') }}" class="hover:text-govAmber">Galeri</a>
                <a href="{{ route('berita.index') }}" class="hover:text-govAmber">Berita</a>
                <a href="{{ route('dokumen.index') }}" class="hover:text-govAmber">Unduhan</a>
                <!-- <a href="#" class="hover:text-govAmber">Kontak</a> -->
            </div>

            <div class="md:hidden">
                <button class="text-white focus:outline-none">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</nav>