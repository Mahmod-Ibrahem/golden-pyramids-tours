<div
    class="parent_container max-w-[67rem] md:pt-6">
    <h2 class="text-2xl font-bold text-link-color leading-[3rem] md:mb-3 md:text-4xl ">Customers' Reviews
    </h2>
    <div id="Testimonials_Cards"
         class="flex items-center  w-[22rem] gap-6
                  md:flex-row md:items-start  md:gap-2 md:w-full
                    overflow-x-auto overflow-y-hidden  scroll-smooth hide-scrollbar mt-5 md:mt-0">
        @foreach($reviews as $review)
            @component('components.TripadvisorTourCard',['review'=>$review])@endcomponent

        @endforeach


    </div>
    <div class=" gap-2 flex">
        <div id="prevTestimonials" class="cursor-pointer">
            <svg class="h-8 w-8 text-main hover:text-link-color shadow-2xl transition-all"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <polyline points="12 8 8 12 12 16"/>
                <line x1="16" y1="12" x2="8" y2="12"/>
            </svg>
        </div>

        <div id="nextTestimonials" class="cursor-pointer md:mb-2">
            <svg class="h-8 w-8 text-main hover:text-link-color transition-all" viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <polyline points="12 16 16 12 12 8"/>
                <line x1="8" y1="12" x2="16" y2="12"/>
            </svg>
        </div>
    </div>
</div>
<script>

    const Testimonials_Cards = document.getElementById("Testimonials_Cards");
    const tripadvisorCard = document.getElementById('tripadvisorCard')
    const testNext = document.getElementById('nextTestimonials')
    const testPrev = document.getElementById('prevTestimonials')
    testNext.addEventListener('click', () => TestScrollHorizontal(1))
    testPrev.addEventListener('click', () => TestScrollHorizontal(-1))
    // sm_prev.addEventListener('click', () => ScrollHorizontal(-1))
    // sm_next.addEventListener('click', () => ScrollHorizontal(1))
    function TestScrollHorizontal(sign) {
        if (window.innerWidth >= 768) {
            Testimonials_Cards.scrollLeft += tripadvisorCard.clientWidth * sign;
        } else {
            console.log(tripadvisorCard.clientWidth)
            Testimonials_Cards.scrollLeft += (tripadvisorCard.clientWidth+24) * sign;
        }
    }
</script>
