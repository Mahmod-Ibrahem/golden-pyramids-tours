@extends('layout.layouts')

@section('title', 'About Golden Pyramids Travel')

@section('content')
    {{-- Hero Section --}}
    <section class="relative min-h-[50vh] w-full">
        {{-- Background Image --}}
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat md:bg-fixed"
            style="background-image: url('{{ asset('Images/About Us.jpg') }}');">
        </div>

        {{-- Gradient Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/50 to-black/70"></div>

        {{-- Content --}}
        <div class="relative z-10 flex flex-col items-center justify-center min-h-[50vh] px-4 text-center">
            <div class="inline-flex items-center gap-3 mb-6">
                <span class="w-12 h-0.5 bg-gradient-to-r from-transparent to-amber-400"></span>
                <span class="text-amber-400 font-semibold text-sm uppercase tracking-widest">Our Journey</span>
                <span class="w-12 h-0.5 bg-gradient-to-l from-transparent to-amber-400"></span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white max-w-4xl leading-tight">
                {{ __('Discover The Story Of') }}
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-500">
                    Golden Pyramids Travel
                </span>
            </h1>
        </div>
    </section>

    {{-- Our Story Section --}}
    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                {{-- Section Header --}}
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">
                        {{ __('Our Story') }}
                    </h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-amber-400 to-amber-600 mx-auto rounded-full mb-8"></div>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        {{ __('Since 2010, Golden Pyramids Travel has been curating extraordinary journeys across Egypt, from its timeless wonders to its best-kept secrets. Our team of expert Egyptologists and seasoned travel specialists is passionate about crafting immersive experiences that connect travelers with the rich heritage, vibrant culture, and breathtaking landscapes of this ancient land. Whether exploring the grandeur of the pyramids or uncovering hidden treasures, we ensure every adventure is as captivating as Egypt itself.') }}
                    </p>
                </div>

                {{-- Features Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    {{-- Expert Guides --}}
                    <div
                        class="group text-center p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-amber-200 hover:-translate-y-1">
                        <div
                            class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-amber-100 to-amber-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-amber-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2 group-hover:text-amber-600 transition-colors duration-300">
                            {{ __('Expert Guides') }}
                        </h3>
                        <p class="text-sm text-gray-600">{{ __('Knowledgeable Egyptologists as your companions') }}</p>
                    </div>

                    {{-- Tailored Itineraries --}}
                    <div
                        class="group text-center p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-amber-200 hover:-translate-y-1">
                        <div
                            class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-amber-100 to-amber-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-amber-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2 group-hover:text-amber-600 transition-colors duration-300">
                            {{ __('Tailored Itineraries') }}
                        </h3>
                        <p class="text-sm text-gray-600">{{ __('Create your own customized itinerary') }}</p>
                    </div>

                    {{-- Diverse Experiences --}}
                    <div
                        class="group text-center p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-amber-200 hover:-translate-y-1">
                        <div
                            class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-amber-100 to-amber-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-amber-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2 group-hover:text-amber-600 transition-colors duration-300">
                            {{ __('Diverse Experiences') }}
                        </h3>
                        <p class="text-sm text-gray-600">{{ __('Discover diverse experiences across Egypt') }}</p>
                    </div>

                    {{-- 5-Star Experiences --}}
                    <div
                        class="group text-center p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-amber-200 hover:-translate-y-1">
                        <div
                            class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-amber-100 to-amber-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-amber-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2 group-hover:text-amber-600 transition-colors duration-300">
                            {{ __('5-Star Experiences') }}
                        </h3>
                        <p class="text-sm text-gray-600">{{ __("Consistently top-rated services") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Mission Statement --}}
    <section class="py-20 bg-gradient-to-r from-amber-500 via-amber-600 to-amber-500 relative overflow-hidden">
        {{-- Decorative Elements --}}
        <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full translate-x-1/3 translate-y-1/3"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-3 mb-6">
                <span class="w-12 h-0.5 bg-gradient-to-r from-transparent to-white/60"></span>
                <span class="text-white/80 font-semibold text-sm uppercase tracking-widest">What Drives Us</span>
                <span class="w-12 h-0.5 bg-gradient-to-l from-transparent to-white/60"></span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-8">{{ __('Our Mission') }}</h2>
            <p class="text-xl text-white/90 leading-relaxed">
                {{ __('To share the wonders of Egypt past and present, crafting unforgettable journeys that inspire, educate, and immerse travelers in the rich heritage and vibrant culture of this extraordinary land.') }}
            </p>
        </div>
    </section>

    {{-- Call to Action --}}
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">
                {{ __('Ready to Explore Egypt?') }}
            </h2>
            <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                {{ __('Join us on a journey through time and create unforgettable memories that will last a lifetime.') }}
            </p>
            <a href="{{ route('Contact.index') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-amber-500 to-amber-600 
                              text-white font-bold text-lg rounded-full shadow-lg shadow-amber-500/30
                              hover:shadow-xl hover:shadow-amber-500/40 hover:scale-105
                              transition-all duration-300 group">
                {{ __('Start Planning Your Trip') }}
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </section>
@endsection