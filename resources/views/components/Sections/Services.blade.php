<section id="services" class="w-full">
    <div class="object-cover bg-center h-fit" style="background-image:url(
{{asset('Images/hero-bg.jpg')}}">
        <div class="parent_container">
            <header class="h-fit overflow-hidden">
                <h1
                    id="servicesHeader"
                    class="parent_header"
                >
                    Why <span class="text-[#f67103]">Dr Boogie Egypt Tours</span> is The Best For Your Egypt Tours?
                </h1>
            </header>
            <p class="mx-auto text-Primary/75 mb-12 select-none md:max-w-[1075px] font-medium max-w-[330px]">Dr.
                Boogie Egypt Tours stands out as the best choice for your Egypt tours because of our
                unmatched expertise,
                personalized service, and deep passion for showcasing Egypt’s wonders. Our dedicated team
                specializes in crafting
                unforgettable experiences, from luxury accommodations and seamless travel arrangements to
                expertly guided tours of
                iconic sites like the Pyramids of Giza, King Tut’s treasures, and Alexandria’s landmarks.
                Whether you’re seeking
                romantic honeymoon escapes, adventurous day trips, or cultural explorations, we ensure every
                journey is tailored to your desires.
                With Dr. Boogie Egypt Tours, you’re guaranteed a seamless, enriching, and truly exceptional
                adventure in Egypt.</p>
            <div class="flex flex-col space-y-10 mb-5 md:flex-row md:justify-around  md:space-x-10 md:space-y-0">

                <div id="leftServices" class="flex flex-col gap-5">
                    <div class="ServiceCard">
                        <div class="w-[5rem] ">
                            <img width="80" height="80" src="{{asset('Images/icons/Hotel.png')}}" alt="hotel">
                        </div>
                        <div class="flex-col justify-center items-center">
                            <h3 class="Service_icon_header">Hotel Accommodation</h3>
                            <p class="Service_icon_paragraph ">Enjoy luxurious hotel stays , blending relaxation and
                                elegance for an unforgettable experience.</p>
                        </div>
                    </div>
                    <div class="ServiceCard">
                        <div class="w-[5rem] ">
                            <img width="80" height="80" src="{{asset('Images/icons/Car.png')}}" alt="Car">
                        </div>
                        <div class="flex-col justify-center items-center">
                            <h3 class="Service_icon_header">Private Transfers</h3>
                            <p class="Service_icon_paragraph ">Ride in elegance with limousine transfers, combining
                                comfort and style for a smooth journey.
                            </p>
                        </div>
                    </div>
                    <div class="ServiceCard">
                        <div class="w-[5rem] ">
                            <img src="{{asset('Images/icons/Boat.png')}}" alt="Boat">
                        </div>
                        <div class="flex-col justify-center items-center">
                            <h3 class="Service_icon_header">Nile Cruise</h3>
                            <p class="Service_icon_paragraph ">Cruise the Nile in style, with exceptional service
                                and stunning views on our exclusive journeys.
                            </p>
                        </div>
                    </div>
                </div>
                <div id="right_services" class="flex flex-col items-center justify-center">
                    <div class="flex  justify-center items-center bg-[#ff6700] rounded-full w-[10rem] h-[10rem] md:w-[20rem] md:h-[20rem] text-white
                        text-xl md:text-3xl font-bold tracking-wider select-none">Our Services
                    </div>
                </div>
                <div id="rightServices" class="flex flex-col gap-5">
                    <div class="ServiceCard">
                        <div class="w-[5rem] ">
                            <img src="{{asset('Images/icons/Flight.webp')}}" alt="Flight">
                        </div>
                        <div class="flex-col justify-center items-center">
                            <h3 class="Service_icon_header">Flight Tickets</h3>
                            <p class="Service_icon_paragraph ">Reserve your flight tickets with Tours for smooth
                                travel, great prices, and outstanding service.
                            </p>
                        </div>
                    </div>
                    <div class="ServiceCard">
                        <div class="w-[5rem] ">
                            <img src="{{asset('Images/icons/Egyptologist.png')}}" alt="Egyptologist">
                        </div>
                        <div class="flex-col justify-center items-center">
                            <h3 class="Service_icon_header">Egyptologist Tour Guide
                            </h3>
                            <p class="Service_icon_paragraph ">Explore Egypt's treasures with a licensed
                                Egyptologist guide, providing a knowledgeable and enriching experience.
                            </p>
                        </div>
                    </div>
                    <div class="ServiceCard">
                        <div class="w-[5rem] ">
                            <img src="{{asset('Images/icons/assist.png')}}" alt="hotel">
                        </div>
                        <div class="flex-col justify-center items-center">
                            <h3 class="Service_icon_header">Meet and Assist
                            </h3>
                            <p class="Service_icon_paragraph ">
                                Experience effortless arrivals with our meet and assist service, guaranteeing a
                                seamless airport transition.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{--<script>--}}
{{--    document.addEventListener("DOMContentLoaded", function () {--}}
{{--        const servicesHeader=document.getElementById("servicesHeader");--}}
{{--        const leftServices = document.getElementById("leftServices");--}}
{{--        const rightServices = document.getElementById("rightServices");--}}

{{--        function scrollfunction() {--}}
{{--            const scrollPosition = window.scrollY;--}}
{{--            if (window.innerWidth >= 768) {--}}
{{--                if (scrollPosition >= 425) {--}}
{{--                    servicesHeader.classList.remove("");--}}
{{--                    servicesHeader.classList.add('animate-Button_ToUp');--}}
{{--                }--}}
{{--                if (scrollPosition >= 650) {--}}
{{--                    leftServices.classList.remove("opacity-0");--}}
{{--                    leftServices.classList.add('animate-ServicesToRight');--}}
{{--                    rightServices.classList.remove("opacity-0");--}}
{{--                    rightServices.classList.add('animate-ServicesToLeft');--}}
{{--                }--}}
{{--            } else {--}}
{{--                if (scrollPosition >= 600) {--}}
{{--                    servicesHeader.classList.remove("opacity-0");--}}
{{--                    servicesHeader.classList.add('animate-Button_ToUp');--}}
{{--                }--}}
{{--                if (scrollPosition >= 1150) {--}}
{{--                    leftServices.classList.remove("opacity-0");--}}
{{--                    leftServices.classList.add('animate-ServicesToRight');--}}
{{--                }--}}
{{--                if (scrollPosition >= 1650) {--}}
{{--                    rightServices.classList.remove("opacity-0");--}}
{{--                    rightServices.classList.add('animate-ServicesToLeft');--}}
{{--                }--}}
{{--            }--}}
{{--        }--}}

{{--        //call scrollfunction when page is mounted--}}
{{--        scrollfunction();--}}
{{--        window.addEventListener("scroll", function () {--}}
{{--            scrollfunction()--}}
{{--        })--}}
{{--    });--}}
{{--</script>--}}
