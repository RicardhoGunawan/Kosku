<!-- resources/views/livewire/home.blade.php -->
<div>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center min-h-[80vh] flex items-center"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('images/hero-bg.jpg') }}')">
        <div class="container mx-auto px-4 text-center text-white">
            <div class="max-w-3xl mx-auto animate__animated animate__fadeIn">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">Tempat Tinggal Nyaman dengan
                    Harga Terjangkau</h1>
                <p class="text-lg md:text-xl mb-8 opacity-90">Temukan kamar kos yang sesuai dengan kebutuhan dan budget
                    Anda</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#rooms"
                        class="bg-primary hover:bg-primary-dark text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:-translate-y-1 shadow-lg">
                        <i class="fas fa-search mr-2"></i> Lihat Kamar
                    </a>
                    <a href="{{ route('contact') }}"
                        class="bg-transparent hover:bg-white/10 text-white border-2 border-white font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:-translate-y-1">
                        <i class="fas fa-phone-alt mr-2"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>

        <!-- Wave SVG Separator -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"
                class="w-full h-12 md:h-16 lg:h-20">
                <path
                    d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                    opacity=".25" class="fill-gray-50"></path>
                <path
                    d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                    opacity=".5" class="fill-gray-50"></path>
                <path
                    d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                    class="fill-gray-50"></path>
            </svg>
        </div>
    </section>

    <!-- Featured Rooms -->
    <section id="rooms" class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6">
            <!-- Header section tetap sama -->

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-4xl mx-auto">
                @forelse($featuredRooms->take(2) as $room)
                    <div
                        class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 group border border-gray-100">
                        <div class="relative overflow-hidden h-64">
                            <img src="{{ $room->mainImage() ? asset('storage/' . $room->mainImage()->image_path) : asset('images/default-room.jpg') }}"
                                alt="{{ $room->name }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                loading="lazy">
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
                        <div class="p-6">
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
                                    @if($room->width && $room->length)
                                        <span class="flex items-center text-gray-700">
                                            <i class="fas fa-ruler-combined mr-2 text-primary"></i>
                                            {{ $room->width }}x{{ $room->length }} m²
                                        </span>
                                    @endif

                                    @if($room->type)
                                        <span class="flex items-center text-gray-700">
                                            <i class="fas fa-building mr-2 text-primary"></i>
                                            {{ $room->type }}
                                        </span>
                                    @endif

                                    @if($room->bathroom_type)
                                        <span class="flex items-center text-gray-700">
                                            <i class="fas fa-bath mr-2 text-primary"></i>
                                            {{ $room->bathroom_type }}
                                        </span>
                                    @endif

                                    <!-- Status ketersediaan kamar -->
                                    <span class="flex items-center text-gray-700">
                                        <i class="fas fa-door-open mr-2 text-primary"></i>
                                        @if($room->quantity < 1)
                                            Tidak ada kamar tersedia
                                        @else
                                            {{ $room->quantity }} Total Kamar
                                        @endif
                                    </span>
                                </div>
                            </div>

                            <!-- Tombol dengan status yang sesuai -->
                            <a href="{{ route('room-detail', $room->slug) }}"
                                class="block w-full text-center {{ $room->quantity > 0 && $room->is_actually_available ? 'bg-primary hover:bg-primary-dark' : 'bg-gray-500 hover:bg-gray-600' }} text-black py-3 px-4 rounded-lg transition-all duration-300 hover:shadow-md font-medium flex items-center justify-center gap-2">
                                <i class="fas fa-eye"></i>
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <!-- Empty state tetap sama -->
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
    <section class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="inline-block py-1 px-3 rounded-full bg-primary/10 text-primary text-sm font-semibold mb-3">
                    {{ setting('features.tag', 'KENAPA MEMILIH KAMI') }}
                </span>

                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    {{ setting('features.title', 'Keunggulan Kosku') }}
                </h2>

                <p class="text-gray-600 max-w-2xl mx-auto">
                    {{ setting('features.subtitle', 'Kami menyediakan tempat kos terbaik dengan berbagai keunggulan untuk kenyamanan Anda') }}
                </p>
            </div>

            @if(setting('features.items'))
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                    @foreach(setting('features.items') as $feature)
                        <div
                            class="bg-gray-50 p-6 rounded-xl text-center hover:shadow-lg transition-all duration-300 hover:-translate-y-2">
                            @if($feature['icon'] ?? false)
                                <div
                                    class="w-16 h-16 bg-primary/10 text-primary rounded-full flex items-center justify-center text-6xl mx-auto mb-4">
                                    <i class="{{ $feature['icon'] }}"></i>
                                </div>
                            @endif

                            @if($feature['title'] ?? false)
                                <h3 class="text-xl font-bold mb-3">{{ $feature['title'] }}</h3>
                            @endif

                            @if($feature['description'] ?? false)
                                <p class="text-gray-600">{{ $feature['description'] }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Gallery Preview -->
    <section class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-primary/10 text-primary text-sm font-semibold mb-3">GALERI
                    KAMI</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Lihat Suasana Kosku</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Rasakan kenyamanan Kosku melalui galeri foto fasilitas dan
                    lingkungan kami</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @forelse($featuredGallery as $key => $item)
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-all duration-300 {{ $key === 0 ? 'col-span-2 row-span-2' : '' }}"
                        x-data="{ showCaption: false }">
                        <div class="relative h-full group cursor-pointer" @mouseenter="showCaption = true"
                            @mouseleave="showCaption = false">
                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->caption ?? 'Galeri' }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
                                x-show="showCaption" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                                @if($item->caption)
                                    <p class="text-white text-center px-3">{{ $item->caption }}</p>
                                @endif
                                <button class="absolute top-3 right-3 bg-white rounded-full p-2 text-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-5xl text-gray-300 mb-4">
                            <i class="fas fa-images"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-700">Belum ada galeri tersedia</h3>
                        <p class="text-gray-500 mt-2">Mohon cek kembali nanti untuk update terbaru</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('gallery') }}"
                    class="inline-block bg-primary hover:bg-primary-dark text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 hover:shadow-lg">
                    <i class="fas fa-images mr-2"></i> Lihat Galeri Lengkap
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 md:py-24 bg-white">
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
                    class="inline-block bg-primary hover:bg-primary-dark text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 hover:shadow-lg">
                    <i class="fas fa-comments mr-2"></i> Baca Lebih Banyak Testimoni
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-24 bg-primary bg-opacity-95 bg-cover bg-center relative"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('{{ asset('images/hero-bg.jpg') }}')">
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