<section id="TailorMade" class="bg-[#f9f9f9]">
    <div class="parent_container py-6">
        <header>
            <h1
                id="tailorHeader"
                class="parent_header font-bold">
                {!!  $tailorText['homeTailorTitle']->content!!}
            </h1>
        </header>
        <div class="flex flex-col  items-center flex-nowrap mx-auto gap-8
             md:flex-row md:justify-between md:max-w-7xl  w-full  md:gap-0">

            <div id="left_container"
                 class="flex flex-col bg-white rounded-2xl shadow-md items-center p-8
                 md:max-w-[680px] md:p-20 md:">
                <h3 class="font-extrabold text-base text-red-600 md:text-[1.1rem]">{{__('25% OFF SALE')}}</h3>
                <h2 class="text-2xl font-bold text-main tracking-wide md:text-3xl ">{{__('TOUR OF YOUR DREAMS')}}</h2>
            </div>

            <div id="right_container"
                 class="flex flex-col bg-white  gap-6 rounded-2xl shadow-md max-w-[350px] md:max-w-[680px] p-6">
                <div class="font-medium text-gray-600 select-none prose prose-p:!text-main prose-a:!text-bg-main prose-a:no-underline">
                    {!! $tailorText['homeTailorContent']->content !!}
                </div>
            </div>
        </div>
        <a href="{{route('TailorMade.index')}}">
            <button id="tailorButton"
                    type="button"
                    class="main_button bg-bg-main text-secondary w-full  uppercase shadow-[0px_5px_0px_0px_rgba(0,0,0,0.25)] shadow-yellow-800 hover:shadow-none
                    hover:translate-y-[5px] transition-all duration-1000 px-10 py-3">
                {{__('Tailor Made Your Egypt Tour !')}}
            </button>
        </a>

    </div>
</section>
