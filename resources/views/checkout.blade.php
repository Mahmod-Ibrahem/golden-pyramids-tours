@extends('layout.layouts')
@section('content')
    <div class="h-[20rem] md:h-auto  w-full">
        <div
            class="md:bg-fixed md:h-[75%]  w-full object-cover bg-center bg-cover"
            style="background-image: url('{{ $tour->tour_cover }}');">
            <div
                class="flex flex-col items-center justify-center md:items-center h-full bg-[#33333382]
                      ">

                <div class=" Category_titleContainer">
                    <h1 id="home_title"
                        class="text-[16px] font-bold md:text-3xl select-none animate-ToDown  text-white tracking-wide">
                        {{$tour->title}}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-[#f2f2f2] pt-5 ">
        <form method="POST" class="md:max-w-6xl md:mx-auto mx-3 "
              action="{{ route('booking.confirm',['tour'=>$tour,'userData'=>$userData]) }}">

            @csrf
            <h1 class="text-center text-main  text-[1.4rem] font-bold md:text-4xl mb-6  select-none">{{__('Tour Confirmation')}}</h1>
            <div class="flex flex-col p-5 bg-white shadow rounded mx-auto">
                <div class="flex flex-col md:flex-row md:justify-between md:gap-12">
                    <div class="flex flex-col gap-2">
                        <p class="booking_p">{{__('Name')}}: {{ $userData['name'] }}</p>
                        <p class="booking_p">{{__('Email')}}: {{ $userData['email'] }}</p>
                        <p class="booking_p">{{__('Phone')}}: {{ $userData['phone'] }}</p>
                        <p class="booking_p">{{__('Country')}}: {{ $userData['nationality'] }}</p>
                        <p class="booking_p">{{__('Tour')}}: {{ $tour->title }}</p>
                        <p class="booking_p">{{__('Date')}}: {{ $userData['Date'] }}</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="booking_p">{{__('Adult')}}: {{ $userData['Adult'] * $userData['price']  }} USD</p>
                        <p class="booking_p">{{__('Children Under 12')}}
                            : {{ $userData['Children_under_12'] * $userData['price'] *0.5 }} USD</p>
                        <p class="booking_p">{{__('Students Price')}}
                            : {{ $userData['students'] * $userData['price'] *0.5}} USD</p>
                        <p class="booking_p">{{('Children Under 6')}}: Zero</p>
                        <p class="booking_p border-0">{{__('Total price')}}: {{ $userData['totalPrice'] }} USD</p>
                    </div>
                </div>
            </div>
            <button type="submit" class="main_button bg-bg-main  w-full py-3 uppercase shadow-[0px_5px_0px_0px_rgba(0,0,0,0.25)] shadow-yellow-800 hover:shadow-none
                        hover:translate-y-[5px] transition-all duration-1000 mt-6 text-white">
                {{__('Confirm')}}
            </button>
        </form>

        @endsection('content')
        <script>
        </script>

