<!-- resources/views/livewire/testimonials.blade.php -->
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
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Testimoni</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Testimoni Penghuni</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Apa kata mereka tentang pengalaman tinggal di kos kami</p>
        <div class="w-24 h-1 bg-primary mx-auto mt-4"></div>
    </div>

    <!-- Featured Testimonials -->
    @if($featuredTestimonials->count() > 0)
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-center mb-8">Testimoni Pilihan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredTestimonials as $testimonial)
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                        <img 
                            src="{{ $testimonial->photo ? asset('storage/' . $testimonial->photo) : asset('images/default-avatar.jpg') }}" 
                            alt="{{ $testimonial->name }}" 
                            class="w-full h-full object-cover"
                        >
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">{{ $testimonial->name }}</h4>
                        @if($testimonial->position)
                            <p class="text-sm text-gray-600">{{ $testimonial->position }}</p>
                        @endif
                    </div>
                </div>
                <div class="mb-4 flex">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="text-{{ $i <= $testimonial->rating ? 'yellow' : 'gray' }}-400">★</span>
                    @endfor
                </div>
                <p class="text-gray-700 italic">"{{ $testimonial->content }}"</p>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- All Testimonials -->
    <section>
        <h2 class="text-2xl font-bold text-center mb-8">Semua Testimoni</h2>
        
        @if($testimonials->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                        <img 
                            src="{{ $testimonial->photo ? asset('storage/' . $testimonial->photo) : asset('images/default-avatar.jpg') }}" 
                            alt="{{ $testimonial->name }}" 
                            class="w-full h-full object-cover"
                        >
                    </div>
                    <div>
                        <h4 class="font-bold">{{ $testimonial->name }}</h4>
                        @if($testimonial->position)
                            <p class="text-sm text-gray-600">{{ $testimonial->position }}</p>
                        @endif
                    </div>
                </div>
                <div class="mb-4 flex">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="text-{{ $i <= $testimonial->rating ? 'yellow' : 'gray' }}-400">★</span>
                    @endfor
                </div>
                <p class="text-gray-700">"{{ $testimonial->content }}"</p>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
            </svg>
            <h3 class="mt-2 text-lg font-medium text-gray-900">Belum ada testimoni</h3>
            <p class="mt-1 text-gray-500">Testimoni dari penghuni akan muncul di sini.</p>
        </div>
        @endif
    </section>
</div>