@extends('layout.layouts')
@section('content')
    <section class="relative md:bg-fixed md:h-screen h-[50vh]  w-full"
             style="background-image: url('{{ asset('Images/DayToursBg.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;"
    >
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center px-2">
            <h1 class="backgroundImageHeader">
                {{__("Explore Egypt's Best Day Tours for Unforgettable Adventures")}}
            </h1>
        </div>
    </section>

    @component('components.Sections.DayToursCategory',['categories'=>$category])@endcomponent

@endsection


