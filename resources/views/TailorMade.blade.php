@extends('layout.layouts')
@section('title')
    Tailor Made
@endsection
@section('content')

    @section('robots', 'index, follow')
    @section('description')
        Discover the enchanting allure of Egypt with our curated tours. Experience Easter joy in Egypt. We offer hotels,
        vacation packages,
        flights, cruises, and car rentals. Enjoy amazing tours with our specialized team in the tourism field.
    @endsection

    <div> <!-- Single root element -->
        <section class="relative md:bg-fixed md:h-screen h-[50vh]  w-full"
                 style="background-image: url('{{ asset('Images/TailorMade.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;"
        >
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center px-2">
                <h1 class="backgroundImageHeader">
                    {{__("Egypt Tailor Made Tours")}}
                </h1>
            </div>
        </section>


        <div class="parent_container  mb-4 py-6 mt-0 bg-[#f9f9f9] md:mx-auto mx-3 ">
            <h1
                class="text-Primary font-bold text-xl md:text-3xl mb-6 md:mb-16 md:mt-6">
                Tailor Your Dream Tour And Get <span class="text-main">25%</span> OFF
            </h1>
            <form method="POST" action="{{route('TailorMade.post')}}">
                @csrf
                <div class="flex flex-col items-center">
                    <div class="flex flex-col mb-5  md:flex-row md:gap-10   ">

                        <div class="flex flex-col  md:justify-between">

                            <div class="relative  sm:w-[20rem] h-[4rem] md:h-[5.5rem]">
                                <input id='name' name="name" value="{{ old('name') }}" required
                                       class="peer input_style bg-white"
                                       placeholder="FullName" autocomplete="off">

                                <label for="name" class="input_label_style">FullName</label>

                            </div>

                            <div class="relative  sm:w-[20rem] h-[4rem] md:h-[5.5rem]">
                                <input id='email' name="email" type="email"
                                       value="{{ old('email') }}" required
                                       class="peer input_style bg-white" placeholder="email" autocomplete="off">

                                <label for="email" class="input_label_style">E-mail</label>
                            </div>

                            <div class="relative  sm:w-[20rem] h-[4rem] md:h-[3.5rem]">
                                <input id='phone' name="phone" type="tel"
                                       value="{{ old('phone') }}" required
                                       class="peer input_style bg-white" placeholder="phone" autocomplete="off">

                                <label for="phone" class="input_label_style">Phone</label>
                            </div>
                        </div>

                        <div class="flex flex-col ">
                            <div class="relative  sm:w-[20rem] h-[4rem] md:h-[5.5rem]">
                                <input id='nationality' name="nationality" type="text"
                                       value="{{ old('nationality') }}" required
                                       class="peer input_style bg-white" placeholder="Nationality" autocomplete="off">

                                <label for="nationality" class="input_label_style">Nationality</label>
                            </div>
                            <div class="relative  sm:w-[20rem] h-[4rem] md:h-[5.5rem]">
                                <input id='adult' name="adult" type="number"
                                       value="{{ old('adult') }}" required
                                       class="peer input_style bg-white" placeholder="Adult" autocomplete="off">
                                <label for="adult" class="input_label_style">More Than 12 Years </label>
                            </div>
                            <div class="relative  sm:w-[20rem] h-[4rem] md:h-[3.5rem]">
                                <input id='children' name="children" type="number"
                                       value="{{ old('children') }}" required class="peer input_style bg-white"
                                       placeholder="children" autocomplete="off">

                                <label for="children" class="input_label_style">Between 2 To 11 Years</label>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2 md:gap-0 ">
                            <div class="relative  sm:w-[20rem] h-[4rem] md:h-[5.5rem] mt-2 md:mt-0">
                                <input id='startDate' name="startDate" type="Date"
                                       value="{{ old('startDate') }}" required
                                       class="peer input_style bg-white" placeholder="StartDate" autocomplete="off">

                                <label for="startDate" class="input_label_style">Start Date</label>
                            </div>
                            <div class="relative  sm:w-[20rem]  md:h-[5.5rem]">
                                <input id='endDate' name="endDate" type="Date"
                                       value="{{ old('endDate') }}" required
                                       class="peer input_style bg-white" placeholder="EndDate" autocomplete="off">

                                <label for="endDate" class="input_label_style">End Date</label>
                            </div>
                        </div>
                    </div>
                    <textarea id="message" rows="5" name="thought"
                              class="p-2.5 text-sm w-full mx-[3.1rem] md:w-[75%]  md:mt-6
                        rounded-lg shadow  font-medium bg-white border-2 focus:outline-main"
                              placeholder="Write your thoughts here..."></textarea>


                    <div class="flex flex-col md:flex-row items-center justify-center space-x-2 mt-2">
                        <button type="submit"
                                class="main_button bg-main w-full py-3 uppercase shadow-[0px_5px_0px_0px_rgba(0,0,0,0.25)] shadow-blue-800 hover:shadow-none
                                hover:translate-y-[5px] transition-all duration-1000 px-20">Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div> <!-- Closing the single root element -->

@endsection
