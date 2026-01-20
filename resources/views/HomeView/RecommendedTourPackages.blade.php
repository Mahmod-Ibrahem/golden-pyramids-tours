<section id="RecommendedTourPackages" class="py-16 bg-gradient-to-b from-white via-amber-50/20 to-white select-none">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-3 mb-4">
                <span class="w-12 h-0.5 bg-gradient-to-r from-transparent to-amber-400"></span>
                <span class="text-amber-600 font-semibold text-sm uppercase tracking-wider">Multi-Day Adventures</span>
                <span class="w-12 h-0.5 bg-gradient-to-l from-transparent to-amber-400"></span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800">
                {{__('Recommended Tour Packages')}}
            </h1>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                Immerse yourself in Egypt's rich history and culture with our comprehensive tour packages.
            </p>
        </div>

        {{-- Tours Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($tours as $tour)
                @component('components.TourCard', ['tour' => $tour])
                @slot('image')
                {{ asset($tour['tour_cover']) }}
                @endslot
                @endcomponent
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-100 rounded-full mb-4">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-gray-500 text-lg">No tour packages available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>