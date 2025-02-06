@extends('layout.layouts')
@section('content')
    <div class="h-[20rem] md:h-auto  w-screen ">
        <div
            class="md:bg-fixed md:h-[75%]  w-full object-cover bg-center bg-cover"
            style="background-image: url('{{ $tour->tour_cover }}');">
            <div
                class="flex flex-col items-center justify-center md:items-center h-full bg-[#33333382]
                  ">

                <div class=" Category_titleContainer">
                    <h1 id="home_title"
                        class="text-[16px] font-bold md:text-[20px] select-none animate-ToDown  text-white tracking-wide">
                        {{$tour->tourTranslations[0]->title}}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="parent_container  text-gray-900 pb-4 mt-0 bg-[#f5f3f3]">


        <div class="flex gap-2 md:mt-4 items-center py-6">
            <p class="text-lg md:text-2xl font-medium text-link-color ">{{$tour->tourTranslations[0]->locations}}</p>
            <svg class="h-5 w-5 md:h-8 md:w-8 text-main" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
        <div class="flex flex-col md:flex-row md:justify-around
             md:p-1  space-y-3 mx-auto   w-full px-1">

            <div class="flex flex-col md:w-[54rem]  md:mx-0 mx-auto  ">
                <div id="Holder" class="relative ">
                    <div id="images_container"
                         class="flex flex-row  rounded-t-lg w-full h-[19rem] md:h-[33rem]  overflow-y-hidden overflow-x-auto scroll-smooth hide-scrollbar
                            border-[3px] border-main/80 border-b-0 shadow-md ">

                        @forelse ($tour->images as $index=>$img)
                            <div class="w-full h-full flex-shrink-0 ">
                                <img id="img_{{ $index + 1 }}"
                                     class="cursor-pointer object-cover bg-center bg-cover w-full h-full"
                                     src="{{$img->path}}" alt="{{$tour->title}}">
                            </div>
                        @empty
                            No Images Yet
                        @endforelse

                        <svg id="prev"
                             class="text-white hover:text-main  previous w-9 h-9 text-center rounded-full"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline
                                points="12 8 8 12 12 16"/>
                            <line x1="16" y1="12" x2="8" y2="12"/>
                        </svg>

                        <svg id="next" class="next w-9 h-9 text-white hover:text-main text-center rounded-full"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline
                                points="12 16 16 12 12 8"/>
                            <line x1="8" y1="12" x2="16" y2="12"/>
                        </svg>
                    </div>
                    <div id="Image_bar"
                         class="flex justify-start items-start cursor-pointer  hide-scrollbar w-full flex-shrink-0 overflow-x-auto scroll-smooth rounded-b-lg
                             border-[3px] shadow-md gap-[2px] border-main/80 border-t-0">

                        @forelse ($tour->images as $index=>$img)
                            <img id="dot{{ $index }}" class="image-gallery opacity-50"
                                 src="{{$img->path}}"
                                 alt="{{$tour->title}}">
                        @empty
                            No Images Yet
                        @endforelse
                    </div>
                </div>
                <!--Tap Collapse (itenary..etc)-->
                <div id="tabContainer" class="w-full mt-6">
                    <div class="w-full">
                        <div
                            class="mb-4 flex space-x-1 p-[10px] md:p-2  bg-white   rounded-lg shadow text-Primary border-l-main border-l-[3px]">

                            @component('components.core.Tap_button', ['id' => '1', 'text' => 'Itinerary'])
                            @endcomponent
                            @component('components.core.Tap_button', ['id' => '2', 'text' => 'Places'])
                            @endcomponent
                            @component('components.core.Tap_button', ['id' => '3', 'text' => "Inclusions"])
                            @endcomponent
                            @component('components.core.Tap_button', ['id' => '4', 'text' => "Exclusions"])
                            @endcomponent
                            @component('components.core.Tap_button', ['id' => '5', 'text' => "Price Plan"])
                            @endcomponent
                        </div>

                        <div id="tabContent_itenary"
                             class="transition-all duration-300 rounded-md  w-full gap-2 ">
                            @php
                                $itenary_title = explode('/', $tour->tourTranslations[0]->itenary_title);
                                $itenary_section = explode('###', $tour->tourTranslations[0]->itenary_section);
                            @endphp
                            @forelse($itenary_title as $index => $title)
                                @component('components.core.itenary_button',['id'=>$index,'text'=>$title,
                                    'itenary'=>$itenary_section[$index] ??'Some Thing Went Wrong'])
                                @endcomponent
                            @empty

                            @endforelse

                        </div>


                        <div id="tabContent_Places"
                             class="tourDetail_container">
                            <h2 class="tour_details_h">Places You'll Visit </h2>
                            @foreach (explode('/', $tour['tourTranslations'][0]['places']) as $places)
                                <div class="flex justify-between gap-4 h-fit mt-2">
                                    <p class="tour_details_p">
                                        &bull; {{ $places }}
                                    </p>
                                    <svg class="h-6 w-6 text-main" width="24" height="24"
                                         viewBox="0 0 24 24"
                                         stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                        <path d="M5 12l5 5l10 -10"/>
                                    </svg>
                                </div>
                            @endforeach
                        </div>

                        <div id="tabContent_Include"
                             class="tourDetail_container">
                            <h2 class="tour_details_h">What's Include</h2>
                            @foreach (explode('/', $tour->tourTranslations[0]['included']) as $included)
                                @component('components.core.include')
                                    @slot('text')
                                        {{ $included }}
                                    @endslot
                                @endcomponent
                            @endforeach
                        </div>
                    </div>
                    <div id="tabContent_Exclude"
                         class="tourDetail_container">
                        <h2 class="tour_details_h">What's Excluded</h2>
                        @foreach (explode('/', $tour->tourTranslations[0]['excluded']) as $excluded)
                            @component('components.core.exclude')
                                @slot('text')
                                    {{ $excluded }}
                                @endslot
                            @endcomponent
                        @endforeach
                    </div>

                    <div id="tabContent_PricePlane"
                         class="flex flex-col w-full ">
                        @component('components.forms.PricePlane',['one'=>$tour->price_per_person,'two'=>$tour->price_two_five,'three'=>$tour->price_six_twenty])
                        @endcomponent
                    </div>
                </div>

            </div>

            @component('components.forms.Booking_Form', ['price' => $tour->price,'tour'=>$tour])
            @endcomponent

        </div>
        @if($reviews ?? false)
            @component('components.Sections.TourTestimonials',['reviews'=>$reviews])@endcomponent
        @endif
        @if(count($relatedTours))
            <div class="parent_container  text-gray-900 pb-4 mt-0 bg-[#f5f3f3]">
                <h1 class="text-center text-Primary text-3xl font-bold md:text-4xl mt-7 mb-5  md:my-7 select-none">
                    Related Tours</h1>
                <div class="child_container gap-9">
                    @forelse($relatedTours as $tour)
                        @component('components.TourCard', ['tour' => $tour])
                            @slot('image')
                                {{ asset($tour['tour_cover']) }}
                            @endslot
                        @endcomponent
                    @empty
                        <p class="px-3 py-2 shadow-md rounded-lg text-center w-full font-semibold md:text-xl">Comming
                            Soon </p>
                    @endforelse
                </div>
            </div>
        @endif
    </div>


    <!--end Of tap-->
@endsection('content')

<script>
    document.addEventListener('DOMContentLoaded', function () {

        let f_tap = 1;

        document.querySelectorAll('[id^="tab_"]').forEach(function (tab, index) {
            tab.addEventListener('click', function () {
                openTab(index + 1)
            })
        })


        openTab(f_tap)


        function openTab(tabIndex) {

            const tabContents = document.querySelectorAll('[id^="tabContent"]');

            const tabContentIds = Array.from(tabContents, tabContent => tabContent.id);


            tabContents.forEach(function (tabContent) {
                tabContent.style.display = "none";
            });

            // Remove 'text-white' class from all buttons
            document.querySelectorAll('[id^="tab_"]').forEach(function (button) {
                button.classList.remove("text-main");
            });

            // Show the selected tab content
            document.getElementById(tabContentIds[tabIndex - 1]).style.display = "inline-block";

            document.getElementById("tab_" + tabIndex).classList.add("text-main");
        }

        const itenaryTitle = document.querySelectorAll('[id^="title_"]')
        const itenaryDesc = document.querySelectorAll('[id^="descr_"]')
        const Plus = document.querySelectorAll('[id^="plus_"]');
        const Minus = document.querySelectorAll('[id^="Minus_"]');
        itenaryTitle.forEach(function (btn, index) {
            btn.addEventListener("click", function () {
                itenaryDesc[index].classList.toggle("hidden");// setTimeout(() => {
                itenaryDesc[index].classList.toggle("flex");// setTimeout(() => {
                Plus[index].classList.toggle("hidden");
                Minus[index].classList.toggle("hidden");
                // }, 150);
            });
        });

        /*Image Swipper */
        const imagesContainer = document.getElementById("images_container");
        const Next = document.getElementById('next')
        const Prev = document.getElementById('prev')
        const imageBar = document.getElementById('Image_bar')
        let slideIndex = 0
        Next.addEventListener('click', () => ScrollHorizontal(1))
        Prev.addEventListener('click', () => ScrollHorizontal(-1))
        const dots = document.querySelectorAll('[id^="dot"]');
        ScrollHorizontal(slideIndex)


        function ScrollHorizontal(sign) {
            if (sign === 1 || sign === 0) {
                if (slideIndex < dots.length - 1) {
                    slideIndex = slideIndex + sign
                } else {
                    slideIndex = 0
                }
            } else {
                if (slideIndex > 0) {
                    slideIndex = slideIndex + sign //sign negative hena
                } else {
                    slideIndex = dots.length - 1
                }
            }
            if (window.innerWidth >= 768) {
                imagesContainer.scrollLeft = imagesContainer.clientWidth * slideIndex;
                imageBar.scrollLeft = 130 * slideIndex
            } else {
                imagesContainer.scrollLeft = imagesContainer.clientWidth * slideIndex;
                imageBar.scrollLeft = 82 * slideIndex
            }
            addOpacityToDots()
            dots[slideIndex].classList.remove('opacity-50')

        }

        //Small Images

        // Select all dot elements
// Add event listeners to each dot element
        function addOpacityToDots() {
            dots.forEach(dot => {
                dot.classList.add('opacity-50')
            })
        }

        dots.forEach((dot, index) => {
            dot.addEventListener("click", () => {
                addOpacityToDots()
                dot.classList.remove('opacity-50') // aly at3ml 3aleh click bs hoa al op 1
                if (window.innerWidth >= 768) {
                    imagesContainer.scrollLeft = index * imagesContainer.clientWidth // exclude border with
                } else {
                    imagesContainer.scrollLeft = imagesContainer.clientWidth * index;
                }
                slideIndex = index
            });
        });

    })
</script>

