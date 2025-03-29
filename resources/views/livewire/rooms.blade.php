<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-center mb-8">Daftar Kamar Kos</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($rooms as $room)
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                <img src="{{ $room->mainImage() ? asset('storage/' . $room->mainImage()->image_path) : asset('images/default-room.jpg') }}" 
                     alt="{{ $room->name }}" 
                     class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">{{ $room->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($room->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-bold">{{ 'Rp ' . number_format($room->price_monthly, 0, ',', '.') }}/bulan</span>
                        <a href="{{ route('room-detail', $room->slug) }}" 
                           class="text-sm bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded transition duration-300">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>