<section id="RecommendedTours" class="bg-[#f9f9f9] py-6 select-none">
    <div class="parent_container gap-8">
        <div class="flex items-center justify-center gap-3  mx-auto">
            <h1 class="parent_header">Select Your Ideal Egypt Tour Packages by Category

            </h1>

        </div>
        <div class="child_container gap-4 mx-auto">
            @forelse ($categories as $Category)
                @component('components.CategoryCard' , ['Category'=>$Category])
                    @slot('url')
                        {{$Category['image']}}
                    @endslot
                @endcomponent
            @empty
                not found
            @endforelse

        </div>
    </div>
</section>
