@extends('layout.layouts')

@section('title')
    Golden Pyramids Travel | Explore Ancient Wonders & Hidden Gems
@endsection

@section('description')
    Join us on a journey through Egypt's rich history. Explore iconic landmarks like the Pyramids, temples, and more with
    expert guides. Start your adventure today!
@endsection

@section('content')
    {{-- Hero Section --}}
    <section class="relative min-h-[50vh] w-full">
        {{-- Background Image --}}
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat md:bg-fixed"
            style="background-image: url('{{ asset('Images/Blog.jpg') }}');">
        </div>

        {{-- Gradient Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/50 to-black/70"></div>

        {{-- Content --}}
        <div class="relative z-10 flex flex-col items-center justify-center min-h-[50vh] px-4 text-center">
            <div class="inline-flex items-center gap-3 mb-6">
                <span class="w-12 h-0.5 bg-gradient-to-r from-transparent to-amber-400"></span>
                <span class="text-amber-400 font-semibold text-sm uppercase tracking-widest">Travel Stories</span>
                <span class="w-12 h-0.5 bg-gradient-to-l from-transparent to-amber-400"></span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white max-w-4xl leading-tight">
                {!! $blogText->content !!}
            </h1>
        </div>
    </section>

    {{-- Blog Cities Grid --}}
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section Header --}}
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Explore Egypt's Destinations
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Discover travel guides and stories from Egypt's most captivating cities
                </p>
                <div class="mt-4 w-24 h-1 bg-gradient-to-r from-amber-400 to-amber-600 mx-auto rounded-full"></div>
            </div>

            {{-- Cities Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($cities as $city)
                    @component('components.CityCard', ['city' => $city])
                    @endcomponent
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-amber-100 rounded-full mb-6">
                            <svg class="w-10 h-10 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Coming Soon</h3>
                        <p class="text-gray-500">New travel stories and guides are on the way!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection