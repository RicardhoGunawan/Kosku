<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Kosku - Tempat Kos Nyaman' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900">
    <!-- Header/Navigation -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-primary">Kosku</a>
            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="hover:text-primary">Beranda</a>
                <a href="{{ route('rooms') }}" class="hover:text-primary">Kamar</a>
                <a href="{{ route('gallery') }}" class="hover:text-primary">Galeri</a>
                <a href="{{ route('testimonials') }}" class="hover:text-primary">Testimoni</a>
                <a href="{{ route('about') }}" class="hover:text-primary">Tentang Kami</a>
                <a href="{{ route('contact') }}" class="hover:text-primary">Kontak</a>
            </nav>
            <button class="md:hidden">☰</button>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="mb-6 md:mb-0">
                    <h3 class="text-xl font-bold mb-4">Kosku</h3>
                    <p>Tempat kos nyaman dengan fasilitas lengkap dan harga terjangkau.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Kontak Kami</h3>
                    <p>Email: info@kosku.com</p>
                    <p>Telepon: +62 123 4567 890</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p>&copy; {{ date('Y') }} Kosku. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>