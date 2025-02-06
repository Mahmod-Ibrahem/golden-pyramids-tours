@extends('layout.layouts')
@section('content')

    <section class="md:bg-fixed relative h-[50vh]  w-full bg-top"
             style="background-image: url('{{ asset('Images/contact.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;"
    >
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <h1 class="backgroundImageHeader">
                {{__('Contact Us')}}
            </h1>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <form method="POST" action="{{route('Contact.post')}}">
            @csrf
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 grid-cols-1">
                    <div class="lg:mb-0 mb-10">
                        <div class="group w-full h-[100%]">
                            <div class="relative md:h-full">
                                <img src="{{ asset('Images/Contact/secondry.jpg') }}" alt="ContactUs tailwind section"
                                     class="w-full h-full  rounded-2xl bg-blend-multiply bg-indigo-700 object-cover"/>
                                <div class="absolute bottom-0 w-full lg:p-11 p-5">
                                    <div class="bg-white rounded-lg p-6 block">
                                        <a class="flex items-center mb-6">
                                            <svg class="h-7 w-7 text-[#3B82F6]"
                                                 width="24" height="24" viewBox="0 0 24 24"
                                                 stroke-width="2" stroke="currentColor" fill="none"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"/>
                                                <path
                                                    d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"/>
                                                <path
                                                    d="M15 7a2 2 0 0 1 2 2"/>
                                                <path d="M15 3a6 6 0 0 1 6 6"/>
                                            </svg>
                                            <h5 class="text-black text-base font-normal leading-6 ml-5">
                                                +201101833336</h5>
                                        </a>
                                        <a class="flex items-center">
                                            <svg class="h-7 w-7 text-[#3B82F6]" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                            <h5 class="text-black text-base font-normal leading-6 ml-5">
                                                info@MrEgyptTours.com</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-5 lg:p-11 lg:rounded-r-2xl rounded-2xl">
                        <h2 class="text-3xl font-semibold leading-10 mb-11 text-main">Send Us A Message</h2>
                        <input type="text" name="name"
                               class="w-full h-12 text-gray-600 placeholder-gray-400  shadow-sm bg-transparent text-lg font-normal leading-7 rounded-full border border-gray-200 focus:outline-[#3B82F6] pl-4 mb-10"
                               placeholder="Name">
                        <input type="text" name="email"
                               class="w-full h-12 text-gray-600 placeholder-gray-400 shadow-sm bg-transparent text-lg font-normal leading-7 rounded-full border border-gray-200 focus:outline-[#3B82F6] pl-4 mb-10"
                               placeholder="Email">
                        <input type="text" name="phone"
                               class="w-full h-12 text-gray-600 placeholder-gray-400 shadow-sm bg-transparent text-lg font-normal leading-7 rounded-full border border-gray-200 focus:outline-[#3B82F6] pl-4 mb-10"
                               placeholder="Phone">
                        <div class="mb-5">
                            <h4 class="text-gray-500 text-lg font-normal leading-7 mb-4">Preferred method of
                                communication</h4>
                            <div class="flex">
                                <div class="flex items-center mr-11 gap-1">
                                    <input id="radio-group-1" type="radio" name="communication" value="email"
                                           class=" checked:bg-no-repeat checked:bg-center checked:border-indigo-500 checked:bg-indigo-100">
                                    <label for="radio-group-1"
                                           class="flex items-center cursor-pointer text-gray-500 text-base font-normal leading-6">
                                        Email
                                    </label>
                                </div>
                                <div class="flex items-center gap-1">
                                    <input id="radio-group-2" type="radio" name="communication" value="phone"
                                           class="    checked:bg-no-repeat checked:bg-center checked:border-indigo-500 checked:bg-indigo-100">
                                    <label for="radio-group-2"
                                           class="flex items-center cursor-pointer text-gray-500 text-base font-normal leading-6">
                                        Phone
                                    </label>
                                </div>
                            </div>
                        </div>
                        <textarea id="message" rows="5" name="message"
                                  class="p-2.5 text-sm w-full mb-5 rounded-2xl
                        shadow  font-medium bg-white border border-gray-200 focus:outline-[#3B82F6]"
                                  placeholder="Write your message here..."></textarea>


                        <button
                            class="main_button  py-3 uppercase bg-main shadow-[0px_5px_0px_0px_rgba(0,0,0,0.25)] shadow-blue-800 hover:shadow-none hover:translate-y-[5px] transition-all duration-1000
                            w-full">
                            Send
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </section>
@endsection('content')
