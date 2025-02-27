<a href="{{route('BestDestination.index',['location' => $destination])}}"
    class="flex-shrink-0 group w-[350px] h-[357px] md:w-[20rem] md:h-[25rem] overflow-hidden relative  rounded-tl-[5rem] transition-all
    duration-200 mx-2 md:mx-0 cursor-pointer">
    <div class="overflow-hidden h-[88%]">
        <img class="group-hover:scale-110 transition-all duration-[2s] ease-out w-full h-full  object-cover bg-center" src="{{$image}}"
             alt="Product Image"/>
    </div>
    <div class="pb-5 pt-1 bg-bg-main pl-3 ">
        <h3 class="text-xl font-semibold tracking-wide text-white capitalize  ">{{__($destination)}}</h3>
    </div>
</a>
