<div class="container mx-auto px-4 py-12">
    <!-- Breadcrumb -->
    <nav class="mb-8" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-1 md:space-x-3 text-sm text-gray-600">
            <li>
                <a href="{{ route('home') }}" class="flex items-center hover:text-primary">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Beranda
                </a>
            </li>
            <li class="flex items-center text-gray-500">
                <svg class="w-3 h-3 mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                {{ $title ? trim($title, '"') : 'Tentang Kami' }}
            </li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-900">{{ trim($title, '"') }}</h1>
        <div class="w-24 h-1 bg-primary mx-auto mt-3"></div>
    </div>

    <!-- Content -->
    <div class="max-w-4xl mx-auto">
        <!-- Gambar -->
        <div class="mb-6 text-center">
            <img
                src="{{ $image ? asset('storage/' . trim($image, '\"')) : asset('images/default-about.jpg') }}"
                alt="Tentang Kami"
                class="mx-auto rounded-lg shadow-md max-h-96 object-cover"
            />
        </div>

        <!-- Deskripsi -->
        <div class="text-gray-700 leading-relaxed text-lg space-y-4">
            {!! nl2br(e(trim($description, '"'))) !!}
        </div>
    </div>
</div>
