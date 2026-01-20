<footer class="bg-gradient-to-b from-gray-900 to-black text-gray-300">
    {{-- Main Footer Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-12 lg:gap-8">
            {{-- Brand & Contact Info --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="inline-block">
                    <img src="{{ asset('/Images/logo.png') }}" alt="Golden Pyramids Travel Logo"
                        class="h-16 w-auto object-contain hover:opacity-80 transition-opacity duration-300">
                </a>

                {{-- Contact Details --}}
                <div class="space-y-4">
                    <a href="tel:+201101833336"
                        class="flex items-center gap-3 group hover:text-amber-400 transition-colors duration-300">
                        <span
                            class="flex-shrink-0 w-10 h-10 bg-amber-500/10 rounded-lg flex items-center justify-center group-hover:bg-amber-500/20 transition-colors duration-300">
                            <svg class="w-5 h-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </span>
                        <span class="font-medium">+201101833336</span>
                    </a>
                    <a href="mailto:info@GoldenPyramidsTravel.com"
                        class="flex items-center gap-3 group hover:text-amber-400 transition-colors duration-300">
                        <span
                            class="flex-shrink-0 w-10 h-10 bg-amber-500/10 rounded-lg flex items-center justify-center group-hover:bg-amber-500/20 transition-colors duration-300">
                            <svg class="w-5 h-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </span>
                        <span class="font-medium text-sm">info@GoldenPyramidsTravel.com</span>
                    </a>
                </div>
            </div>

            {{-- Main Pages --}}
            <div>
                <h4 class="text-white font-bold text-lg mb-6 relative">
                    {{ __('Main Pages') }}
                    <span class="absolute -bottom-2 left-0 w-8 h-0.5 bg-amber-500 rounded-full"></span>
                </h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('home') }}"
                            class="text-gray-400 hover:text-amber-400 hover:pl-2 transition-all duration-300">
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Transfer.index') }}"
                            class="text-gray-400 hover:text-amber-400 hover:pl-2 transition-all duration-300">
                            {{ __('Transfer Service') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Contact.index') }}"
                            class="text-gray-400 hover:text-amber-400 hover:pl-2 transition-all duration-300">
                            {{ __('Contact') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                            class="text-gray-400 hover:text-amber-400 hover:pl-2 transition-all duration-300">
                            {{ __('About Us') }}
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Categories --}}
            <div>
                <h4 class="text-white font-bold text-lg mb-6 relative">
                    {{ __('Categories') }}
                    <span class="absolute -bottom-2 left-0 w-8 h-0.5 bg-amber-500 rounded-full"></span>
                </h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('DayTours.index') }}"
                            class="text-gray-400 hover:text-amber-400 hover:pl-2 transition-all duration-300">
                            {{ __('Day Tours') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('TourPackages.index') }}"
                            class="text-gray-400 hover:text-amber-400 hover:pl-2 transition-all duration-300">
                            {{ __('Tour Packages') }}
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Day Tours --}}
            <div>
                <h4 class="text-white font-bold text-lg mb-6 relative">
                    {{ __('Day Tours') }}
                    <span class="absolute -bottom-2 left-0 w-8 h-0.5 bg-amber-500 rounded-full"></span>
                </h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('DayTours.view', ['Category' => 'Cairo']) }}"
                            class="text-gray-400 hover:text-amber-400 hover:pl-2 transition-all duration-300">
                            {{ __('Cairo Tours') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('DayTours.view', ['Category' => 'Luxor']) }}"
                            class="text-gray-400 hover:text-amber-400 hover:pl-2 transition-all duration-300">
                            {{ __('Luxor Tours') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('DayTours.view', ['Category' => 'Aswan']) }}"
                            class="text-gray-400 hover:text-amber-400 hover:pl-2 transition-all duration-300">
                            {{ __('Aswan Tours') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('DayTours.view', ['Category' => 'Alexandria']) }}"
                            class="text-gray-400 hover:text-amber-400 hover:pl-2 transition-all duration-300">
                            {{ __('Alexandria Tours') }}
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Tour Packages --}}
            <div>
                <h4 class="text-white font-bold text-lg mb-6 relative">
                    {{ __('Tour Packages') }}
                    <span class="absolute -bottom-2 left-0 w-8 h-0.5 bg-amber-500 rounded-full"></span>
                </h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('TourPackages.view', ['Category' => 'egypt-classic-tours']) }}"
                            class="text-gray-400 hover:text-amber-400 hover:pl-2 transition-all duration-300">
                            {{ __('Egypt Classic Tours') }}
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"
                            class="text-gray-400 hover:text-amber-400 hover:pl-2 transition-all duration-300">
                            {{ __('Egypt Luxury Tours') }}
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"
                            class="text-gray-400 hover:text-amber-400 hover:pl-2 transition-all duration-300">
                            {{ __('Egypt Family Tours') }}
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"
                            class="text-gray-400 hover:text-amber-400 hover:pl-2 transition-all duration-300">
                            {{ __('Nile Cruise') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                {{-- Credits --}}
                <a href="https://www.instagram.com/mi_digital_works/" target="_blank"
                    class="flex items-center gap-2 text-gray-500 hover:text-amber-400 transition-colors duration-300">
                    <span>{{ __('Designed By') }}</span>
                    <img src="{{ asset('Images/devlogo.png') }}" alt="Developer Logo"
                        class="h-6 w-auto opacity-70 hover:opacity-100 transition-opacity duration-300">
                </a>

                {{-- Social Links --}}
                <div class="flex items-center gap-3">
                    {{-- Instagram --}}
                    <a href="javascript:;" class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-600 via-pink-500 to-orange-400 
                              flex items-center justify-center hover:scale-110 hover:shadow-lg hover:shadow-pink-500/30 
                              transition-all duration-300">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    {{-- Facebook --}}
                    <a href="javascript:;" class="w-10 h-10 rounded-full bg-blue-600 
                              flex items-center justify-center hover:scale-110 hover:shadow-lg hover:shadow-blue-500/30 
                              transition-all duration-300">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                    {{-- YouTube --}}
                    <a href="javascript:;" class="w-10 h-10 rounded-full bg-red-600 
                              flex items-center justify-center hover:scale-110 hover:shadow-lg hover:shadow-red-500/30 
                              transition-all duration-300">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                        </svg>
                    </a>
                    {{-- TripAdvisor --}}
                    <a href="javascript:;" class="w-10 h-10 rounded-full bg-emerald-500 
                              flex items-center justify-center hover:scale-110 hover:shadow-lg hover:shadow-emerald-500/30 
                              transition-all duration-300">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12.006 4.295c-2.67 0-5.338.784-7.645 2.353H0l1.963 2.135a5.997 5.997 0 0 0 4.04 10.432 5.976 5.976 0 0 0 4.075-1.6L12 19.5l1.922-1.885a5.976 5.976 0 0 0 4.075 1.6 5.997 5.997 0 0 0 4.04-10.432L24 6.648h-4.35a13.573 13.573 0 0 0-7.644-2.353zM6.003 17.216a3.999 3.999 0 1 1 0-7.998 3.999 3.999 0 0 1 0 7.998zm11.994 0a3.999 3.999 0 1 1 0-7.998 3.999 3.999 0 0 1 0 7.998zM6.003 11.217a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm11.994 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                        </svg>
                    </a>
                    {{-- TikTok --}}
                    <a href="javascript:;" class="w-10 h-10 rounded-full bg-gray-800 
                              flex items-center justify-center hover:scale-110 hover:shadow-lg hover:shadow-gray-500/30 
                              transition-all duration-300">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>