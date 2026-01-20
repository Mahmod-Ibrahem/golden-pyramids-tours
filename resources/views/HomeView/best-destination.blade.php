<section id="Trend Destination" class="py-16 bg-gradient-to-b from-white via-amber-50/30 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-3 mb-4">
                <span class="w-12 h-0.5 bg-gradient-to-r from-transparent to-amber-400"></span>
                <span class="text-amber-600 font-semibold text-sm uppercase tracking-wider">Explore Egypt</span>
                <span class="w-12 h-0.5 bg-gradient-to-l from-transparent to-amber-400"></span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight">
                {{__('Best Destinations In Egypt')}}
            </h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                Discover the wonders of Egypt with <span class="text-amber-600 font-semibold">Golden Pyramids
                    Travel!</span>
            </p>
        </div>

        {{-- Destination Grid --}}
        <div id="TrendCard" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            @component('components.core.DestinationCard', ['destination' => 'Giza'])
            @slot('image')
            {{asset('Images/Best Destination/Giza.jpg')}}
            @endslot
            @endcomponent

            @component('components.core.DestinationCard', ['destination' => 'Cairo'])
            @slot('image')
            {{asset('Images/Best Destination/Cairo.jpg')}}
            @endslot
            @endcomponent

            @component('components.core.DestinationCard', ['destination' => 'Luxor'])
            @slot('image')
            {{asset('Images/Best Destination/Luxor.jpg')}}
            @endslot
            @endcomponent

            @component('components.core.DestinationCard', ['destination' => 'Aswan'])
            @slot('image')
            {{asset('Images/Best Destination/Aswan.jpg')}}
            @endslot
            @endcomponent

            @component('components.core.DestinationCard', ['destination' => 'Alexandria'])
            @slot('image')
            {{asset('Images/Best Destination/Alexandria.jpg')}}
            @endslot
            @endcomponent

            @component('components.core.DestinationCard', ['destination' => 'Sharm El-Sheikh'])
            @slot('image')
            {{asset('Images/Best Destination/Sharm.jpg')}}
            @endslot
            @endcomponent

            @component('components.core.DestinationCard', ['destination' => 'Hurghada'])
            @slot('image')
            {{asset('Images/Best Destination/Hurghada.jpg')}}
            @endslot
            @endcomponent

            @component('components.core.DestinationCard', ['destination' => 'Al-Fayoum'])
            @slot('image')
            {{asset('Images/Best Destination/Faiyum.jpg')}}
            @endslot
            @endcomponent
        </div>
    </div>
</section>