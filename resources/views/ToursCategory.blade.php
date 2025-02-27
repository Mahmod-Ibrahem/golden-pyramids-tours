<section id="RecommendedTours" class="bg-[#f9f9f9] py-6 select-none">
    <div class="parent_container gap-8 mt-0">
        <div
            class="flex flex-col items-center justify-center  md:items-start md:justify-start  px-3 md:max-w-[68rem] gap-2">
            <h1 class="font-semibold text-xl md:text-2xl text-bg-main">
                {{ $tours[0]['category']['header'] ?? 'Soon' }}
            </h1>
            <div class="capitalize prose max-w-none prose-a:no-underline prose-a:!text-bg-main !text-black prose-p:my-1 prose-h2:m-0">
                {!! $tours[0]['category']['description'] ??'Soon'!!}
            </div>
        </div>


        <div class="child_container gap-4 mx-auto">
            @forelse($tours as $tour)
                @component('components.TourCard', ['tour' => $tour])
                    @slot('image')
                        {{ asset($tour['tour_cover']) }}
                    @endslot
                @endcomponent
            @empty
                <p class="px-3 py-2 shadow-md rounded-lg text-center w-full font-semibold md:text-xl">Soon</p>
            @endforelse


        </div>
    </div>
</section>
