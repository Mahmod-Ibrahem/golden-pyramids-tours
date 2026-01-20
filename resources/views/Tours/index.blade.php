@extends('layout.layouts')
@section('content')
    {{-- Hero Section --}}
    <section class="relative min-h-[50vh] md:min-h-screen w-full">
        {{-- Background Image --}}
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat md:bg-fixed"
            style="background-image: url('{{ asset('Images/DayToursBg.jpg') }}');">
        </div>

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/50 to-black/70"></div>

        {{-- Content --}}
        <div class="relative z-10 flex flex-col items-center justify-center min-h-[50vh] md:min-h-screen px-4 text-center">
            {{-- Decorative Element --}}
            <div class="inline-flex items-center gap-3 mb-6">
                <span class="w-12 h-0.5 bg-gradient-to-r from-transparent to-amber-400"></span>
                <span class="text-amber-400 font-semibold text-sm uppercase tracking-widest">Explore Egypt</span>
                <span class="w-12 h-0.5 bg-gradient-to-l from-transparent to-amber-400"></span>
            </div>

            {{-- Title --}}
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white max-w-4xl leading-tight mb-6">
                {{ __("Top Best Egypt Day Tours & Excursions") }}
            </h1>

            {{-- Subtitle --}}
            <p class="text-lg md:text-xl text-gray-300 max-w-2xl mb-8">
                Discover ancient wonders, hidden gems, and unforgettable experiences across Egypt
            </p>

            {{-- Scroll Indicator --}}
            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
                <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </div>
        </div>
    </section>

    {{-- Categories Section --}}
    <section class="bg-gradient-to-b from-gray-50 to-white">
        @component('components.Sections.DayToursCategory', ['categories' => $category])
        @endcomponent
    </section>
@endsection