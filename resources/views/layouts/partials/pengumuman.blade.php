@if(isset($pengumumans) && $pengumumans->isNotEmpty())
    <style>
        /* Animasi untuk marquee */
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        .animate-marquee {
            animation: marquee 30s linear infinite;
        }
    </style>
    <section class="w-full bg-red-950 text-white h-8 flex items-center">
        <div class="container mx-auto px-6 flex items-center">
            <span class="font-bold text-md mr-4 flex-shrink-0"><i class="fa-solid fa-bullhorn text-lg mr-2"></i> Pengumuman</span>
            <div class="overflow-x-hidden flex-grow">
                <div class="whitespace-nowrap animate-marquee">
                    @foreach($pengumumans as $pengumuman)
                        <span class="mx-4">
                            <i class="fa-solid fa-star-of-life text-xs mr-2 text-govAmber"></i>
                            {{ $pengumuman }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif