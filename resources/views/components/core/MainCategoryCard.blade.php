<a href="{{route($route)}}"
    class="CategoryCard group overflow-hidden mx-2">
    <div class="inset-0 absolute bg-black/20 z-10"></div>
        <img src="{{$image}}"
             class="w-full h-full object-cover rounded-xl group-hover:scale-110 transition-all duration-[2s] ease-out" alt="{{$Category}}">
    <div class="absolute bottom-[10%] left-10  transform z-10">
        <h3 class="text-[22px] text-white font-medium text-center  tracking-wide uppercase ">{{$Category}}</h3>
    </div>
</a>
