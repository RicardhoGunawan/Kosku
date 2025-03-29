<!-- resources/views/livewire/home.blade.php -->
<div>
    <!-- Hero Section -->
    <section class="hero bg-cover bg-center py-20" style="background-image: url('{{ asset('images/hero-bg.jpg') }}')">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Tempat Tinggal Nyaman dengan Harga Terjangkau</h1>
            <p class="text-xl mb-8">Temukan kamar kos yang sesuai dengan kebutuhan dan budget Anda</p>
            <a href="#rooms" class="bg-primary hover:bg-primary-dark text-white font-bold py-3 px-6 rounded-lg transition duration-300">Lihat Kamar</a>
        </div>
    </section>

    <!-- Featured Rooms -->
    <section id="rooms" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Kamar Tersedia</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($featuredRooms as $room)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                        <img src="{{ $room->mainImage() ? asset('storage/' . $room->mainImage()->image_path) : asset('images/default-room.jpg') }}" alt="{{ $room->name }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $room->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($room->description, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-primary font-bold">{{ $room->formatted_price_monthly }}/bulan</span>
                                <a href="{{ route('room-detail', $room->slug) }}" class="text-sm bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded transition duration-300">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('rooms') }}" class="inline-block bg-primary hover:bg-primary-dark text-white font-bold py-3 px-6 rounded-lg transition duration-300">Lihat Semua Kamar</a>
            </div>
        </div>
    </section>

    <!-- Gallery Preview -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Galeri Kami</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($featuredGallery as $item)
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->caption ?? 'Galeri' }}" class="w-full h-32 object-cover hover:scale-105 transition duration-300">
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('gallery') }}" class="inline-block bg-primary hover:bg-primary-dark text-white font-bold py-3 px-6 rounded-lg transition duration-300">Lihat Galeri Lengkap</a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Apa Kata Mereka</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($testimonials as $testimonial)
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                <img src="{{ $testimonial->photo ? asset('storage/' . $testimonial->photo) : asset('images/default-avatar.jpg') }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold">{{ $testimonial->name }}</h4>
                                @if($testimonial->position)
                                    <p class="text-sm text-gray-600">{{ $testimonial->position }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="mb-4">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="text-{{ $i <= $testimonial->rating ? 'yellow' : 'gray' }}-400">★</span>
                            @endfor
                        </div>
                        <p class="text-gray-700">"{{ $testimonial->content }}"</p>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('testimonials') }}" class="inline-block bg-primary hover:bg-primary-dark text-white font-bold py-3 px-6 rounded-lg transition duration-300">Baca Lebih Banyak Testimoni</a>
            </div>
        </div>
    </section>
</div>