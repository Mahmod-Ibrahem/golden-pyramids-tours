@extends('layout.layouts')
@section('title')
    Desert Storm Egypt Tours | Explore Ancient Wonders & Hidden Gems
@endsection('title')
@section('description')
    Join us on a journey through Egypt’s rich history. Explore iconic landmarks like the Pyramids, temples, and more with expert guides. Start your adventure today!
@endsection('description')
@section('content')
    <section class="md:bg-fixed relative h-[50vh]  w-full bg-top"
             style="background-image: url('{{ asset('Images/Blog.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;"
    >
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <h1 class="backgroundImageHeader">
                {{__("Discover Egypt's Best-Kept Secrets")}}
            </h1>
        </div>
    </section>
    <div class="parent_container py-6 bg-[#f9f9f9] md:mt-0">
        <div class="child_container ">
            @forelse($cities as $city)
                @component('components.CityCard',['city'=>$city])
                @endcomponent
            @empty
                Soon
            @endforelse

        </div>
    </div>
@endsection
