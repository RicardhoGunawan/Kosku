<!-- resources/views/livewire/room-detail.blade.php -->
<div x-data="{ activeImage: null, openGallery: false }">
    <!-- Hero Section dengan Image Slider -->
    <section class="relative h-[50vh] md:h-[60vh] lg:h-[70vh] overflow-hidden">
        <!-- Full-width main image -->
        <div class="absolute inset-0 bg-black/40 z-10"></div>
        <img 
            src="{{ $mainImage ? asset('storage/' . $mainImage->image_path) : asset('images/default-room.jpg') }}" 
            alt="{{ $room->name }}" 
            class="w-full h-full object-cover"
        >
        
        <!-- Overlay content -->
        <div class="container mx-auto px-4 relative z-20 h-full flex flex-col justify-end pb-12">
            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg inline-block max-w-2xl">
                <h1 class="text-3xl md:text-4xl font-bold text-white">{{ $room->name }}</h1>
                <div class="flex flex-wrap items-center gap-4 mt-3">
                    <span class="text-xl md:text-2xl font-bold text-white bg-primary px-3 py-1 rounded-md">
                        {{ $room->formatted_price_monthly }}/bulan
                    </span>
                    @if($room->price_yearly)
                        <span class="text-lg text-white bg-primary/70 px-3 py-1 rounded-md">
                            {{ $room->formatted_price_yearly }}/tahun
                        </span>
                    @endif
                    
                    <div class="ml-auto flex items-center space-x-2">
                        <button 
                            @click="openGallery = true"
                            class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-md transition flex items-center gap-2"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Lihat Galeri
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fullscreen Gallery Modal -->
    <div 
        x-data="{ 
            openGallery: false, 
            activeImage: @js($mainImage ? asset('storage/'.$mainImage->image_path) : asset('images/default-room.jpg')) 
        }" 
        x-show="openGallery" 
        x-transition
        class="fixed inset-0 bg-black/90 z-50 flex items-center justify-center"
        x-cloak
    >
        <button @click="openGallery = false" class="absolute top-4 right-4 text-white p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <div class="w-full max-w-5xl px-4">
            <!-- Main gallery image -->
            <div class="mb-4 h-[60vh] overflow-hidden rounded-lg">
                <img 
                    :src="activeImage" 
                    alt="{{ $room->name }}" 
                    class="w-full h-full object-contain"
                >
            </div>
            
            <!-- Thumbnails -->
            @if($otherImages->count() > 0)
                <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 gap-2">
                    <!-- Main Image Thumbnail -->
                    <div 
                        class="rounded-lg overflow-hidden cursor-pointer border-2" 
                        :class="activeImage === @js($mainImage ? asset('storage/'.$mainImage->image_path) : asset('images/default-room.jpg')) ? 'border-primary' : 'border-transparent'"
                        @click="activeImage = @js($mainImage ? asset('storage/'.$mainImage->image_path) : asset('images/default-room.jpg'))"
                    >
                        <img 
                            src="{{ $mainImage ? asset('storage/'.$mainImage->image_path) : asset('images/default-room.jpg') }}" 
                            alt="{{ $room->name }}" 
                            class="w-full h-20 object-cover"
                        >
                    </div>

                    <!-- Other Image Thumbnails -->
                    @foreach($otherImages as $image)
                        <div 
                            class="rounded-lg overflow-hidden cursor-pointer border-2" 
                            :class="activeImage === @js(asset('storage/'.$image->image_path)) ? 'border-primary' : 'border-transparent'"
                            @click="activeImage = @js(asset('storage/'.$image->image_path))"
                        >
                            <img 
                                src="{{ asset('storage/'.$image->image_path) }}" 
                                alt="{{ $room->name }}" 
                                class="w-full h-20 object-cover"
                            >
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>


    <!-- Quick Actions Bar -->
    <section class="sticky top-0 z-30 bg-white shadow-md py-4 border-b">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between items-center gap-4">
                <div class="flex items-center gap-2">
                    <span class="text-lg font-bold text-primary">{{ $room->formatted_price_monthly }}</span>
                    <span class="text-gray-500">/bulan</span>
                </div>
                
                <div class="flex items-center space-x-2 md:space-x-4">
                    <div class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <span class="text-sm">{{ $room->type }}</span>
                    </div>
                    
                    <div class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                        </svg>
                        <span class="text-sm">{{ $room->size }} m²</span>
                    </div>
                    
                    <div class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="text-sm">{{ $room->capacity }} orang</span>
                    </div>
                    
                    <div class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $room->is_available ? 'text-green-500' : 'text-red-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm {{ $room->is_available ? 'text-green-600' : 'text-red-600' }}">
                            {{ $room->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
                        </span>
                    </div>
                </div>
                
                @if($room->is_available)
                    <a 
                        href="{{ route('payment') }}" 
                        class="bg-primary hover:bg-primary-dark text-dark font-bold py-2 px-6 rounded-lg transition duration-300 flex items-center gap-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Booking Sekarang
                    </a>
                @else
                    <button 
                        class="bg-gray-400 text-black font-bold py-2 px-6 rounded-lg cursor-not-allowed flex items-center gap-2"
                        disabled
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        Tidak Tersedia
                    </button>
                @endif
            </div>
        </div>
    </section>

    <!-- Room Content -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <!-- Room Description with nice formatting -->
                    <div class="mb-10 bg-white rounded-lg shadow-sm p-6 transition hover:shadow-md">
                        <h2 class="text-2xl font-bold mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Deskripsi Kamar
                        </h2>
                        <div class="prose prose-lg max-w-none">
                            {!! nl2br(e($room->description)) !!}
                        </div>
                    </div>

                    <!-- Room Facilities with animations -->
                    <div class="mb-10 bg-white rounded-lg shadow-sm p-6 transition hover:shadow-md">
                        <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            Fasilitas Kamar
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($room->facilities as $facility)
                                <div class="flex items-center p-3 rounded-lg bg-gray-50 hover:bg-primary/5 transition duration-300">
                                    @if($facility->icon)
                                        <span class="mr-3 text-primary">{!! $facility->icon !!}</span>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    @endif
                                    <span class="font-medium">{{ $facility->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                        <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Detail Kamar
                        </h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-center">
                                <div class="bg-primary/10 p-3 rounded-full mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-gray-600 text-sm">Tipe Kamar</span>
                                    <span class="font-medium text-lg">{{ $room->type }}</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="bg-primary/10 p-3 rounded-full mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-gray-600 text-sm">Ukuran Kamar</span>
                                    <span class="font-medium text-lg">{{ $room->size }} m²</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="bg-primary/10 p-3 rounded-full mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-gray-600 text-sm">Kapasitas</span>
                                    <span class="font-medium text-lg">{{ $room->capacity }} orang</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="bg-primary/10 p-3 rounded-full mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{ $room->is_available ? 'text-green-500' : 'text-red-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-gray-600 text-sm">Status Ketersediaan</span>
                                    <span class="font-medium text-lg {{ $room->is_available ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $room->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        @if($room->is_available)
                            <div class="mt-8">
                                <a 
                                    href="{{ route('payment') }}" 
                                    class="block w-full bg-primary hover:bg-primary-dark text-white text-center font-bold py-4 px-4 rounded-lg transition duration-300 transform hover:-translate-y-1 hover:shadow-lg"
                                >
                                    Booking Sekarang
                                </a>
                                <p class="text-center text-sm text-gray-500 mt-3">Kamar akan dipesan untuk Anda secara instan</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Rooms -->
    @if($relatedRooms->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-3">Kamar Lainnya</h2>
                <p class="text-gray-600 text-center mb-12 max-w-xl mx-auto">Temukan kamar lain yang mungkin sesuai dengan kebutuhan Anda</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($relatedRooms as $relatedRoom)
                        <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                            <div class="relative h-56 overflow-hidden">
                                <img 
                                    src="{{ $relatedRoom->mainImage() ? asset('storage/' . $relatedRoom->mainImage()->image_path) : asset('images/default-room.jpg') }}" 
                                    alt="{{ $relatedRoom->name }}" 
                                    class="w-full h-full object-cover transition duration-700 hover:scale-110"
                                >
                                <div class="absolute top-4 right-4 bg-primary text-white px-3 py-1 rounded-full text-sm font-bold">
                                    {{ $relatedRoom->formatted_price_monthly }}
                                </div>
                            </div>
                            
                            <div class="p-6">
                                <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                                    <span class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                        </svg>
                                        {{ $relatedRoom->size }} m²
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        {{ $relatedRoom->capacity }} orang
                                    </span>
                                    <span class="flex items-center gap-1 {{ $relatedRoom->is_available ? 'text-green-500' : 'text-red-500' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $relatedRoom->is_available ? 'Tersedia' : 'Penuh' }}
                                    </span>
                                </div>
                                
                                <h3 class="text-xl font-bold mb-2">{{ $relatedRoom->name }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($relatedRoom->description, 90) }}</p>
                                
                                <div class="flex justify-between items-center mt-4">
                                    <span class="text-primary font-bold">{{ $relatedRoom->formatted_price_monthly }}/bulan</span>
                                    <a 
                                        href="{{ route('room-detail', $relatedRoom->slug) }}" 
                                        class="bg-primary/10 hover:bg-primary/20 text-primary font-medium py-2 px-4 rounded-lg transition duration-300 flex items-center gap-1"
                                    >
                                        Lihat Detail
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    
    <!-- Call-to-action section for availablity -->
    <section class="py-16 bg-primary text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Tertarik dengan Kamar Ini?</h2>
            <p class="max-w-2xl mx-auto mb-8">Jangan lewatkan kesempatan untuk mendapatkan kamar impian Anda. Booking sekarang untuk memastikan ketersediaan!</p>
            
            @if($room->is_available)
                <a 
                    href="{{ route('payment') }}" 
                    class="inline-block bg-white text-primary hover:bg-gray-100 font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:-translate-y-1 hover:shadow-lg"
                >
                    Booking Sekarang
                </a>
            @else
                <div class="space-y-4">
                    <p class="font-medium">Sayangnya kamar ini sudah terisi. Silakan cek kamar lain atau hubungi kami.</p>
                    <a 
                        href="{{ route('rooms') }}" 
                        class="inline-block bg-white text-primary hover:bg-gray-100 font-bold py-3 px-8 rounded-lg transition duration-300 mr-4"
                    >
                        Lihat Kamar Lain
                    </a>
                    <a 
                        href="{{ route('contact') }}" 
                        class="inline-block bg-transparent border-2 border-white text-white hover:bg-white/10 font-bold py-3 px-8 rounded-lg transition duration-300"
                    >
                        Hubungi Kami
                    </a>
                </div>
            @endif
        </div>
    </section>
</div>