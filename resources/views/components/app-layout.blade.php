<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'BKPSDM Halmahera Timur' }}</title>

    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Alpine JS CDN --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Tailwind CSS CDN with Custom Config --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Menambahkan warna kustom sesuai tema
                        govRed: '#991b1b', // sama dengan red-800
                        govAmber: '#f59e0b' // sama dengan amber-500
                    }
                }
            }
        }
    </script>

</head>
<body class="bg-gray-100" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.scrollY > 50)">

    {{-- Memanggil partials untuk Navbar --}}
    @include('layouts.partials.navbar')

    {{-- Konten Utama Halaman --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Memanggil partials untuk Footer --}}
    @include('layouts.partials.footer')

</body>
</html>