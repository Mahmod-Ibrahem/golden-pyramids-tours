<section id="Trend Destination">
    <div class="parent_container relative ">
        <h2 class="parent_header" id="Trend_header">Top Destinations</h2>
        <div id="TrendCard"
             class="child_container gap-6 mx-auto">
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
                @component('components.core.DestinationCard', ['destination' => 'Al-Faiyum'])
                @slot('image')
                    {{asset('Images/Best Destination/Faiyum.jpg')}}
                @endslot
            @endcomponent


        </div>
    </div>
</section>
