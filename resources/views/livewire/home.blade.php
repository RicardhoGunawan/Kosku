<!-- resources/views/livewire/home.blade.php -->
<div>
    <!-- Hero Section -->
    <section
        class="bg-gradient-to-br from-emerald-400 to-green-600 min-h-[100vh] py-5 flex items-center overflow-hidden">

        <!-- Natural Grain Overlay with improved texture -->
        <div class="absolute inset-0 opacity-15"
            style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MDAiIGhlaWdodD0iNDAwIj48ZmlsdGVyIGlkPSJhIiB4PSIwIiB5PSIwIj48ZmVUdXJidWxlbmNlIHR5cGU9ImZyYWN0YWxOb2lzZSIgYmFzZUZyZXF1ZW5jeT0iLjg1IiBzdGl0Y2hUaWxlcz0ic3RpdGNoIi8+PC9maWx0ZXI+PHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSI0MDAiIGZpbHRlcj0idXJsKCNhKSIgb3BhY2l0eT0iMC40Ii8+PC9zdmc+');">
        </div>

        <div class="container mx-auto px-6 py-8 md:py-16 relative z-10">
            <div class="flex flex-col md:flex-row items-center justify-between gap-12">
                <!-- Left Content with optimized spacing -->
                <div class="w-full md:w-1/2 pr-0 md:pr-10 ml-0 md:ml-8 lg:ml-12 animate-fade-up delay-100">
                    <!-- Floating Badge with improved design -->
                    <div
                        class="inline-flex items-center bg-green-50 rounded-full px-4 py-2 mb-5 border border-green-100 shadow-sm transform hover:scale-105 transition duration-300">
                        <span class="animate-pulse w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                        <span class="text-green-800 text-sm font-semibold tracking-wide">Tempat Kos Terpercaya</span>
                    </div>

                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-5 leading-tight text-gray-800">
                        Tempat Tinggal Nyaman dengan
                        <span class="relative inline-block">
                            <span class="relative z-10 text-green-600 italic">Harga Terjangkau</span>
                            <svg class="absolute -bottom-2 left-0 w-full" viewBox="0 0 100 20"
                                preserveAspectRatio="none">
                                <path fill="rgba(34, 197, 94, 0.25)" d="M0 15 Q 25 5, 50 15 T 100 15 L 100 20 L 0 20 Z">
                                </path>
                            </svg>
                        </span>
                    </h1>

                    <p class="text-base md:text-lg mb-6 text-gray-600 leading-relaxed max-w-xl">
                        Temukan kamar kos yang sesuai dengan kebutuhan dan budget Anda. Dengan fasilitas lengkap dan
                        lokasi strategis.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 mb-6">
                        <a href="#rooms"
                            class="group bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl flex items-center justify-center">
                            <i
                                class="fas fa-search mr-2 transition-transform group-hover:rotate-12 group-hover:scale-110"></i>
                            Lihat Kamar
                        </a>
                        <a href="{{ route('contact') }}"
                            class="group bg-white hover:bg-green-50 text-green-600 border-2 border-green-600 font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-md flex items-center justify-center">
                            <i
                                class="fas fa-phone-alt mr-2 transition-transform group-hover:rotate-12 group-hover:scale-110"></i>
                            Hubungi Kami
                        </a>
                    </div>

                    <div class="flex gap-8 mt-6">
                        <div class="text-center">
                            <p class="text-3xl font-bold text-green-600" x-data="{ count: 0 }" x-init="let target = {{ $availableRooms }}; 
               let interval = setInterval(() => { 
                   if(count < target) { count++ } else { clearInterval(interval) } 
               }, 40)">
                                <span x-text="count"></span>+
                            </p>
                            <p class="text-sm text-gray-600 font-medium">Kamar Tersedia</p>
                        </div>

                        <div class="text-center">
                            <p class="text-3xl font-bold text-green-600" x-data="{ count: 0 }" x-init="let target = {{ $totalTestimonials }}; 
               let interval = setInterval(() => { 
                   if(count < target) { count++ } else { clearInterval(interval) } 
               }, 40)">
                                <span x-text="count"></span>+
                            </p>
                            <p class="text-sm text-gray-600 font-medium">Testimoni</p>
                        </div>

                        <div class="text-center">
                            <p class="text-3xl font-bold text-green-600" x-data="{ count: 0 }" x-init="let target = {{ $averageRating }}; 
               let step = target / 50; 
               let interval = setInterval(() => { 
                   if(count < target) { count += step } else { clearInterval(interval) } 
               }, 40)">
                                <span x-text="count.toFixed(1)"></span>
                            </p>
                            <p class="text-sm text-gray-600 font-medium">Rating</p>
                        </div>
                    </div>
                </div>

                <!-- Right Image with improved styling and right margin -->
                <div class="w-full md:w-1/3 mr-0 md:mr-8 lg:mr-12 animate-fade-left delay-200">
                    <div
                        class="relative rounded-2xl overflow-hidden shadow-xl transform hover:scale-102 transition-transform duration-500">
                        <!-- Natural Image Container -->
                        <div class="relative overflow-hidden group">
                            <img src="{{ asset('images/hero-bg.png') }}" alt="Kamar Kos Nyaman"
                                class="w-full h-auto max-h-96 object-cover transform transition-transform duration-700 group-hover:scale-110">

                            <!-- Natural Overlay with improved gradient -->
                            <div
                                class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-green-900/40">
                            </div>

                            <!-- Natural Vignette with improved effect -->
                            <div class="absolute inset-0 opacity-35"
                                style="background: radial-gradient(circle at center, transparent 60%, rgba(0,0,0,0.35) 100%);">
                            </div>
                        </div>

                        <!-- Floating Cards with improved design -->
                        <div
                            class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-md p-3 rounded-xl shadow-lg transform hover:translate-y-1 transition duration-300">
                            <div class="flex items-center gap-3">
                                <div class="bg-green-600 text-white p-2 rounded-lg shadow-md">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800 text-sm">Pilihan Terbaik</p>
                                    <p class="text-xs text-gray-600">
                                        {{ $featuredRooms->sum('available_rooms') }}+ kamar tersedia
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-4 py-2 rounded-full shadow-lg transform hover:translate-y-1 transition duration-300">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                <p class="text-xs font-semibold text-gray-800">Tersedia Sekarang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modern Wave Separator with improved design -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"
                class="relative w-full h-12 md:h-16 lg:h-20">
                <path
                    d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                    class="fill-green-100 opacity-85"></path>
                <path
                    d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                    class="fill-green-50 opacity-65"></path>
                <path
                    d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                    class="fill-white"></path>
            </svg>
        </div>
    </section>

    <style>
        @keyframes fade-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-left {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-up {
            animation: fade-up 1s ease-out;
        }

        .animate-fade-left {
            animation: fade-left 1s ease-out;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }
    </style>

    <!-- Featured Rooms -->
    <section id="rooms" class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6">
            <!-- Header section tetap sama -->
            <div class="max-w-2xl mx-auto text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Kamar Unggulan Kami
                </h2>
                <p class="text-gray-600">
                    Temukan kamar kos terbaik yang sesuai dengan kebutuhan Anda
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-5xl mx-auto">
                @forelse($featuredRooms->take(2) as $room)
                    <div
                        class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 group border border-gray-100">
                        <!-- Image Container -->
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <img src="{{ $room->mainImage() ? asset('storage/' . $room->mainImage()->image_path) : asset('images/default-room.jpg') }}"
                                alt="{{ $room->name }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                loading="lazy">

                            <!-- Overlay gradient -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>

                            <!-- Badge status kamar dengan jumlah -->
                            <div class="absolute top-3 right-3 flex flex-col gap-2">
                                @if($room->quantity < 1)
                                    <span class="bg-red-500/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                        Habis
                                    </span>
                                @else
                                    <span
                                        class="{{ $room->is_actually_available ? 'bg-green-500/90' : 'bg-red-500/90' }} text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                        {{ $room->is_actually_available ? 'Tersedia' : 'Terisi' }}
                                    </span>
                                    @if($room->is_actually_available)
                                        <span class="bg-blue-500/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                            Sisa {{ $room->available_rooms }} Kamar
                                        </span>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="p-6 md:p-8">
                            <div class="mb-4">
                                <div class="flex justify-between items-start gap-2">
                                    <h3
                                        class="text-xl font-bold mb-1 text-gray-800 group-hover:text-primary transition-colors duration-300 line-clamp-1">
                                        {{ $room->name }}
                                    </h3>
                                    <span class="text-primary font-bold text-xl whitespace-nowrap">
                                        {{ $room->formatted_price_monthly }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1 flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1.5 text-primary/80"></i>
                                    {{ $room->location ?? 'Lokasi Kosku' }}
                                </p>
                            </div>

                            <p class="text-gray-600 mb-5 text-sm leading-relaxed line-clamp-2">
                                {{ $room->description }}
                            </p>

                            <!-- Fasilitas -->
                            <div class="mb-5 py-3 border-t border-b border-gray-100">
                                <div class="grid grid-cols-2 gap-y-3 gap-x-4 text-sm">
                                    @if(isset($room->width) && isset($room->length) && $room->width && $room->length)
                                        <span class="flex items-center text-gray-700">
                                            <i class="fas fa-ruler-combined mr-2 text-primary"></i>
                                            {{ $room->width }}x{{ $room->length }} m²
                                        </span>
                                    @endif

                                    @if(isset($room->type) && $room->type)
                                        <span class="flex items-center text-gray-700">
                                            <i class="fas fa-building mr-2 text-primary"></i>
                                            {{ $room->type }}
                                        </span>
                                    @endif

                                    @if(isset($room->bathroom_type) && $room->bathroom_type)
                                        <span class="flex items-center text-gray-700">
                                            <i class="fas fa-bath mr-2 text-primary"></i>
                                            {{ $room->bathroom_type }}
                                        </span>
                                    @endif

                                    @if(isset($room->quantity))
                                        <!-- Status ketersediaan kamar -->
                                        <span class="flex items-center text-gray-700">
                                            <i class="fas fa-door-open mr-2 text-primary"></i>
                                            @if($room->quantity < 1)
                                                Tidak ada kamar tersedia
                                            @else
                                                {{ $room->quantity }} Total Kamar
                                            @endif
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- Fasilitas dalam badge jika tidak menggunakan format di atas -->
                            @if(!isset($room->width) && $room->facilities && $room->facilities->count() > 0)
                                <div class="flex flex-wrap gap-2 mb-5">
                                    @foreach($room->facilities->take(4) as $facility)
                                        <span
                                            class="bg-gray-100 rounded-full px-3 py-1 text-xs text-gray-700">{{ $facility->name }}</span>
                                    @endforeach
                                    @if($room->facilities->count() > 3)
                                        <span
                                            class="bg-gray-100 rounded-full px-3 py-1 text-xs text-gray-700">+{{ $room->facilities->count() - 3 }}</span>
                                    @endif
                                </div>
                            @endif

                            <!-- Action button -->
                            <a href="{{ route('room-detail', $room->slug) }}"
                                class="block w-full text-center {{ $room->quantity > 0 && $room->is_actually_available ? 'bg-primary hover:bg-primary-dark' : 'bg-gray-500 hover:bg-gray-600' }} text-black py-3 px-4 rounded-lg transition-all duration-300 hover:shadow-md font-medium flex items-center justify-center gap-2">
                                <i class="fas fa-eye"></i>
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="max-w-sm mx-auto">
                            <i class="fas fa-home text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum Ada Kamar</h3>
                            <p class="text-gray-500">Saat ini belum ada kamar yang tersedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($featuredRooms->count() > 0)
                <div class="text-center mt-16">
                    <a href="{{ route('rooms') }}"
                        class="inline-flex items-center justify-center bg-primary hover:bg-primary-dark text-black font-medium py-3 px-8 rounded-lg transition-all duration-300 hover:shadow-lg border border-primary/20 gap-2">
                        <i class="fas fa-list-ul"></i>
                        Lihat Semua Kamar
                    </a>
                </div>
            @endif
        </div>
    </section>




    <!-- Why Choose Us -->
    <section class="py-16 md:py-24 bg-green-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span
                    class="inline-block py-2 px-4 rounded-full bg-primary/10 text-primary text-sm font-semibold mb-4 tracking-wider uppercase">
                    {{ setting('features.tag', 'KENAPA MEMILIH KAMI') }}
                </span>

                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    {{ setting('features.title', 'Keunggulan Kosku') }}
                </h2>

                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>

                <p class="text-gray-600 max-w-2xl mx-auto text-lg leading-relaxed">
                    {{ setting('features.subtitle', 'Kami menyediakan tempat kos terbaik dengan berbagai keunggulan untuk kenyamanan Anda') }}
                </p>
            </div>

            @if(setting('features.items'))
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach(setting('features.items') as $feature)
                        <div
                            class="group relative bg-white p-8 rounded-xl text-center shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-3 border border-gray-100">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent opacity-0 group-hover:opacity-100 rounded-xl transition-opacity duration-300">
                            </div>

                            @if($feature['icon'] ?? false)
                                <div
                                    class="w-20 h-20 bg-primary/10 text-primary rounded-2xl flex items-center justify-center text-4xl mx-auto mb-6 transition-all duration-300 group-hover:bg-primary group-hover:text-white">
                                    <i class="{{ $feature['icon'] }}"></i>
                                </div>
                            @endif

                            @if($feature['title'] ?? false)
                                <h3 class="text-xl font-bold mb-4 relative z-10">{{ $feature['title'] }}</h3>
                            @endif

                            @if($feature['description'] ?? false)
                                <p class="text-gray-600 mb-0 relative z-10 leading-relaxed">{{ $feature['description'] }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

    <!-- Gallery Preview - Modern & Dynamic Design -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute -top-20 -left-20 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Section header with animated underline -->
            <div class="text-center mb-16">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-primary/10 text-primary text-sm font-semibold mb-3">GALERI
                    KAMI</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Lihat Suasana Kosku</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Rasakan kenyamanan Kosku melalui galeri foto fasilitas dan
                    lingkungan kami</p>
            </div>

            <!-- Masonry-style gallery with hover effects -->
            <div x-data="{ activeModal: null }" class="relative">
                <!-- Gallery grid with masonry-like layout -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 md:gap-6">
                    @forelse($featuredGallery as $key => $item)
                        <!-- Featured large image -->
                        <div
                            class="{{ $key === 0 ? 'col-span-1 row-span-2 sm:col-span-2 md:row-span-2' : ($key === 3 ? 'md:col-span-2' : '') }} 
                                              overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transform transition-all duration-500 ease-in-out hover:-translate-y-1">
                            <div class="relative h-full group cursor-pointer" @click="activeModal = {{ $key }}"
                                x-data="{ hovered: false }" @mouseenter="hovered = true" @mouseleave="hovered = false">

                                <!-- Image with scale effect -->
                                <img src="{{ asset('storage/' . $item->image_path) }}"
                                    alt="{{ $item->caption ?? 'Galeri Kosku' }}"
                                    class="w-full h-full object-cover transition-transform duration-700 ease-in-out"
                                    :class="hovered ? 'scale-110 filter brightness-90' : ''">

                                <!-- Caption overlay with animated entrance -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent 
                                                      flex flex-col items-center justify-end p-5 opacity-0 group-hover:opacity-100 
                                                      transition-all duration-500 ease-in-out translate-y-4 group-hover:translate-y-0">

                                    <!-- Magnify button -->
                                    <button
                                        class="absolute top-4 right-4 bg-white/90 hover:bg-white rounded-full p-3 text-primary 
                                                             shadow-lg transform group-hover:rotate-12 transition-all duration-500">
                                        <i class="fas fa-search text-lg"></i>
                                    </button>

                                    <!-- Caption with fade-in effect -->
                                    @if($item->caption)
                                        <p class="text-white text-center font-medium text-lg mb-1">{{ $item->caption }}</p>
                                    @endif
                                    <span class="w-12 h-1 bg-primary rounded-full mt-2"></span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Empty state with animation -->
                        <div
                            class="col-span-full text-center py-20 bg-gray-50/50 rounded-2xl border border-dashed border-gray-300">
                            <div class="text-6xl text-gray-300 mb-5 animate-pulse">
                                <i class="fas fa-images"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-700">Belum ada galeri tersedia</h3>
                            <p class="text-gray-500 mt-3 max-w-md mx-auto">Mohon cek kembali nanti untuk update terbaru dari
                                galeri kami</p>
                        </div>
                    @endforelse
                </div>

                <!-- Image modal popups -->
                @foreach($featuredGallery as $key => $item)
                    <div x-show="activeModal === {{ $key }}" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-90"
                        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/90"
                        @click.self="activeModal = null">
                        <div class="relative max-w-4xl w-full bg-white rounded-xl overflow-hidden shadow-2xl">
                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->caption ?? 'Galeri' }}"
                                class="w-full max-h-[80vh] object-contain">

                            <div class="absolute top-4 right-4">
                                <button @click="activeModal = null" class="bg-white/90 hover:bg-white text-gray-800 rounded-full p-3 shadow-lg 
                                                           transform hover:rotate-90 transition-all duration-300">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                            @if($item->caption)
                                <div class="bg-white p-5">
                                    <p class="text-lg font-medium text-gray-800">{{ $item->caption }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Call to action button with animation -->
            <div class="text-center mt-16 mb-16">
                <a href="{{ route('gallery') }}"
                    class="inline-flex items-center justify-center bg-primary hover:bg-primary-dark text-black font-bold py-4 px-8 rounded-xl
                      transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:shadow-primary/20 group">
                    <i class="fas fa-images mr-2 group-hover:mr-3 transition-all"></i>
                    <span>Lihat Galeri Lengkap</span>
                    <i
                        class="fas fa-arrow-right ml-2 opacity-0 w-0 group-hover:opacity-100 group-hover:w-5 group-hover:ml-3 transition-all duration-300"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 md:py-24 bg-green-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-primary/10 text-primary text-sm font-semibold mb-3">TESTIMONI</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Apa Kata Mereka</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Pengalaman penghuni yang telah merasakan kenyamanan tinggal
                    di Kosku</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @forelse($testimonials as $testimonial)
                    <div
                        class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-2">
                        <div class="flex items-center mb-4">
                            <div class="w-14 h-14 rounded-full overflow-hidden mr-4 ring-2 ring-primary">
                                <img src="{{ $testimonial->photo ? asset('storage/' . $testimonial->photo) : asset('images/default-avatar.jpg') }}"
                                    alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">{{ $testimonial->name }}</h4>
                                @if($testimonial->position)
                                    <p class="text-sm text-gray-600">{{ $testimonial->position }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="mb-4 text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                                <i
                                    class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                            @endfor
                        </div>

                        <div class="relative">
                            <i class="fas fa-quote-left text-5xl text-primary opacity-10 absolute -top-2 -left-2"></i>
                            <p class="text-gray-700 relative z-10">{{ Str::limit($testimonial->content, 150) }}</p>
                            @if(strlen($testimonial->content) > 150)
                                <a href="{{ route('testimonials') }}"
                                    class="text-primary hover:underline text-sm inline-block mt-2">Baca selengkapnya</a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-5xl text-gray-300 mb-4">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-700">Belum ada testimoni tersedia</h3>
                        <p class="text-gray-500 mt-2">Mohon cek kembali nanti untuk update terbaru</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('testimonials') }}"
                    class="inline-block bg-dark hover:bg-grey-dark text-dark font-bold py-3 px-8 rounded-lg transition-all duration-300 hover:shadow-lg border-2 border-white">
                    <i class="fas fa-comments mr-2"></i> Baca Lebih Banyak Testimoni
                </a>
            </div>

        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-24 bg-primary bg-opacity-95 bg-cover bg-center relative"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('{{ asset('images/hero-bg.png') }}')">
        <div class="container mx-auto px-4 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-white">Siap Menghuni Kosku?</h2>
            <p class="text-xl text-white opacity-90 mb-8 max-w-2xl mx-auto">Jangan lewatkan kesempatan mendapatkan kamar
                kos terbaik dengan fasilitas lengkap untuk kenyamanan Anda</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('rooms') }}"
                    class="bg-white hover:bg-gray-100 text-primary font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:-translate-y-1 shadow-lg">
                    <i class="fas fa-search mr-2"></i> Cari Kamar
                </a>
                <a href="{{ route('contact') }}"
                    class="bg-transparent hover:bg-white/10 text-white border-2 border-white font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:-translate-y-1">
                    <i class="fas fa-phone-alt mr-2"></i> Hubungi Kami
                </a>
            </div>
        </div>
    </section>
</div>