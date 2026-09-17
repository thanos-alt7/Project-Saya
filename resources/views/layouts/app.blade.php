<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    
    <!-- Memuat aset menggunakan Vite  -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>    
    <!-- Memanggil Navbar -->
    @include('partials.navbar')

    <!-- Ruang kosong yang akan digunakan untuk konten utama -->
    <main>
        @yield('content')
    </main>

    <!-- Memanggil Footer -->
    @include('partials.footer')
    
    @stack('scripts')

</body>
</html>