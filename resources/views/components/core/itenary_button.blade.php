<div id="title_{{$id}}" class="flex justify-between items-center cursor-pointer transition-all rounded-lg h-fit shadow-md border-l-[3px] border-l-main border-b
 mx-auto bg-white mt-3">
    <button
        class="py-2 px-4 text-[14px] transition-all duration-300  text-gray-800 font-medium md:text-[16px] max-w-96 text-start">
        {{$text}}
    </button>

    <svg id="plus_{{$id}}" class="h-6 w-6 md:h-8  md:w-8 text-main flex-shrink-0" fill="none" viewBox="0 0 24 24"
         stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
    </svg>

    <svg id="Minus_{{$id}}" class="h-6 w-6 md:h-8  md:w-8 text-main hidden flex-shrink-0" width="24" height="24"
         viewBox="0 0 24 24" stroke-width="2"
         stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z"/>
        <line x1="5" y1="12" x2="19" y2="12"/>
    </svg>
</div>

<div id="descr_{{$id}}"
     class="flex-col  space-y-3 w-full  hidden mt-3 transition-all overflow-hidden rounded-lg bg-white shadow">

    <div class="py-3 px-4 font-semibold pl-3 m tracking-wide leading-5 whitespace-normal  break-words bg-white text-xs md:text-[0.90rem] capitalize
                 prose max-w-none prose-a:no-underline prose-a:!text-main !text-black">
        {!! $itenary !!}
    </div>

</div>


