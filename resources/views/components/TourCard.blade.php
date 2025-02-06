<div class="flex flex-col items-center w-[380px] mx-3 bg-white rounded-3xl overflow-hidden border relative">
    <div class="p-4 pb-0 w-full h-full">
        <a href="{{ route($tour["group"].'.Tour', ['Category' => $tour['category']['category_translations'][0]['slug'],
        'Tour' => $tour['tour_translations'][0]['slug']]) }}">
            <div class="w-full h-60 overflow-hidden rounded-3xl hover:cursor-pointer">
                <img src="{{$image}}"
                     class="w-full h-full object-cover  hover:scale-110 transition-all duration-[0.5s]"
                     alt="Tour Card"/>
            </div>
        </a>
    </div>
    <div class="flex flex-col items-center p-4 w-full h-full ">
        <a class="mt-[6px] mb-[15px] text-[18px] font-bold text-[#1A2B48] hover:cursor-pointer hover:text-main transition-all duration-1000 w-full line-clamp-2 min-h-[50px]">
            {{$tour['tour_translations'][0]['title']}}
        </a>

        <p class="text-[14px] text-[#4A5568] border-b border-black/10 w-full line-clamp-3 leading-6 min-h-[80px] whitespace-normal">
            {{$tour['tour_translations'][0]['description']}}
        </p>

        <div class="py-[20px] flex justify-between w-full h-full border-b border-black/10 pb-4">
            <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="#3b71fe"
                          d="M7.5 10.5h-1c-.552 0-1 .448-1 1s.448 1 1 1h1c.552 0 1-.448 1-1s-.448-1-1-1zM12.5 10.5h-1c-.552 0-1 .448-1 1s.448 1 1 1h1c.552 0 1-.448 1-1s-.448-1-1-1zM17.5 10.5h-1c-.552 0-1 .448-1 1s.448 1 1 1h1c.552 0 1-.448 1-1s-.448-1-1-1zM7.5 14.5h-1c-.552 0-1 .448-1 1s.448 1 1 1h1c.552 0 1-.448 1-1s-.448-1-1-1zM12.5 14.5h-1c-.552 0-1 .448-1 1s.448 1 1 1h1c.552 0 1-.448 1-1s-.448-1-1-1zM17.5 14.5h-1c-.552 0-1 .448-1 1s.448 1 1 1h1c.552 0 1-.448 1-1s-.448-1-1-1zM7.5 18.5h-1c-.552 0-1 .448-1 1s.448 1 1 1h1c.552 0 1-.448 1-1s-.448-1-1-1zM12.5 18.5h-1c-.552 0-1 .448-1 1s.448 1 1 1h1c.552 0 1-.448 1-1s-.448-1-1-1zM17.5 18.5h-1c-.552 0-1 .448-1 1s.448 1 1 1h1c.552 0 1-.448 1-1s-.448-1-1-1z"></path>
                    <path fill="#3b71fe" fill-rule="evenodd"
                          d="M18.75 3h2.75c1.105 0 2 .895 2 2v17c0 1.105-.895 2-2 2h-19c-1.105 0-2-.895-2-2V5c0-1.105.895-2 2-2H4c.276 0 .5.224.5.5v2.25c0 .414.336.75.75.75S6 6.164 6 5.75V1c0-.552.448-1 1-1s1 .448 1 1v1.751c0 .138.112.249.25.249h6.25c.276 0 .5.224.5.5v2.25c0 .414.336.75.75.75s.75-.336.75-.75V1c0-.552.448-1 1-1s1 .448 1 1v1.75c0 .138.112.25.25.25zm2.75 19c.276 0 .5-.224.5-.5v-12c0-.276-.224-.5-.5-.5h-18c-.276 0-.5.224-.5.5v12c0 .276.224.5.5.5h18z"
                          clip-rule="evenodd"></path>
                </svg>
                <div class="flex flex-col">
                    <span class="text-Primary text-[14px] font-medium   ">Duration</span>
                    <span
                        class="text-[#6B7280] text-[14px] font-[400]">{{$tour['tour_translations'][0]['duration']}}</span>
                </div>
            </div>
            <div class="flex gap-2">
                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="#3b71fe" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9ZM11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12Z"
                              fill="#3b71fe"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M21.83 11.2807C19.542 7.15186 15.8122 5 12 5C8.18777 5 4.45796 7.15186 2.17003 11.2807C1.94637 11.6844 1.94361 12.1821 2.16029 12.5876C4.41183 16.8013 8.1628 19 12 19C15.8372 19 19.5882 16.8013 21.8397 12.5876C22.0564 12.1821 22.0536 11.6844 21.83 11.2807ZM12 17C9.06097 17 6.04052 15.3724 4.09173 11.9487C6.06862 8.59614 9.07319 7 12 7C14.9268 7 17.9314 8.59614 19.9083 11.9487C17.9595 15.3724 14.939 17 12 17Z"
                              fill="#3b71fe"></path>
                    </g>
                </svg>
                <div class="flex flex-col">
                    <span class="text-Primary text-[14px] font-medium   ">Views</span>
                    <span class="text-[#6B7280] text-[14px] font-[400]">{{$tour['visit_count']}}</span>
                </div>
            </div>
        </div>
        <div class="flex justify-between items-center w-full h-full  p-4">
            <span class="text-[#1A2B48] text-[24px] font-medium">${{$tour['price_per_person']}}</span>
            <a href="{{ route($tour["group"].'.Tour', ['Category' => $tour['category']['category_translations'][0]['slug'],'Tour' => $tour['tour_translations'][0]['slug']]) }}"
               class="main_button px-6 py-3 uppercase bg-main shadow-[0px_5px_0px_0px_rgba(0,0,0,0.25)] shadow-blue-800 hover:shadow-none hover:translate-y-[5px] transition-all
               duration-1000
             ">Explore</a>
        </div>
    </div>
    @if($tour['preference'])
        <a>
            <div
                class="absolute left-0 top-[30px] bg-main h-[30px] w-[100px] text-[12px] text-center pt-[6px] font-medium text-white m-0">
                Recommended
            </div>
        </a>
    @endif
</div>
