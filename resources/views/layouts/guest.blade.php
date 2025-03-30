<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? setting('site.name', 'Kosku - Tempat Kos Nyaman') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body class="font-sans antialiased text-gray-800 flex flex-col min-h-screen bg-gray-50">
    <!-- Header/Navigation -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    @if(setting('site.logo'))
                        <img src="{{ Storage::url(setting('site.logo')) }}" alt="{{ setting('site.name') }}" class="h-8">
                    @else
                        <span class="text-2xl font-extrabold text-primary">
                            <i class="fas fa-home text-primary"></i> {{ setting('site.name', 'Kosku') }}
                        </span>
                    @endif
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-house-user mr-1"></i> Beranda
                    </a>
                    <a href="{{ route('rooms') }}" class="nav-link {{ request()->routeIs('rooms') ? 'active' : '' }}">
                        <i class="fas fa-bed mr-1"></i> Kamar
                    </a>
                    <a href="{{ route('gallery') }}"
                        class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">
                        <i class="fas fa-images mr-1"></i> Galeri
                    </a>
                    <a href="{{ route('testimonials') }}"
                        class="nav-link {{ request()->routeIs('testimonials') ? 'active' : '' }}">
                        <i class="fas fa-comment mr-1"></i> Testimoni
                    </a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        <i class="fas fa-info-circle mr-1"></i> Tentang Kami
                    </a>
                    <a href="{{ route('contact') }}"
                        class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <i class="fas fa-envelope mr-1"></i> Kontak
                    </a>
                </nav>

                <!-- Call to Action Button -->
                <div class="hidden md:block">
                    <a href="#"
                        class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg transition-all duration-300 font-medium flex items-center">
                        <i class="fas fa-calendar-check mr-2"></i> Booking Sekarang
                    </a>
                </div>

                <!-- Mobile menu button -->
                <button id="mobile-menu-button" class="lg:hidden focus:outline-none">
                    <i class="fas fa-bars text-2xl text-primary"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="lg:hidden hidden mt-4 pb-2">
                <nav class="flex flex-col space-y-3">
                    <a href="{{ route('home') }}"
                        class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-house-user mr-2"></i> Beranda
                    </a>
                    <a href="{{ route('rooms') }}"
                        class="mobile-nav-link {{ request()->routeIs('rooms') ? 'active' : '' }}">
                        <i class="fas fa-bed mr-2"></i> Kamar
                    </a>
                    <a href="{{ route('gallery') }}"
                        class="mobile-nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">
                        <i class="fas fa-images mr-2"></i> Galeri
                    </a>
                    <a href="{{ route('testimonials') }}"
                        class="mobile-nav-link {{ request()->routeIs('testimonials') ? 'active' : '' }}">
                        <i class="fas fa-comment mr-2"></i> Testimoni
                    </a>
                    <a href="{{ route('about') }}"
                        class="mobile-nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        <i class="fas fa-info-circle mr-2"></i> Tentang Kami
                    </a>
                    <a href="{{ route('contact') }}"
                        class="mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <i class="fas fa-envelope mr-2"></i> Kontak
                    </a>
                    <a href="#"
                        class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg transition-all duration-300 font-medium text-center">
                        <i class="fas fa-calendar-check mr-2"></i> Booking Sekarang
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Newsletter Subscription
    <section class="bg-primary py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h3 class="text-2xl font-bold text-white mb-4">Dapatkan Penawaran Spesial</h3>
                <p class="text-white mb-6">Berlangganan newsletter kami untuk mendapatkan info promo dan diskon terbaru.
                </p>
                <form class="flex flex-col sm:flex-row gap-4 justify-center">
                    <input type="email" placeholder="Alamat email Anda"
                        class="px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary w-full sm:w-auto">
                    <button type="submit"
                        class="bg-secondary hover:bg-secondary-dark text-white px-6 py-3 rounded-lg transition-all duration-300 font-medium">
                        <i class="fas fa-paper-plane mr-2"></i> Berlangganan
                    </button>
                </form>
            </div>
        </div>
    </section> -->

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">{{ setting('site.name', 'Kosku') }}</h3>
                    <p class="mb-4">{{ setting('site.description') }}</p>
                    <div class="flex space-x-4">
                        @if(setting('social.facebook'))
                            <a href="https://facebook.com/{{ setting('social.facebook') }}" target="_blank"
                                class="text-white hover:text-primary transition-colors duration-300">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if(setting('social.instagram'))
                            <a href="https://instagram.com/{{ setting('social.instagram') }}" target="_blank"
                                class="text-white hover:text-primary transition-colors duration-300">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        @if(setting('social.twitter'))
                            <a href="https://twitter.com/{{ setting('social.twitter') }}" target="_blank"
                                class="text-white hover:text-primary transition-colors duration-300">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if(setting('social.whatsapp'))
                            <a href="https://wa.me/{{ setting('social.whatsapp') }}" target="_blank"
                                class="text-white hover:text-primary transition-colors duration-300">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Tautan</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}"
                                class="hover:text-primary transition-colors duration-300">Beranda</a></li>
                        <li><a href="{{ route('rooms') }}"
                                class="hover:text-primary transition-colors duration-300">Kamar</a></li>
                        <li><a href="{{ route('gallery') }}"
                                class="hover:text-primary transition-colors duration-300">Galeri</a></li>
                        <li><a href="{{ route('testimonials') }}"
                                class="hover:text-primary transition-colors duration-300">Testimoni</a></li>
                        <li><a href="{{ route('about') }}"
                                class="hover:text-primary transition-colors duration-300">Tentang Kami</a></li>
                        <li><a href="{{ route('contact') }}"
                                class="hover:text-primary transition-colors duration-300">Kontak</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Kontak Kami</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-primary"></i>
                            <span>Jl. Contoh No. 123, Kota, Indonesia</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-primary"></i>
                            <span>+62 123 4567 890</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-primary"></i>
                            <span>info@kosku.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock mr-3 text-primary"></i>
                            <span>Senin - Minggu: 08.00 - 21.00</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Lokasi Kami</h3>
                    <div class="bg-gray-700 p-2 rounded-lg h-40">
                        <!-- Placeholder for map -->
                        <div class="w-full h-full bg-gray-600 rounded flex items-center justify-center">
                            <span class="text-gray-400">Peta Lokasi</span>
                        </div>
                    </div>
                    <a href="https://maps.google.com" target="_blank"
                        class="inline-block mt-3 text-primary hover:underline">
                        <i class="fas fa-directions mr-1"></i> Petunjuk Arah
                    </a>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-10 pt-6 text-center">
                <p>&copy; {{ date('Y') }} Kosku. Hak Cipta Dilindungi.</p>
                <div class="mt-3">
                    <a href="#" class="text-gray-400 hover:text-primary mx-2 transition-colors duration-300">Kebijakan
                        Privasi</a>
                    <a href="#" class="text-gray-400 hover:text-primary mx-2 transition-colors duration-300">Syarat &
                        Ketentuan</a>
                    <a href="#" class="text-gray-400 hover:text-primary mx-2 transition-colors duration-300">FAQ</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <button id="back-to-top"
        class="fixed bottom-6 right-6 bg-primary hover:bg-primary-dark text-black rounded-full p-3 shadow-lg hidden transition-all duration-300">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Custom JS -->
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Back to top button
        window.addEventListener('scroll', function () {
            const backToTopButton = document.getElementById('back-to-top');
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('hidden');
            } else {
                backToTopButton.classList.add('hidden');
            }
        });

        document.getElementById('back-to-top').addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>

    <style>
        /* Custom styles */
        .nav-link {
            position: relative;
            padding: 0.5rem 0;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: theme('colors.primary');
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: theme('colors.primary');
            transition: width 0.3s;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .mobile-nav-link {
            display: block;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s;
        }

        .mobile-nav-link:hover,
        .mobile-nav-link.active {
            background-color: rgba(var(--color-primary-rgb), 0.1);
            color: theme('colors.primary');
        }
    </style>
</body>

</html>