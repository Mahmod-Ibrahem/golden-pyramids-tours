@extends('layout.layouts')
@section('content')
    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full object-cover bg-center bg-cover"
            style="background-image: url('{{ $tours[0]['tour_cover'] ?? asset('Images/BestDestination.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">

            <div
                class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                <div class="Category_titleContainer">
                    <h1 id="home_title"
                        class="Category_title">
                        Best {{$location}} Tours With Endless Experiences
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="parent_container gap-8 py-6">
        <div
            class="flex flex-col items-center justify-center  md:items-start md:justify-start  px-3 md:max-w-[68rem] gap-4">
            <h1 class="text-Primary font-semibold text-xl md:text-2xl">
                Exploring {{$location}} Like Never Before !
            </h1>
        </div>


        <div class="child_container gap-4 mx-auto">
            @forelse($tours as $tour)
                @if($tour['group'] == 'SafariAdventures' || $tour['group'] == 'SeaShoreTours' || $tour['group'] == 'LayoverTours')
                    @component('components.SafariSeaTourCard',['tour'=>$tour])
                        @slot('image')
                            {{ asset($tour['tour_cover']) }}
                        @endslot
                    @endcomponent
                @else
                    @component('components.TourCard', ['tour' => $tour])
                        @slot('image')
                            {{ asset($tour['tour_cover']) }}
                        @endslot
                    @endcomponent
                @endif
            @empty
                We Will Add It Soon !
            @endforelse

        </div>
    </div>

@endsection


