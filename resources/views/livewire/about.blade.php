<!-- resources/views/livewire/about.blade.php -->
<div class="container mx-auto px-4 py-12">
    <!-- Breadcrumb -->
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
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Tentang Kami</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Header Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Tentang Kami</h1>
        <div class="w-24 h-1 bg-primary mx-auto"></div>
    </div>

    <!-- About Content -->
    @if($aboutContent)
    <section class="mb-16">
        <div class="bg-white rounded-lg shadow-md p-8">
            <div class="prose max-w-none">
                {!! nl2br(e($aboutContent)) !!}
            </div>
        </div>
    </section>
    @endif

    <!-- Vision & Mission -->
    @if($visionMission)
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Visi & Misi</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white rounded-lg shadow-md p-8 border-l-4 border-primary">
                <h3 class="text-xl font-semibold text-primary mb-4">Visi</h3>
                <div class="prose max-w-none">
                    {!! nl2br(e(explode('|', $visionMission)[0] ?? '')) !!}
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md p-8 border-l-4 border-secondary">
                <h3 class="text-xl font-semibold text-secondary mb-4">Misi</h3>
                <div class="prose max-w-none">
                {!! nl2br(e(explode('|', $visionMission)[1] ?? '')) !!}
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Team Section -->
    @if(!empty($team))
    <section>
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Tim Kami</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($team as $member)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="h-48 bg-gray-200 overflow-hidden">
                    @if(isset($member['photo']))
                    <img src="{{ asset('storage/' . $member['photo']) }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-100">
                        <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-1">{{ $member['name'] ?? '' }}</h3>
                    <p class="text-gray-600 mb-3">{{ $member['position'] ?? '' }}</p>
                    @if(isset($member['bio']))
                    <p class="text-gray-700 text-sm">{{ $member['bio'] }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
</div>