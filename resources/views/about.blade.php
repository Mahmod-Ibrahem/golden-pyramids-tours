@extends('layout.layouts')

@section('title', 'About Golden Pyramids Travel')

@section('content')
    <section class="md:bg-fixed relative h-[50vh]  w-full"
             style="background-image: url('{{ asset('Images/About Us.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;"
    >
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <h1 class="backgroundImageHeader">
                {{__('Discover The Story Of') }} Golden Pyramids Travel
            </h1>
        </div>
    </section>
    <!-- Introduction Section -->
    <section class="py-16">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6 text-main">{{__('Our Story')}}</h2>
                <p class="text-gray-700 mb-8">
                    {{ __('Since 2010, Golden Pyramids Travel has been curating extraordinary journeys across Egypt, from its timeless wonders to its best-kept secrets. Our team of expert Egyptologists and seasoned travel specialists is passionate about crafting immersive experiences that connect travelers with the rich heritage, vibrant culture, and breathtaking landscapes of this ancient land. Whether exploring the grandeur of the pyramids or uncovering hidden treasures, we ensure every adventure is as captivating as Egypt itself.')}}
                </p>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <svg class="w-12 h-12 text-bg-main mx-auto mb-4" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <h3 class="font-semibold mb-2">{{__('Expert Guides')}}</h3>
                        <p class="text-gray-600">{{__('Knowledgeable Egyptologists as your companions')}}</p>
                    </div>
                    <div class="text-center">
                        <svg class="w-12 h-12 text-bg-main mx-auto mb-4" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <h3 class="font-semibold mb-2">{{__('Tailored Itineraries')}}</h3>
                        <p class="text-gray-600">{{__('Create your own customized itinerary')}}</p>
                    </div>
                    <div class="text-center">
                        <svg class="w-12 h-12 text-bg-main mx-auto mb-4" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                        <h3 class="font-semibold mb-2">{{__('Diverse Experiences')}}</h3>
                        <p class="text-gray-600">{{__('Discover diverse experiences across Egypt')}}</p>
                    </div>
                    <div class="text-center">
                        <svg class="w-12 h-12 text-bg-main mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                        <h3 class="font-semibold mb-2">{{__('5-Star Experiences')}}</h3>
                        <p class="text-gray-600">{{__("Consistently top-rated services")}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Statement -->
    <section class="bg-bg-main text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6">{{__('Our Mission')}}</h2>
                <p class="text-xl">
                    {{__('To share the wonders of Egypt’s past and present, crafting unforgettable journeys that inspire, educate, and immerse travelers in the rich heritage and vibrant culture of this extraordinary land.')}}
                </p>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6 text-black">{{__('Ready to Explore Egypt?')}}</h2>
            <p class="text-xl text-gray-700 mb-8">{{__('Join us on a journey through time and create unforgettable memories that will last a lifetime.')}}</p>
            <a href="{{ route('Contact.index') }}"
               class="bg-bg-main text-white font-semibold py-3 px-8 rounded-full hover:bg-yellow-600 transition duration-300">
                {{__('Start Planning Your Trip')}}
            </a>
        </div>
    </section>
@endsection
