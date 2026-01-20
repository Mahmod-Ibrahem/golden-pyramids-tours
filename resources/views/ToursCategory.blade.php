<section id="ToursCategory" class="py-12 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Category Header --}}
        <div class="mb-10">
            <h1 class="text-2xl md:text-3xl font-bold text-amber-600 mb-4">
                {{ $tours[0]['category']['header'] ?? 'Tours' }}
            </h1>
            <div class="prose prose-lg max-w-none prose-a:no-underline prose-a:text-amber-600 prose-a:font-medium 
                        prose-p:text-gray-600 prose-p:leading-relaxed prose-h2:text-gray-800 prose-h2:font-bold">
                {!! $tours[0]['category']['description'] ?? '' !!}
            </div>
            <div class="mt-4 w-20 h-1 bg-gradient-to-r from-amber-400 to-amber-600 rounded-full"></div>
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
                <div class="col-span-full text-center py-16">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-amber-100 rounded-full mb-6">
                        <svg class="w-10 h-10 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Coming Soon</h3>
                    <p class="text-gray-500">New tours are being prepared for you!</p>
                </div>
            @endforelse
        </div>
    </div>
</section>