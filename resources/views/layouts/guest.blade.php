<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? setting('site.name', 'Kosku - Tempat Kos Nyaman') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <meta name="description"
        content="{{ setting('site.description', 'Tempat kos nyaman dengan fasilitas lengkap dan harga terjangkau') }}">
    @livewireStyles
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</head>

<body class="font-poppins antialiased text-gray-800 flex flex-col min-h-screen bg-gray-50">
    <!-- Header/Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50 backdrop-blur-md bg-white/90">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                    @if(setting('site.logo'))
                        <img src="{{ Storage::url(setting('site.logo')) }}" alt="{{ setting('site.name') }}"
                            class="h-8 transition-transform group-hover:scale-105">
                    @else
                        <span class="text-2xl font-extrabold text-primary">
                            <i class="fas fa-home text-primary transition-colors group-hover:text-primary-dark"></i>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-primary-dark">
                                {{ setting('site.name', 'Kosku') }}
                            </span>
                        </span>
                    @endif
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-6">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-house-user mr-2"></i> Beranda
                    </a>
                    <a href="{{ route('rooms') }}" class="nav-link {{ request()->routeIs('rooms') ? 'active' : '' }}">
                        <i class="fas fa-bed mr-2"></i> Kamar
                    </a>
                    <a href="{{ route('gallery') }}"
                        class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">
                        <i class="fas fa-images mr-2"></i> Galeri
                    </a>
                    <a href="{{ route('testimonials') }}"
                        class="nav-link {{ request()->routeIs('testimonials') ? 'active' : '' }}">
                        <i class="fas fa-comment-dots mr-2"></i> Testimoni
                    </a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        <i class="fas fa-info-circle mr-2"></i> Tentang
                    </a>
                    <a href="{{ route('contact') }}"
                        class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <i class="fas fa-phone-alt mr-2"></i> Kontak
                    </a>
                </nav>

                <!-- Call to Action Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="tel:{{ setting('contact.phone', '+62123456789') }}"
                        class="flex items-center text-gray-600 hover:text-primary transition-colors">
                        <i class="fas fa-phone mr-2"></i>
                        <span class="hidden lg:inline">{{ setting('contact.phone', '+62 123 4567 89') }}</span>
                    </a>
                    <a href="{{ route('rooms') }}"
                        class="bg-gradient-to-r from-primary to-primary-dark hover:from-primary-dark hover:to-primary text-black px-5 py-2 rounded-full transition-all duration-300 font-medium flex items-center shadow-md hover:shadow-lg">
                        <i class="fas fa-calendar-check mr-2"></i>
                        <span class="hidden sm:inline">Booking Sekarang</span>
                    </a>
                </div>

                <!-- Mobile menu button -->
                <button id="mobile-menu-button"
                    class="lg:hidden focus:outline-none p-2 rounded-full hover:bg-gray-100 transition-colors">
                    <i class="fas fa-bars text-xl text-primary"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="lg:hidden hidden mt-4 pb-4 transition-all duration-300 ease-in-out">
                <nav class="flex flex-col space-y-2">
                    <a href="{{ route('home') }}"
                        class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-house-user mr-3"></i> Beranda
                    </a>
                    <a href="{{ route('rooms') }}"
                        class="mobile-nav-link {{ request()->routeIs('rooms') ? 'active' : '' }}">
                        <i class="fas fa-bed mr-3"></i> Kamar
                    </a>
                    <a href="{{ route('gallery') }}"
                        class="mobile-nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">
                        <i class="fas fa-images mr-3"></i> Galeri
                    </a>
                    <a href="{{ route('testimonials') }}"
                        class="mobile-nav-link {{ request()->routeIs('testimonials') ? 'active' : '' }}">
                        <i class="fas fa-comment-dots mr-3"></i> Testimoni
                    </a>
                    <a href="{{ route('about') }}"
                        class="mobile-nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        <i class="fas fa-info-circle mr-3"></i> Tentang
                    </a>
                    <a href="{{ route('contact') }}"
                        class="mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <i class="fas fa-phone-alt mr-3"></i> Kontak
                    </a>
                    <div class="pt-2">
                        <a href="{{ route('rooms') }}"
                            class="block w-full text-center bg-gradient-to-r from-primary to-primary-dark hover:from-primary-dark hover:to-primary text-black px-4 py-3 rounded-lg transition-all duration-300 font-medium shadow-md hover:shadow-lg">
                            <i class="fas fa-calendar-check mr-2"></i> Booking Sekarang
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
                <!-- About Column -->
                <div class="lg:pr-4">
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                        <i class="fas fa-home mr-2 text-primary"></i>
                        {{ setting('site.name', 'Kosku') }}
                    </h3>
                    <p class="mb-4 text-gray-400">
                        {{ setting('site.description', 'Tempat kos nyaman dengan fasilitas lengkap dan harga terjangkau') }}
                    </p>
                    <div class="flex space-x-4">
                        @if(setting('social.facebook'))
                            <a href="{{ setting('social.facebook') }}" target="_blank"
                                class="text-gray-400 hover:text-primary transition-colors duration-300 text-lg">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if(setting('social.instagram'))
                            <a href="{{ setting('social.instagram') }}" target="_blank"
                                class="text-gray-400 hover:text-primary transition-colors duration-300 text-lg">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        @if(setting('social.twitter'))
                            <a href="{{ setting('social.twitter') }}" target="_blank"
                                class="text-gray-400 hover:text-primary transition-colors duration-300 text-lg">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if(setting('social.whatsapp'))
                            <a href="https://wa.me/{{ setting('social.whatsapp') }}" target="_blank"
                                class="text-gray-400 hover:text-primary transition-colors duration-300 text-lg">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                        <i class="fas fa-link mr-2 text-primary"></i> Tautan Cepat
                    </h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('home') }}"
                                class="flex items-center hover:text-primary transition-colors duration-300">
                                <i class="fas fa-chevron-right text-xs mr-2 text-primary"></i> Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('rooms') }}"
                                class="flex items-center hover:text-primary transition-colors duration-300">
                                <i class="fas fa-chevron-right text-xs mr-2 text-primary"></i> Kamar & Harga
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gallery') }}"
                                class="flex items-center hover:text-primary transition-colors duration-300">
                                <i class="fas fa-chevron-right text-xs mr-2 text-primary"></i> Galeri Foto
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('testimonials') }}"
                                class="flex items-center hover:text-primary transition-colors duration-300">
                                <i class="fas fa-chevron-right text-xs mr-2 text-primary"></i> Testimoni Penghuni
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                        <i class="fas fa-envelope mr-2 text-primary"></i> Kontak Kami
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-primary"></i>
                            <span>{{ setting('contact.address', 'Jl. Contoh No. 123, Kota, Indonesia') }}</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-primary"></i>
                            <a href="tel:{{ setting('contact.phone', '+62123456789') }}"
                                class="hover:text-primary transition-colors">
                                {{ setting('contact.phone', '+62 123 4567 890') }}
                            </a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-primary"></i>
                            <a href="mailto:{{ setting('contact.email', 'info@kosku.com') }}"
                                class="hover:text-primary transition-colors">
                                {{ setting('contact.email', 'info@kosku.com') }}
                            </a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock mr-3 text-primary"></i>
                            <span>{{ setting('contact.hours', 'Senin - Minggu: 08.00 - 21.00') }}</span>
                        </li>
                    </ul>
                </div>

                <!-- Google Maps -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                        <i class="fas fa-map-marked-alt mr-2 text-primary"></i> Lokasi Kami
                    </h3>
                    <div class="aspect-w-16 aspect-h-9 bg-gray-800 rounded-lg overflow-hidden shadow-md">
                        @if(setting('contact.map_embed'))
                            {!! setting('contact.map_embed') !!}
                        @else
                            <div class="w-full h-full bg-gray-700 flex items-center justify-center">
                                <div class="text-center p-4">
                                    <i class="fas fa-map-marker-alt text-3xl text-primary mb-2"></i>
                                    <p class="text-gray-400">Peta Lokasi</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <a href="{{ setting('contact.map_url', 'https://maps.google.com') }}" target="_blank"
                        class="inline-flex items-center mt-3 text-primary hover:text-primary-light transition-colors">
                        <i class="fas fa-directions mr-2"></i> Petunjuk Arah
                    </a>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-800 mt-10 pt-6 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm mb-3 md:mb-0">
                    &copy; {{ date('Y') }} {{ setting('site.name', 'Kosku') }}. All rights reserved.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-500 hover:text-primary text-sm transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="text-gray-500 hover:text-primary text-sm transition-colors">Syarat &
                        Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Combined Floating Action Buttons -->
    <div class="fixed right-6 bottom-6 z-40 flex flex-col items-end space-y-3">
        <!-- Back to top button - shown when scrolling -->
        <button id="back-to-top"
            class="bg-gradient-to-br from-primary to-primary-dark hover:from-primary-dark hover:to-primary text-black w-12 h-12 rounded-full shadow-xl flex items-center justify-center transition-all duration-300 transform hover:scale-105 opacity-0 hidden">
            <i class="fas fa-arrow-up text-lg"></i>
        </button>

        <!-- Hidden Action Buttons -->
        <div id="fab-actions" class="hidden flex-col space-y-3 items-end">
            <a href="https://wa.me/{{ setting('social.whatsapp', '6281234567890') }}" target="_blank"
                class="bg-green-500 hover:bg-green-600 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg transition-all transform hover:scale-105 animate-fab-in">
                <i class="fab fa-whatsapp text-xl"></i>
            </a>
            <a href="tel:{{ setting('contact.phone', '+62123456789') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg transition-all transform hover:scale-105 animate-fab-in">
                <i class="fas fa-phone text-xl"></i>
            </a>
        </div>

        <!-- Main FAB -->
        <button id="fab-main"
            class="bg-primary hover:bg-primary-dark text-black w-14 h-14 rounded-full flex items-center justify-center shadow-xl transition-all hover:shadow-2xl">
            <i class="fas fa-comments text-xl"></i>
        </button>
    </div>

    <!-- Custom JS -->
    <script>
        // Mobile menu toggle with animation
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('opacity-0');
            if (!mobileMenu.classList.contains('hidden')) {
                setTimeout(() => {
                    mobileMenu.classList.remove('opacity-0');
                }, 20);
            }
        });

        // Back to top button
        window.addEventListener('scroll', function () {
            const backToTopButton = document.getElementById('back-to-top');
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('hidden');
                backToTopButton.classList.remove('opacity-0');
            } else {
                backToTopButton.classList.add('opacity-0');
                setTimeout(() => {
                    if (window.pageYOffset <= 300) {
                        backToTopButton.classList.add('hidden');
                    }
                }, 300);
            }
        });

        document.getElementById('back-to-top').addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Combined Floating Action Buttons functionality
        document.addEventListener('DOMContentLoaded', function () {
            const fabMain = document.getElementById('fab-main');
            const fabActions = document.getElementById('fab-actions');
            const backToTopButton = document.getElementById('back-to-top');
            let isFabOpen = false;

            if (fabMain && fabActions) {
                fabMain.addEventListener('click', function (e) {
                    e.stopPropagation();
                    isFabOpen = !isFabOpen;

                    if (isFabOpen) {
                        // Hide back-to-top button when FAB is open
                        backToTopButton.classList.add('opacity-0', 'pointer-events-none');

                        fabActions.classList.remove('hidden');
                        fabMain.innerHTML = '<i class="fas fa-times text-xl"></i>';
                        fabMain.classList.add('rotate-45');

                        // Animate each action button with delay
                        const actionButtons = fabActions.querySelectorAll('a');
                        actionButtons.forEach((btn, index) => {
                            btn.style.transitionDelay = `${index * 100}ms`;
                            btn.classList.add('opacity-0', 'translate-y-4');
                            setTimeout(() => {
                                btn.classList.remove('opacity-0', 'translate-y-4');
                            }, 10);
                        });
                    } else {
                        fabActions.classList.add('hidden');
                        fabMain.innerHTML = '<i class="fas fa-comments text-xl"></i>';
                        fabMain.classList.remove('rotate-45');

                        // Show back-to-top button if scrolled
                        if (window.pageYOffset > 300) {
                            backToTopButton.classList.remove('opacity-0', 'pointer-events-none');
                        }
                    }
                });

                // Close when clicking outside
                document.addEventListener('click', function (e) {
                    if (isFabOpen && !fabMain.contains(e.target) && !fabActions.contains(e.target)) {
                        isFabOpen = false;
                        fabActions.classList.add('hidden');
                        fabMain.innerHTML = '<i class="fas fa-comments text-xl"></i>';
                        fabMain.classList.remove('rotate-45');

                        if (window.pageYOffset > 300) {
                            backToTopButton.classList.remove('opacity-0', 'pointer-events-none');
                        }
                    }
                });
            }
        });
    </script>

    <style>
        /* Custom styles with transitions */
        .nav-link {
            position: relative;
            padding: 0.5rem 0;
            font-weight: 500;
            color: #4b5563;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #10b981;
            /* Changed to green-500 */
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #10b981, #059669);
            /* Green gradient */
            transition: width 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .mobile-nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            color: #4b5563;
        }

        .mobile-nav-link:hover,
        .mobile-nav-link.active {
            background-color: rgba(16, 185, 129, 0.1);
            /* Green with 10% opacity */
            color: #10b981;
            /* Green-500 */
            transform: translateX(4px);
        }

        /* Animation for elements */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        /* FAB Animation Styles */
        .rotate-45 {
            transform: rotate(45deg);
            transition: transform 0.3s ease;
        }

        .animate-fab-in {
            animation: fabIn 0.3s ease-out forwards;
        }

        @keyframes fabIn {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.8);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .pointer-events-none {
            pointer-events: none;
        }
    </style>
    @fluxScripts
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>


</body>

</html>