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

    <section class="md:bg-fixed relative h-[50vh] w-full bg-[#f9f9f9]"
             style="background-image: url('{{ asset('Images/Transfer/Main.webp') }}'); background-size: cover; background-repeat: no-repeat; background-position: bottom;"
    >
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <h1 class="backgroundImageHeader">
                {{__("Smooth Travels with Timeless Egypt Rides")}}
            </h1>
        </div>
    </section>

    <div class="parent_container">
        <div
            class="flex flex-col items-center justify-center  md:items-start md:justify-start  px-3 md:max-w-6xl gap-4 mb-6">
            <h1 class="text-main font-semibold text-xl md:text-2xl text-center">Exclusive Egypt Transfers
            </h1>
            <p class="font-medium text-Primary/75">
                Experience unparalleled luxury and convenience with our exclusive transfer services across Egypt. Our
                top-tier offerings ensure your journey is as memorable as the destination itself. Upon your arrival at
                Cairo International Airport or any major Egyptian gateway, be welcomed by our courteous, professional
                chauffeurs ready with a personalized greeting. Enjoy hassle-free transit as we expertly handle your
                luggage and whisk you away to your chosen location. Our services extend beyond city limits, offering
                transfers between key urban centers such as Cairo, Alexandria, Luxor, and Aswan—alongside direct routes
                to iconic sights like the Giza Pyramids, Egyptian Museum, and the serene Red Sea retreats of Sharm El
                Sheikh and Hurghada. Whether your travels take you to exceptional places like Siwa Oasis or the historic
                St. Catherine's Monastery, rest assured that our long-distance transfers guarantee comfort and
                sophistication. Let us take the stress out of travel, providing you with a punctual, seamless
                experience, so you can immerse yourself in the marvels that Egypt has to offer.
            </p>
        </div>

        <form method="POST" action="{{route('Transfer.post')}}">
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
                            <input id='pickup' name="pickup" type="text"
                                   value="{{ old('pickup') }}" required
                                   class="peer input_style bg-white" placeholder="Pickup" autocomplete="off">
                            <label for="pickup" class="input_label_style">Pick Up </label>
                        </div>
                        <div class="relative  sm:w-[20rem] h-[4rem] md:h-[3.5rem]">
                            <input id='dropoff' name="dropoff" type="text"
                                   value="{{ old('dropoff') }}" required class="peer input_style bg-white"
                                   placeholder="Drop Off" autocomplete="off">

                            <label for="children" class="input_label_style">Drop Off</label>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2 md:gap-0 ">
                        <div class="relative  sm:w-[20rem] h-[4rem] md:h-[5.5rem] mt-2 md:mt-0">
                            <input id='Date' name="Date" type="Date"
                                   value="{{ old('Date') }}" required
                                   class="peer input_style bg-white" placeholder="Date" autocomplete="off">

                            <label for="Date" class="input_label_style">Date</label>
                        </div>
                    </div>
                </div>
                <textarea id="message" rows="5" name="thought"
                          class="p-2.5 text-sm w-full mx-[3.1rem] md:w-[75%]  md:mt-6 rounded-lg shadow  font-medium bg-white focus:outline-main  border-2"
                          placeholder="Any Notes You Want To Add "></textarea>


                <div class="flex flex-col md:flex-row items-center justify-center space-x-2 mt-2">
                    <button type="submit"
                            class="px-20 main_button  py-3 uppercase bg-main shadow-[0px_5px_0px_0px_rgba(0,0,0,0.25)] shadow-blue-800 hover:shadow-none hover:translate-y-[5px] transition-all duration-1000
                            w-full">Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
