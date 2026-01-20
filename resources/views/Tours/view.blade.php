@extends('layout.layouts')
@section('content')
    {{-- Hero Section --}}
    <section class="relative min-h-[40vh] md:min-h-screen w-full">
        {{-- Background Image --}}
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat md:bg-fixed"
            style="background-image: url('{{ $tours[0]['category']['image'] ?? asset('Images/Soon.jpg') }}');">
        </div>

        {{-- Gradient Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/40 to-black/70"></div>

        {{-- Content --}}
        <div class="relative z-10 flex flex-col items-center justify-center min-h-[40vh] md:min-h-screen px-4 text-center">
            {{-- Title --}}
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white max-w-4xl leading-tight mb-4">
                {{ __('Discover Top') }}
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-500">
                    +{{ $tours->count() }}
                </span>
                {{ $tours[0]['category']['name'] ?? 'Tours' }}
            </h1>

            {{-- Stats --}}
            <div class="flex items-center gap-8 text-white/80">
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-amber-400">{{ $tours->count() }}</div>
                    <div class="text-sm">Available Tours</div>
                </div>
                <div class="w-px h-12 bg-white/20"></div>
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-amber-400">5★</div>
                    <div class="text-sm">Rated Experience</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Tours Grid Section --}}
    <section class="bg-gradient-to-b from-gray-50 to-white">
        @component('ToursCategory', ['tours' => $tours])
        @endcomponent
    </section>
@endsection