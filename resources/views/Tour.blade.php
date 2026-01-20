@extends('layout.layouts')
@section('content')
    {{-- Hero Section --}}
    <section class="relative min-h-[40vh] md:min-h-[60vh] w-full">
        {{-- Background Image --}}
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat md:bg-fixed"
             style="background-image: url('{{ $tour->tour_cover }}');">
        </div>
        
        {{-- Gradient Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/40 to-black/70"></div>
        
        {{-- Content --}}
        <div class="relative z-10 flex flex-col items-center justify-center min-h-[40vh] md:min-h-[60vh] px-4 text-center">
            <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold text-white max-w-4xl leading-tight animate-fadeIn">
                {{ $tour->title }}
            </h1>
            
            {{-- Location Badge --}}
            <div class="mt-6 inline-flex items-center gap-2 px-4 py-2 bg-amber-500/20 backdrop-blur-sm rounded-full border border-amber-400/30">
                <svg class="w-5 h-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="text-amber-400 font-medium">{{ $tour->locations }}</span>
            </div>
        </div>
    </section>

    {{-- Main Content --}}
    <section class="py-12 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                {{-- Left Column - Gallery & Details --}}
                <div class="lg:w-2/3 space-y-8">
                    
                    {{-- Image Gallery --}}
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div id="Holder" class="relative">
                            {{-- Main Image Container --}}
                            <div id="images_container"
                                 class="flex flex-row w-full h-[20rem] md:h-[28rem] overflow-y-hidden overflow-x-auto scroll-smooth hide-scrollbar">
                                @forelse ($tour->images as $index => $img)
                                    <div class="w-full h-full flex-shrink-0">
                                        <img id="img_{{ $index + 1 }}"
                                             class="cursor-pointer object-cover bg-center w-full h-full"
                                             src="{{ $img->path }}" alt="{{ $tour->title }}">
                                    </div>
                                @empty
                                    <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                        <p class="text-gray-500">No Images Available</p>
                                    </div>
                                @endforelse

                                {{-- Navigation Arrows --}}
                                <button id="prev"
                                        class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full shadow-lg flex items-center justify-center text-amber-600 hover:bg-amber-500 hover:text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </button>
                                <button id="next"
                                        class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full shadow-lg flex items-center justify-center text-amber-600 hover:bg-amber-500 hover:text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            </div>
                            
                            {{-- Thumbnail Bar --}}
                            <div id="Image_bar"
                                 class="flex gap-2 p-3 bg-gray-100 overflow-x-auto scroll-smooth hide-scrollbar">
                                @forelse ($tour->images as $index => $img)
                                    <img id="dot{{ $index }}" 
                                         class="w-16 h-12 md:w-20 md:h-14 object-cover rounded-lg cursor-pointer opacity-50 hover:opacity-100 transition-opacity duration-300 ring-2 ring-transparent hover:ring-amber-500"
                                         src="{{ $img->path }}"
                                         alt="{{ $tour->title }}">
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                    
                    {{-- Tour Description --}}
                    @component('components.TourComponent.Description', ['tour' => $tour])
                    @endcomponent
                    
                    {{-- Tabs Section --}}
                    <div id="tabContainer" class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        {{-- Tab Buttons --}}
                        <div class="flex flex-wrap gap-1 p-3 bg-gradient-to-r from-gray-50 to-white border-b border-gray-100">
                            @component('components.core.Tap_button', ['id' => '1', 'text' => 'Itenary'])
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

                        {{-- Tab Contents --}}
                        <div class="p-6">
                            {{-- Itinerary --}}
                            <div id="tabContent_itenary" class="space-y-4">
                                @php
                                    $itenary_title = explode('/', $tour->itenary_title);
                                    $itenary_section = explode('###', $tour->itenary_section);
                                @endphp
                                @forelse($itenary_title as $index => $title)
                                    @component('components.core.itenary_button', [
                                        'id' => $index,
                                        'text' => $title,
                                        'itenary' => $itenary_section[$index] ?? 'Details coming soon'
                                    ])
                                    @endcomponent
                                @empty
                                @endforelse
                            </div>

                            {{-- Places --}}
                            <div id="tabContent_Places" class="hidden">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                    Places You'll Visit
                                </h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    @foreach (explode('/', $tour['places']) as $places)
                                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                            <svg class="w-5 h-5 text-amber-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            <span class="text-gray-700">{{ $places }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Inclusions --}}
                            <div id="tabContent_Include" class="hidden">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    What's Included
                                </h2>
                                <div class="space-y-2">
                                    @foreach (explode('/', $tour['included']) as $included)
                                        @component('components.core.include')
                                            @slot('text')
                                                {{ $included }}
                                            @endslot
                                        @endcomponent
                                    @endforeach
                                </div>
                            </div>

                            {{-- Exclusions --}}
                            <div id="tabContent_Exclude" class="hidden">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    What's Excluded
                                </h2>
                                <div class="space-y-2">
                                    @foreach (explode('/', $tour['excluded']) as $excluded)
                                        @component('components.core.exclude')
                                            @slot('text')
                                                {{ $excluded }}
                                            @endslot
                                        @endcomponent
                                    @endforeach
                                </div>
                            </div>

                            {{-- Price Plan --}}
                            <div id="tabContent_PricePlane" class="hidden">
                                @component('components.forms.PricePlane', [
                                    'one' => $tour->price_per_person,
                                    'two' => $tour->price_two_five,
                                    'three' => $tour->price_six_twenty
                                ])
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column - Booking Form --}}
                <div class="lg:w-1/3">
                    <div class="sticky top-24">
                        @component('components.forms.Booking_Form', ['price' => $tour->price, 'tour' => $tour])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    @if($reviews ?? false)
        <section class="py-12 bg-gradient-to-b from-white to-gray-50">
            @component('components.Sections.TourTestimonials', ['reviews' => $reviews])
            @endcomponent
        </section>
    @endif

    {{-- Related Tours --}}
    @if(count($relatedTours))
        <section class="py-12 bg-gradient-to-b from-gray-50 to-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {{-- Section Header --}}
                <div class="text-center mb-10">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                        {{ __('Related Tours') }}
                    </h2>
                    <div class="mt-4 w-24 h-1 bg-gradient-to-r from-amber-400 to-amber-600 mx-auto rounded-full"></div>
                </div>
                
                {{-- Tours Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($relatedTours as $tour)
                        @component('components.TourCard', ['tour' => $tour])
                            @slot('image')
                                {{ asset($tour['tour_cover']) }}
                            @endslot
                        @endcomponent
                    @empty
                        <p class="col-span-full text-center text-gray-500 py-8">Coming Soon</p>
                    @endforelse
                </div>
            </div>
        </section>
    @endif
@endsection

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
                tabContent.classList.add('hidden');
            });

            document.querySelectorAll('[id^="tab_"]').forEach(function (button) {
                button.classList.remove("text-amber-600", "bg-amber-50", "border-amber-500");
                button.classList.add("text-gray-600");
            });

            document.getElementById(tabContentIds[tabIndex - 1]).classList.remove('hidden');
            document.getElementById("tab_" + tabIndex).classList.add("text-amber-600", "bg-amber-50", "border-amber-500");
            document.getElementById("tab_" + tabIndex).classList.remove("text-gray-600");
        }

        const itenaryTitle = document.querySelectorAll('[id^="title_"]')
        const itenaryDesc = document.querySelectorAll('[id^="descr_"]')
        const Plus = document.querySelectorAll('[id^="plus_"]');
        const Minus = document.querySelectorAll('[id^="Minus_"]');
        
        itenaryTitle.forEach(function (btn, index) {
            btn.addEventListener("click", function () {
                itenaryDesc[index].classList.toggle("hidden");
                itenaryDesc[index].classList.toggle("flex");
                Plus[index].classList.toggle("hidden");
                Minus[index].classList.toggle("hidden");
            });
        });

        /* Image Swiper */
        const imagesContainer = document.getElementById("images_container");
        const Next = document.getElementById('next')
        const Prev = document.getElementById('prev')
        const imageBar = document.getElementById('Image_bar')
        let slideIndex = 0
        
        if (Next) Next.addEventListener('click', () => ScrollHorizontal(1))
        if (Prev) Prev.addEventListener('click', () => ScrollHorizontal(-1))
        
        const dots = document.querySelectorAll('[id^="dot"]');
        if (dots.length > 0) ScrollHorizontal(slideIndex)

        function ScrollHorizontal(sign) {
            if (sign === 1 || sign === 0) {
                if (slideIndex < dots.length - 1) {
                    slideIndex = slideIndex + sign
                } else {
                    slideIndex = 0
                }
            } else {
                if (slideIndex > 0) {
                    slideIndex = slideIndex + sign
                } else {
                    slideIndex = dots.length - 1
                }
            }
            if (imagesContainer) {
                imagesContainer.scrollLeft = imagesContainer.clientWidth * slideIndex;
            }
            if (imageBar) {
                imageBar.scrollLeft = (window.innerWidth >= 768 ? 88 : 72) * slideIndex
            }
            addOpacityToDots()
            if (dots[slideIndex]) {
                dots[slideIndex].classList.remove('opacity-50')
                dots[slideIndex].classList.add('ring-amber-500')
            }
        }

        function addOpacityToDots() {
            dots.forEach(dot => {
                dot.classList.add('opacity-50')
                dot.classList.remove('ring-amber-500')
            })
        }

        dots.forEach((dot, index) => {
            dot.addEventListener("click", () => {
                addOpacityToDots()
                dot.classList.remove('opacity-50')
                dot.classList.add('ring-amber-500')
                if (imagesContainer) {
                    imagesContainer.scrollLeft = index * imagesContainer.clientWidth
                }
                slideIndex = index
            });
        });
    })
</script>
