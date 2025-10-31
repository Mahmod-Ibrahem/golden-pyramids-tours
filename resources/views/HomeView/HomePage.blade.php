@extends('layout.layouts')
@section('title')
    Golden Pyramids Travel
@endsection
@section('content')

    <div class="h-[25rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full "
            style="background-image: url('{{ asset('Images/Home.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            <div class="flex flex-col items-center justify-center  w-full h-full bg-black/10 pt-10">
                <div
                    class="
                 text-[20px] font-extrabold tracking-wider  md:text-[50px] select-none text-center leading-[3rem] md:leading-[5rem] text-white">
                    {!! data_get($pageText, 'homeTitle')?->getTranslation('content', app()->getLocale()) ?? 'Experience The True Essence Of Egypt' !!}
                </div>
            </div>
        </div>
    </div>
    @component('HomeView.best-destination')@endcomponent
    @component('HomeView.TourByCategory')@endcomponent
    @component('HomeView.Services',['content'=>data_get($pageText,'services')?->getTranslation('content',app()->getLocale()) ?? 'Experience The True Essence Of Egypt'])@endcomponent
    @if(!$reviews->isEmpty())
        @component('HomeView.Testimonials',['reviews' => $reviews])@endcomponent
    @endif
    @if($recommendedDayTours ?? false)
        @component('HomeView.RecommendedDayTours',['tours' => $recommendedDayTours])@endcomponent
    @endif
    @if($recommendedTourPackages ?? false)
        @component('HomeView.RecommendedTourPackages',['tours' => $recommendedTourPackages])@endcomponent
    @endif
    <section id="YoutubeVideos" class="pt-6 select-none">
        <div class="parent_container">
            <h1 class="parent_header">{{__('See Egypt Through the Eyes of Our Satisfied Customers!')}}</h1>

            <div class="child_container">
                <iframe class="w-[370px] md:w-[450px] md:h-[315px]"
                        src="https://www.youtube.com/embed/pz2e0zxt-OE?si=89UkT07rOd4-OZxT" title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                <iframe class="w-[370px] md:w-[450px] md:h-[315px]"
                        src="https://www.youtube.com/embed/pz2e0zxt-OE?si=89UkT07rOd4-OZxT" title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    @component('HomeView.Faq',['faqs' => $faqs])@endcomponent

@endsection





