<a href="{{route('BestDestination.index',['location' => $destination])}}"
    class="flex-shrink-0 group max-w-[410px] max-h-[357px] md:max-w-[20rem] md:max-h-96 overflow-hidden relative border rounded-lg transition-all
    duration-200 mx-2 md:mx-0 cursor-pointer">
    <div class="inset-0 absolute bg-black/10 z-10"></div>

    <div>
        <img class="group-hover:scale-110 transition-all duration-[2s] ease-out w-full h-full object-fill" src="{{$image}}"
             alt="Product Image"/>
    </div>
    <div class="absolute bottom-[10%] left-1/2 transform -translate-x-1/2 w-full">
        <h3 class="text-[22px] text-white font-medium text-center uppercase tracking-wide ">{{$destination}}</h3>
    </div>
</a>
