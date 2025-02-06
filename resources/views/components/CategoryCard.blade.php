<div
    class="flex-shrink-0 group w-[380px] h-[357px] md:w-[20rem] md:h-96 overflow-hidden relative border rounded-lg transition-all
    duration-200 mx-2 md:mx-0 cursor-pointer">
    <a href="{{ route($Category['type'].'.view', $Category['category_translations'][0]['slug']) }}">
    <div class="inset-0 absolute bg-black/5 z-10"></div>

        <img class="group-hover:scale-110 transition-all duration-[2s] ease-out w-full h-full object-fill" src="{{$Category['image']}}"
             alt="Product Image"/>
    <div class="absolute bottom-[10%] left-1/2 transform -translate-x-1/2 w-full flex flex-col items-center">
        <h3 class="text-[22px] text-white font-medium text-center uppercase tracking-wide ">{{$Category['category_translations'][0]['name']}}
        </h3>
        <h3 class="text-[14px] text-white font-medium text-center uppercase tracking-wide ">{{$Category['tours_count'] ?? 0}} tours
        </h3>
    </div>
    </a>
</div>



