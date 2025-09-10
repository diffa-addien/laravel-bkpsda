<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'BKPSDM Halmahera Timur' }}</title>

    {{-- CDN Styles & Scripts --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { govRed: '#991b1b', govAmber: '#f59e0b' } } } }
    </script>
</head>
<body class="bg-gray-100" 
      x-data="{ scrolled: false, isHomepage: {{ json_encode(request()->is('/')) }} }" 
      @scroll.window="scrolled = (window.scrollY > 50)">

    {{-- HEADER BLOCK YANG FIXED --}}
    <header class="fixed top-0 left-0 right-0 z-50 flex flex-col">
        {{-- Tampilkan pengumuman jika BUKAN halaman beranda --}}
        @if(!request()->is('/'))
            @include('layouts.partials.pengumuman')
        @endif

        {{-- Memanggil partials untuk Navbar --}}
        @include('layouts.partials.navbar')
    </header>

    {{-- Konten Utama Halaman --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Memanggil partials untuk Footer --}}
    @include('layouts.partials.footer')

</body>
</html>