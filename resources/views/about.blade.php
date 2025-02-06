@extends('layout.layouts')

@section('title', 'About Mr Egypt Tours')

@section('content')
    <section class="md:bg-fixed relative h-[50vh]  w-full"
             style="background-image: url('{{ asset('Images/TailorMade.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;"
    >
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <h1 class="backgroundImageHeader">
                {{__('Discover the Story of Mr Egypt Tours')}}
            </h1>
        </div>
    </section>
    <!-- Introduction Section -->
    <section class="py-16">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6 text-main">Our Story</h2>
                <p class="text-gray-700 mb-8">
                    Founded in 2010, Mr. Egypt Tours has been proudly guiding travelers through Egypt's iconic landmarks
                    and hidden gems. With a dedicated team of Egyptologists and experienced travel specialists, we
                    create personalized journeys that blend the fascinating history of ancient Egypt with the dynamic
                    charm of its modern culture.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <svg class="w-12 h-12 text-[#3B82F6] mx-auto mb-4" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <h3 class="font-semibold mb-2">Expert Guides</h3>
                        <p class="text-gray-600">Knowledgeable Egyptologists as your companions</p>
                    </div>
                    <div class="text-center">
                        <svg class="w-12 h-12 text-[#3B82F6] mx-auto mb-4" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <h3 class="font-semibold mb-2">Tailored Itineraries</h3>
                        <p class="text-gray-600">Customized tours to suit your interests</p>
                    </div>
                    <div class="text-center">
                        <svg class="w-12 h-12 text-[#3B82F6] mx-auto mb-4" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                        <h3 class="font-semibold mb-2">Diverse Experiences</h3>
                        <p class="text-gray-600">From pyramids to Red Sea resorts</p>
                    </div>
                    <div class="text-center">
                        <svg class="w-12 h-12 text-blue-600 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                        <h3 class="font-semibold mb-2">5-Star Experiences</h3>
                        <p class="text-gray-600">Consistently top-rated services</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Statement -->
    <section class="bg-[#3B82F6] text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6">Our Mission</h2>
                <p class="text-xl">
                    To share the wonders of Egypt’s past and present, crafting unforgettable journeys that inspire,
                    educate, and immerse travelers in the rich heritage and vibrant culture of this extraordinary land.
                </p>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-4 max-w-7xl">
            <h2 class="text-3xl font-bold mb-12 text-center text-[#3B82F6]">Why Choose Mr Egypt Tours?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4 text-[#3B82F6]">Authentic Experiences</h3>
                    <p class="text-gray-700">
                        Immerse yourself in authentic Egyptian culture through our thoughtfully designed experiences,
                        from serene felucca rides on the Nile to heartfelt meals shared with local families.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4 text-[#3B82F6]">Unparalleled Expertise</h3>
                    <p class="text-gray-700">Our team of licensed Egyptologists brings history to life, offering unique
                        insights and stories that go beyond the typical tourist experience, ensuring a deeper connection
                        with Egypt’s ancient wonders.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4 text-[#3B82F6]">Comfort and Safety</h3>
                    <p class="text-gray-700">Travel with peace of mind knowing that we prioritize your comfort and
                        safety, with 24/7 support and carefully vetted accommodations and transportation.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4 text-[#3B82F6]">Responsible Tourism</h3>
                    <p class="text-gray-700">We're committed to sustainable travel practices that respect Egypt's
                        cultural heritage and support local communities.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6 text-[#3B82F6]">Ready to Explore Egypt?</h2>
            <p class="text-xl text-gray-700 mb-8">Join us on a journey through time and create unforgettable memories
                that will last a lifetime.</p>
            <a href="{{ route('Contact.index') }}"
               class="bg-[#3B82F6] text-white font-bold py-3 px-8 rounded-full hover:bg-[#2563EB] transition duration-300">
                Start Planning Your Trip
            </a>
        </div>
    </section>
@endsection
