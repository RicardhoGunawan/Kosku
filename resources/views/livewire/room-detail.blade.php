<!-- resources/views/livewire/room-detail.blade.php -->
<div>
    <!-- Room Header -->
    <section class="bg-primary text-white py-12">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold">{{ $room->name }}</h1>
            <div class="flex items-center mt-2">
                <span class="text-xl font-bold mr-4">{{ $room->formatted_price_monthly }}/bulan</span>
                @if($room->price_yearly)
                    <span class="text-lg">{{ $room->formatted_price_yearly }}/tahun</span>
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
                    <!-- Image Gallery -->
                    <div class="mb-8">
                        <div class="mb-4 rounded-lg overflow-hidden">
                            <img src="{{ $mainImage ? asset('storage/' . $mainImage->image_path) : asset('images/default-room.jpg') }}" alt="{{ $room->name }}" class="w-full h-96 object-cover">
                        </div>
                        @if($otherImages->count() > 0)
                            <div class="grid grid-cols-4 gap-2">
                                @foreach($otherImages as $image)
                                    <div class="rounded overflow-hidden cursor-pointer" wire:click="$set('mainImage', {{ $image }})">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $room->name }}" class="w-full h-20 object-cover">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Room Description -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold mb-4">Deskripsi Kamar</h2>
                        <div class="prose max-w-none">
                            {!! nl2br(e($room->description)) !!}
                        </div>
                    </div>

                    <!-- Room Facilities -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold mb-4">Fasilitas Kamar</h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($room->facilities as $facility)
                                <div class="flex items-center">
                                    @if($facility->icon)
                                        <span class="mr-2">{!! $facility->icon !!}</span>
                                    @endif
                                    <span>{{ $facility->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                        <h3 class="text-xl font-bold mb-4">Detail Kamar</h3>
                        <div class="space-y-4">
                            <div>
                                <span class="block text-gray-600">Tipe Kamar:</span>
                                <span class="font-medium">{{ $room->type }}</span>
                            </div>
                            <div>
                                <span class="block text-gray-600">Ukuran:</span>
                                <span class="font-medium">{{ $room->size }} m²</span>
                            </div>
                            <div>
                                <span class="block text-gray-600">Kapasitas:</span>
                                <span class="font-medium">{{ $room->capacity }} orang</span>
                            </div>
                            <div>
                                <span class="block text-gray-600">Status:</span>
                                <span class="font-medium {{ $room->is_available ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $room->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
                                </span>
                            </div>
                        </div>

                        @if($room->is_available)
                            <div class="mt-6">
                                <a href="{{ route('payment') }}" class="block w-full bg-primary hover:bg-primary-dark text-white text-center font-bold py-3 px-4 rounded-lg transition duration-300">
                                    Booking Sekarang
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Rooms -->
    @if($relatedRooms->count() > 0)
        <section class="py-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Kamar Lainnya</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($relatedRooms as $room)
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
            </div>
        </section>
    @endif
</div>