<a href="http://127.0.0.1:8000/TourPackages/nile-cruise"
   class=" rounded-lg relative  cursor-pointer w-[364px] h-[357px] md:w-[55rem] md:h-[26rem] group overflow-hidden ">
    <div class="inset-0 absolute bg-black/20 z-10"></div>
        <img src="{{$image}}"
             class="w-full h-full object-cover rounded-xl group-hover:scale-110 transition-all duration-[2s] ease-out" alt="{{$Category}}">
    <div class="absolute bottom-[10%] left-10  transform z-10">
        <h3 class="text-[22px] text-white font-medium text-center  tracking-wide uppercase ">{{__($Category)}}</h3>
    </div>
</a>
