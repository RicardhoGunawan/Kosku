<!-- resources/views/livewire/gallery.blade.php -->
<div class="container mx-auto px-4 py-12">
    <!-- Breadcrumb Navigation -->
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Beranda
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Galeri</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Galeri Kami</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Lihat koleksi foto-foto kamar dan fasilitas kami</p>
        <div class="w-24 h-1 bg-primary mx-auto mt-4"></div>
    </div>

    <!-- Category Filter -->
    <div class="flex flex-wrap justify-center mb-8 gap-2">
        <button 
            wire:click="filterByCategory('all')"
            class="px-4 py-2 rounded-full text-sm font-medium {{ $selectedCategory === 'all' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}"
        >
            Semua
        </button>
        
        @foreach($categories as $category)
            <button 
                wire:click="filterByCategory('{{ $category }}')"
                class="px-4 py-2 rounded-full text-sm font-medium {{ $selectedCategory === $category ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}"
            >
                {{ $category }}
            </button>
        @endforeach
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($galleries as $gallery)
            <div class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                <img 
                    src="{{ asset('storage/' . $gallery->image_path) }}" 
                    alt="{{ $gallery->caption ?? 'Galeri' }}" 
                    class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105"
                    loading="lazy"
                >
                
                @if($gallery->caption)
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm">{{ $gallery->caption }}</p>
                    </div>
                @endif
                
                @if($gallery->category)
                    <span class="absolute top-2 right-2 bg-white/90 text-xs font-medium px-2 py-1 rounded">
                        {{ $gallery->category }}
                    </span>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Empty State -->
    @if($galleries->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <h3 class="mt-2 text-lg font-medium text-gray-900">Tidak ada foto</h3>
            <p class="mt-1 text-gray-500">Belum ada foto yang tersedia di galeri ini.</p>
        </div>
    @endif
</div>