<section id="Testimonials"
         class="py-2">
    <div
        class="parent_container max-w-7xl mx-auto">
        <h2 class="parent_header">Dont Take Our Word For It
            Trust Our Guest
        </h2>
        <div id="Testimonials_Cards"
             class="flex items-center    md:flex-row md:items-start   max-w-[24rem] md:max-w-full md:gap-2
                    overflow-x-auto overflow-y-hidden  scroll-smooth hide-scrollbar mx-auto">
            @foreach($reviews as $review)
                @component('components.Tripadvisor',['review'=>$review])
                @endcomponent
            @endforeach
        </div>
        <div class=" gap-2 flex">
            <div id="prevTestimonials" class="cursor-pointer">
                <svg class="h-8 w-8 text-main  shadow-2xl transition-all"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 8 8 12 12 16"/>
                    <line x1="16" y1="12" x2="8" y2="12"/>
                </svg>
            </div>

            <div id="nextTestimonials" class="cursor-pointer md:mb-2">
                <svg class="h-8 w-8 text-main  transition-all" viewBox="0 0 24 24"
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
</section>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const Testimonials_Cards = document.getElementById("Testimonials_Cards");
        const Next = document.getElementById('nextTestimonials')
        const Prev = document.getElementById('prevTestimonials')
        Next.addEventListener('click', () => ScrollHorizontal(1))
        Prev.addEventListener('click', () => ScrollHorizontal(-1))
        let tripAdvisorCards = [...document.getElementsByClassName('tripadvisorCard')];
        let tripAdvisorCard=tripAdvisorCards[0]


        function ScrollHorizontal(sign) {
            if (window.innerWidth >= 768) {
                Testimonials_Cards.scrollLeft += (tripAdvisorCard.offsetWidth +8) * sign; //8 is gap-2
            } else {
                Testimonials_Cards.scrollLeft += tripAdvisorCard.offsetWidth * sign;
            }
        }

        /*Toggle Line Clamp in Review Card*/

        let reviewDescriptions = [...document.getElementsByClassName('review_description')];

        reviewDescriptions.forEach((description) => {
            description.addEventListener('click', () => {
                description.classList.toggle('line-clamp-[9]');
            })
        })

    });

</script>
