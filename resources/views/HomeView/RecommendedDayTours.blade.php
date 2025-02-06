<section id="RecommendedTours" class="bg-[#F5F5F5] py-6 select-none">
    <div class="parent_container gap-8">
        <div class="flex items-center gap-3">
            <h1 class="parent_header">Recommended Day Tours</h1>

        </div>
        <div class="child_container gap-9">
            @forelse($tours as $tour)
                    @component('components.TourCard', ['tour' => $tour])
                        @slot('image')
                            {{ asset($tour['tour_cover']) }}
                        @endslot
                    @endcomponent
            @empty
            @endforelse


        </div>
    </div>
</section>
