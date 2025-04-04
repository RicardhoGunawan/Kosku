<div class="container mx-auto px-4 py-12">
    <!-- Breadcrumb Navigation -->
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary transition">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Beranda
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Kamar</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Kamar Kos</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan kamar kos yang sesuai dengan kebutuhan Anda</p>
        <div class="w-24 h-1 bg-primary mx-auto mt-4"></div>
    </div>

    <!-- Filter & Search Options (Opsional) -->
    <div class="mb-10 max-w-6xl mx-auto bg-white rounded-xl shadow-sm p-4 border border-gray-100">
        <div class="flex flex-col md:flex-row justify-between gap-4">
            <div class="relative flex-grow">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input 
                    wire:model.debounce.300ms="search" 
                    type="search" 
                    class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-200 rounded-lg bg-gray-50 focus:ring-primary focus:border-primary"
                    placeholder="Cari kamar berdasarkan nama atau fasilitas..."
                >
            </div>
            <div class="flex flex-wrap gap-2">
                <select 
                    wire:model="sortBy" 
                    class="px-3 py-2 text-sm rounded-lg border border-gray-200 bg-gray-50 text-gray-900 focus:ring-primary focus:border-primary"
                >
                    <option value="price_monthly">Harga: Rendah ke Tinggi</option>
                    <option value="price_monthly desc">Harga: Tinggi ke Rendah</option>
                    <option value="name">Nama: A-Z</option>
                    <option value="created_at desc">Terbaru</option>
                </select>
                <button 
                    wire:click="$toggle('showFilters')" 
                    class="inline-flex items-center text-sm font-medium text-primary hover:text-primary-dark"
                >
                    <i class="fas fa-sliders-h mr-2"></i> Filter
                </button>
            </div>
        </div>
    </div>

    <!-- Room Cards Container - Centered with flex-wrap -->
    <div class="flex justify-center">
        <div class="flex flex-wrap justify-center gap-8 max-w-8xl">
            @foreach($rooms as $room)
                <div wire:key="room-{{ $room->id }}"
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group border border-gray-100 w-full sm:w-80 md:w-72 lg:w-80">
                    <div class="relative overflow-hidden h-56">
                        <img src="{{ $room->mainImage() ? asset('storage/' . $room->mainImage()->image_path) : asset('images/default-room.jpg') }}"
                            alt="{{ $room->name }}" 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            loading="lazy">
                        
                        <!-- Badge status kamar dengan jumlah -->
                        <div class="absolute top-3 right-3 flex flex-col gap-2">
                            @if(isset($room->quantity) && $room->quantity < 1)
                                <span class="bg-red-500/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                    Habis
                                </span>
                            @else
                                <span class="{{ isset($room->is_actually_available) ? ($room->is_actually_available ? 'bg-green-500/90' : 'bg-red-500/90') : ($room->is_available ? 'bg-green-500/90' : 'bg-red-500/90') }} text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                    {{ isset($room->is_actually_available) ? ($room->is_actually_available ? 'Tersedia' : 'Terisi') : ($room->is_available ? 'Tersedia' : 'Terisi') }}
                                </span>
                                @if(isset($room->available_rooms) && $room->available_rooms > 0)
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
                                <h3 class="text-xl font-bold mb-1 text-gray-800 group-hover:text-primary transition-colors duration-300 line-clamp-1">
                                    {{ $room->name }}
                                </h3>
                                <span class="text-primary font-bold text-lg whitespace-nowrap">
                                    {{ isset($room->formatted_price_monthly) ? $room->formatted_price_monthly : 'Rp ' . number_format($room->price_monthly, 0, ',', '.') }}
                                </span>
                            </div>
                            @if(isset($room->location))
                                <p class="text-sm text-gray-500 mt-1 flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1.5 text-primary/80"></i>
                                    {{ $room->location ?? 'Lokasi Kosku' }}
                                </p>
                            @endif
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
                                            Tidak ada kamar
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
                                @foreach($room->facilities->take(3) as $facility)
                                    <span class="bg-gray-100 rounded-full px-3 py-1 text-xs text-gray-700">{{ $facility->name }}</span>
                                @endforeach
                                @if($room->facilities->count() > 3)
                                    <span class="bg-gray-100 rounded-full px-3 py-1 text-xs text-gray-700">+{{ $room->facilities->count() - 3 }}</span>
                                @endif
                            </div>
                        @endif

                        <!-- Tombol dengan status yang sesuai -->
                        <a href="{{ route('room-detail', $room->slug) }}" 
                           class="block w-full text-center {{ (isset($room->quantity) && $room->quantity > 0 && isset($room->is_actually_available) && $room->is_actually_available) || (!isset($room->quantity) && $room->is_available) ? 'bg-primary hover:bg-primary-dark' : 'bg-gray-500 hover:bg-gray-600' }} text-black py-3 px-4 rounded-lg transition-all duration-300 hover:shadow-md font-medium flex items-center justify-center gap-2">
                            <i class="fas fa-eye"></i>
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if(isset($rooms) && $rooms->isEmpty())
        <div class="text-center py-12 bg-gray-50 rounded-lg max-w-4xl mx-auto">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" 
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="text-gray-500 text-lg mb-2">Belum ada kamar yang tersedia saat ini.</p>
            <p class="text-gray-400">Silakan cek kembali nanti</p>
        </div>
    @endif

    <!-- Pagination if needed -->
    @if(isset($rooms) && method_exists($rooms, 'links') && $rooms->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $rooms->links() }}
        </div>
    @endif
</div>