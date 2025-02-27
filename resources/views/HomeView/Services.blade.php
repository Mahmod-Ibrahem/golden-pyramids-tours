<section id="services" class="w-full">
    <div class="object-cover bg-center h-fit" style="background-image:url(
{{asset('Images/bg-shape-10.png')}}">
        <div class="parent_container mx-auto ">
            <header class="h-fit overflow-hidden">
                <h1
                    id="servicesHeader"
                    class="parent_header mx-1"
                >
                    {{__('Why Choose')}}<span class="text-bg-main">Golden Pyramids Travel</span>
                </h1>
            </header>
            <div
                class="text-Primary/75  select-none md:max-w-[1075px] font-medium max-w-[330px] prose prose-p:m-0 prose-p:!bg-white">
                {!! $content !!}
            </div>
            <div
                class="flex flex-col gap-4 mb-5 md:flex-row md:justify-around md:space-y-0 md:w-[70rem] mx-2 md:mx-auto">

                <div id="leftServices" class="flex flex-col gap-5">
                    <div class="ServiceCard">
                        <div class="w-[5rem] ">
                            <img src="{{asset('Images/Icons/Quality Of Service.png')}}" alt="Quality Of Service">
                        </div>
                        <div class="flex-col justify-center items-center">
                            <h3 class="Service_icon_header">{{__('Quality Of Service')}}</h3>
                            <p class="Service_icon_paragraph ">{{__('Golden Pyramids Travel is a leading Egypt tour company established in 1987, and we are delighted to welcome you as part of our family.')}}
                            </p>
                        </div>
                    </div>
                    <div class="ServiceCard">
                        <div class="w-[5rem] ">
                            <img width="80" height="80" src="{{asset('Images/Icons/limousine.png')}}"
                                 alt="Private Transfers">
                        </div>
                        <div class="flex-col justify-center items-center">
                            <h3 class="Service_icon_header">{{__('Private Transfers')}}</h3>
                            <p class="Service_icon_paragraph ">{{__('Travel in luxury with our limousine transfers, offering comfort and style for a seamless journey.')}}
                            </p>
                        </div>
                    </div>
                    <div class="ServiceCard">
                        <div class="w-[5rem] ">
                            <img src="{{asset('Images/Icons/staff.png')}}" alt="knowledgeable staff">
                        </div>
                        <div class="flex-col justify-center items-center">
                            <h3 class="Service_icon_header">{{__('knowledgeable staff')}}</h3>
                            <p class="Service_icon_paragraph ">{{__("Ensuring our clients' satisfaction is our top priority.That’s why our experienced team partners only with the finest tour guides, hotels, and restaurants.")}}
                            </p>
                        </div>
                    </div>
                </div>
                <div id="center_services" class="flex flex-col items-center justify-center">
                    {{--                    <div class="flex  justify-center items-center bg-[#ff6700] rounded-full w-[10rem] h-[10rem] md:w-[20rem] md:h-[20rem] text-white--}}
                    {{--                        text-xl md:text-3xl font-bold tracking-wider select-none">Our Services--}}
                    {{--                    </div>--}}
                </div>
                <div id="rightServices" class="flex flex-col gap-5">
                    <div class="ServiceCard">
                        <div class="w-[5rem] ">
                            <img src="{{asset('Images/Icons/Time.png')}}" alt="Save time and effort">
                        </div>
                        <div class="flex-col justify-center items-center">
                            <h3 class="Service_icon_header">{{__('Save time and effort')}}</h3>
                            <p class="Service_icon_paragraph ">{{__("Our dedicated team is committed to keeping you safe and satisfied. Contact us, and we’ll help you plan the perfect trip to Egypt.")}}
                            </p>
                        </div>
                    </div>
                    <div class="ServiceCard">
                        <div class="w-[5rem] ">
                            <img src="{{asset('Images/icons/guide.png')}}" alt="Egyptologist">
                        </div>
                        <div class="flex-col justify-center items-center">
                            <h3 class="Service_icon_header">{{__('Fast Booking')}}
                            </h3>
                            <p class="Service_icon_paragraph ">{{__('Book your dream tour quickly and effortlessly with our seamless reservation process, ensuring a stress-free and enjoyable experience!')}}
                            </p>
                        </div>
                    </div>
                    <div class="ServiceCard">
                        <div class="w-[5rem] ">
                            <img src="{{asset('Images/Icons/best-price.png')}}" alt="Best Price">
                        </div>
                        <div class="flex-col justify-center items-center">
                            <h3 class="Service_icon_header">{{__('Best Price')}}
                            </h3>
                            <p class="Service_icon_paragraph ">
                                {{__('We provide the most competitive prices, ensuring you get the best value for an unforgettable travel experience!')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
