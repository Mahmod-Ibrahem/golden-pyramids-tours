{{-- Main Navigation Bar --}}
<nav class="relative bg-gradient-to-r from-gray-900 via-black to-gray-900 shadow-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            {{-- Mobile Logo --}}
            <div class="md:hidden flex-shrink-0">
                <a href="{{ route('home') }}" class="block">
                    <img src="{{ asset('/Images/logo.png') }}" class="h-14 w-auto object-contain"
                        alt="Golden Pyramids Travel Logo">
                </a>
            </div>

            {{-- Desktop Logo (Center) --}}
            <div class="hidden md:flex">
                <a href="{{ route('home') }}" class="block">
                    <img src="{{ asset('/Images/Logo.png') }}" alt="Golden Pyramids Travel Logo"
                        class="h-16 w-auto object-contain hover:scale-105 transition-transform duration-300">
                </a>
            </div>

            {{-- Desktop Navigation Links --}}
            <div class="hidden md:flex items-center gap-1">
                <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300
                          {{ Route::currentRouteName() == 'home'
    ? 'text-amber-400 bg-amber-400/10'
    : 'text-gray-300 hover:text-amber-400 hover:bg-white/5' }}">
                    {{ __('Home') }}
                </a>
                <a href="{{ route('DayTours.index', ['type' => 'dayTours']) }}" class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300
                          {{ Route::currentRouteName() == 'DayTours.index'
    ? 'text-amber-400 bg-amber-400/10'
    : 'text-gray-300 hover:text-amber-400 hover:bg-white/5' }}">
                    {{ __('Day Tours') }}
                </a>
                <a href="{{ route('TourPackages.index', ['type' => 'tourPackages']) }}" class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300
                          {{ Route::currentRouteName() == 'TourPackages.index'
    ? 'text-amber-400 bg-amber-400/10'
    : 'text-gray-300 hover:text-amber-400 hover:bg-white/5' }}">
                    {{ __('Tour Packages') }}
                </a>
                <a href="{{ route('Blog.index') }}" class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300
                          {{ Route::currentRouteName() == 'Blog.index'
    ? 'text-amber-400 bg-amber-400/10'
    : 'text-gray-300 hover:text-amber-400 hover:bg-white/5' }}">
                    {{ __('Blog') }}
                </a>
                <a href="{{ route('Contact.index') }}" class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300
                          {{ Route::currentRouteName() == 'Contact.index'
    ? 'text-amber-400 bg-amber-400/10'
    : 'text-gray-300 hover:text-amber-400 hover:bg-white/5' }}">
                    {{ __('Contact') }}
                </a>
                <a href="{{ route('about') }}" class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300
                          {{ Route::currentRouteName() == 'about'
    ? 'text-amber-400 bg-amber-400/10'
    : 'text-gray-300 hover:text-amber-400 hover:bg-white/5' }}">
                    {{ __('About Us') }}
                </a>
            </div>

            {{-- CTA Button --}}
            <div class="flex items-center gap-4">
                {{-- Mobile Menu Button --}}
                <button id="mobile-menu-button" type="button" class="md:hidden p-2 rounded-lg text-gray-300 hover:text-amber-400 hover:bg-white/10 
                               transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-amber-400/50">
                    <span class="sr-only">Open menu</span>
                    {{-- Hamburger Icon --}}
                    <svg id="hamburger-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    {{-- Close Icon --}}
                    <svg id="close-icon" class="hidden w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu"
        class="hidden md:hidden absolute top-full left-0 right-0 bg-gray-900 border-t border-white/10 shadow-2xl z-50 overflow-hidden transition-all duration-300 max-h-0">
        <div class="px-4 py-6 space-y-2">
            <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-base font-medium transition-all duration-300
                      {{ Route::currentRouteName() == 'home'
    ? 'text-amber-400 bg-amber-400/10'
    : 'text-gray-300 hover:text-amber-400 hover:bg-white/5' }}">
                {{ __('Home') }}
            </a>
            <a href="{{ route('DayTours.index', ['type' => 'dayTours']) }}" class="block px-4 py-3 rounded-xl text-base font-medium transition-all duration-300
                      {{ Route::currentRouteName() == 'DayTours.index'
    ? 'text-amber-400 bg-amber-400/10'
    : 'text-gray-300 hover:text-amber-400 hover:bg-white/5' }}">
                {{ __('Day Tours') }}
            </a>
            <a href="{{ route('TourPackages.index', ['type' => 'tourPackages']) }}" class="block px-4 py-3 rounded-xl text-base font-medium transition-all duration-300
                      {{ Route::currentRouteName() == 'TourPackages.index'
    ? 'text-amber-400 bg-amber-400/10'
    : 'text-gray-300 hover:text-amber-400 hover:bg-white/5' }}">
                {{ __('Tour Packages') }}
            </a>
            <a href="{{ route('Blog.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium transition-all duration-300
                      {{ Route::currentRouteName() == 'Blog.index'
    ? 'text-amber-400 bg-amber-400/10'
    : 'text-gray-300 hover:text-amber-400 hover:bg-white/5' }}">
                {{ __('Blog') }}
            </a>
            <a href="{{ route('Contact.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium transition-all duration-300
                      {{ Route::currentRouteName() == 'Contact.index'
    ? 'text-amber-400 bg-amber-400/10'
    : 'text-gray-300 hover:text-amber-400 hover:bg-white/5' }}">
                {{ __('Contact') }}
            </a>
            <a href="{{ route('about') }}" class="block px-4 py-3 rounded-xl text-base font-medium transition-all duration-300
                      {{ Route::currentRouteName() == 'about'
    ? 'text-amber-400 bg-amber-400/10'
    : 'text-gray-300 hover:text-amber-400 hover:bg-white/5' }}">
                {{ __('About Us') }}
            </a>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const button = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');
        let isOpen = false;

        button.addEventListener('click', function () {
            isOpen = !isOpen;

            if (isOpen) {
                menu.classList.remove('hidden');
                // Use a small timeout to allow the transition to trigger
                setTimeout(() => {
                    menu.style.maxHeight = '500px'; // Approximation for menu height
                }, 10);
                hamburgerIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                menu.style.maxHeight = '0px';
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                // Hide after transition
                setTimeout(() => {
                    if (!isOpen) menu.classList.add('hidden');
                }, 300);
            }
        });
    });
</script>