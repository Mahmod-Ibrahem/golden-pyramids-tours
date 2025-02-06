<div class="flex justify-around items-center py-1">
    <!-- Start Of NavBar For Both-->
    <!--Language icon-->

        <div class="md:hidden z-20 ">
            <img src="{{asset('/Images/logo.png')}}" class="h-[4rem]" alt="logo" />
        </div>

    <div class="md:order-2 relative z-20">
        <a href="{{ route('TailorMade.index') }}"
           class="main_button px-4 py-2 md:px-10 md:py-4 uppercase bg-main ">
            Tailor Your Trip
        </a>
    </div>


    <div class="hidden md:block  md:h-[4.5rem] ">
        <img src="{{asset('/Images/Logo.webp')}}"
             alt="logo"
             width="140" height="72"
             class=" object-cover w-full h-full">
    </div>

    <!--PC NavBar Or Menu-->
    <div class="hidden md:flex items-center gap-7  font-medium text-lg ">
        <div class="nav_anch_div">
            <a href="{{route('home')}}" class="nav_anch_p active:text-main    @if(Route::currentRouteName() == 'home') text-main @endif" ><p >HOME</p></a>
        </div>
        <div class="nav_anch_div">
            <a href="{{route('DayTours.index',['type' => 'dayTours'])}}" class="nav_anch_p"><p >DAY TOURS</p></a>
        </div>

        <div class="nav_anch_div">
            <a href="{{route('TourPackages.index',['type' => 'tourPackages'])}}" class="nav_anch_p "><p >TOUR PACKAGES</p></a>

        </div>
        <div class="nav_anch_div">
            <a href="{{route('Transfer.index')}}" class="nav_anch_p "><p >TRANSFER SERVICES</p></a>
        </div>
        <div class="nav_anch_div">
            <a href="{{route('Blog.index')}}" class="nav_anch_p"><p >BLOG</p></a>
        </div>

        <div class="nav_anch_div">
            <a href="{{route('Contact.index')}}" class="nav_anch_p"><p >CONTACT</p></a>
        </div>

        <div class="nav_anch_div">
            <a href="{{route('about')}}" class="nav_anch_p"><p >ABOUT US</p></a>
        </div>

{{--            <div class="dropdown group  inline-block relative">--}}
{{--                <button class="text-white font-semibold py-2 px-4 rounded inline-flex items-center">--}}
{{--                    <span class="nav_anch_p hover:text-white">More Info</span>--}}
{{--                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>--}}
{{--                </button>--}}
{{--                <ul class="dropdown-menu group-hover:block absolute hidden text-[#ff6700] text-base  bg-[#ff6700] w-full rounded overflow-hidden divide-y-2">--}}
{{--                    <li><a href="{{route('Contact.index')}}"--}}
{{--                            class="py-2 px-4 block whitespace-no-wrap hover:bg-white text-white hover:text-[#ff6700] transition-all"--}}
{{--                                    >Contact Us</a></li>--}}
{{--                    <li><a  href="{{route('about')}}"--}}
{{--                            class="py-2 px-4 block whitespace-no-wrap hover:bg-white text-white hover:text-[#ff6700]  transition-all" >About Us</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

        </div>
    <!--End of PC NavBar Or Menu-->
      <!-- Mobile Menu -->
    <!--hamburger button-->
    <div class="md:hidden z-20">
      <button id="menu-btn" type="button" class="hamburger md:hidden focus:outline-none ">
          <span class="hamburger-top"></span>
          <span class="hamburger-middle"></span>
          <span class="hamburger-bottom"></span>
      </button>
  </div>
</div>
<div id="menu" class="absolute z-10 bottom-0 w-screen hidden  ">
    <!-- Text overlay -->
    <ul
        class=" flex flex-col font-bold text-sm  lg:hidden   tracking-wide gap-2 p-3
        bg-white">
        <a href="{{route('home')}}" class="nav_anch_p">{{__('Home')}}</a>
        <p class="border-b border-gray-300 "></p>
        <a href="{{route('DayTours.index')}}" class="nav_anch_p">{{__('Day Tours')}}</a>
        <p class="border-b border-gray-300 "></p>
        <a href="{{route('TourPackages.index')}}" class="nav_anch_p">{{__('Tour Packages')}}</a>
        <p class="border-b border-gray-300 "></p>
        <a href="{{route('Transfer.index')}}" class="nav_anch_p">{{__('Transfers Service')}}</a>
        <p class="border-b border-gray-300 "></p>
        <a href="{{route('Contact.index')}}" class="nav_anch_p">{{__('Contact')}}</a>
        <p class="border-b border-gray-300 "></p>
        <a href="{{route('Blog.index')}}" class="nav_anch_p">{{__('Blog')}}</a>
        <p class="border-b border-gray-300 "></p>
        <a href="{{route('about')}}" class="nav_anch_p">{{__('About')}}</a>
    </ul>
</div>
