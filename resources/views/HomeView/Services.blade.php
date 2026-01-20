<section id="services" class="py-16 bg-gradient-to-b from-amber-50/50 via-white to-amber-50/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight">
                {{__('Why Choose')}}
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-amber-600">Golden Pyramids
                    Travel</span>
            </h1>
            <div class="mt-4 w-24 h-1 bg-gradient-to-r from-amber-400 to-amber-600 mx-auto rounded-full"></div>
        </div>

        {{-- Rich Text Content --}}
        @if(isset($content) && $content)
            <div class="max-w-4xl mx-auto mb-12 prose prose-lg prose-amber prose-p:text-gray-600 prose-p:leading-relaxed">
                {!! $content !!}
            </div>
        @endif

        {{-- Service Cards Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Quality Of Service --}}
            <div
                class="group relative bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-amber-100/50 hover:border-amber-200 hover:-translate-y-1">
                <div class="flex items-start gap-4">
                    <div
                        class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-amber-100 to-amber-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <img src="{{asset('Images/Icons/Quality Of Service.png')}}" alt="Quality Of Service"
                            class="w-10 h-10 object-contain">
                    </div>
                    <div class="flex-1">
                        <h3
                            class="text-lg font-bold text-gray-800 mb-2 group-hover:text-amber-600 transition-colors duration-300">
                            {{__('Quality Of Service')}}</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {{__('Golden Pyramids Travel is a leading Egypt tour company established in 1987, and we are delighted to welcome you as part of our family.')}}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Private Transfers --}}
            <div
                class="group relative bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-amber-100/50 hover:border-amber-200 hover:-translate-y-1">
                <div class="flex items-start gap-4">
                    <div
                        class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-amber-100 to-amber-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <img src="{{asset('Images/Icons/limousine.png')}}" alt="Private Transfers"
                            class="w-10 h-10 object-contain">
                    </div>
                    <div class="flex-1">
                        <h3
                            class="text-lg font-bold text-gray-800 mb-2 group-hover:text-amber-600 transition-colors duration-300">
                            {{__('Private Transfers')}}</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {{__('Travel in luxury with our limousine transfers, offering comfort and style for a seamless journey.')}}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Knowledgeable Staff --}}
            <div
                class="group relative bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-amber-100/50 hover:border-amber-200 hover:-translate-y-1">
                <div class="flex items-start gap-4">
                    <div
                        class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-amber-100 to-amber-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <img src="{{asset('Images/Icons/staff.png')}}" alt="Knowledgeable Staff"
                            class="w-10 h-10 object-contain">
                    </div>
                    <div class="flex-1">
                        <h3
                            class="text-lg font-bold text-gray-800 mb-2 group-hover:text-amber-600 transition-colors duration-300">
                            {{__('Knowledgeable Staff')}}</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {{__("Ensuring our clients' satisfaction is our top priority. That's why our experienced team partners only with the finest tour guides, hotels, and restaurants.")}}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Save Time and Effort --}}
            <div
                class="group relative bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-amber-100/50 hover:border-amber-200 hover:-translate-y-1">
                <div class="flex items-start gap-4">
                    <div
                        class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-amber-100 to-amber-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <img src="{{asset('Images/Icons/Time.png')}}" alt="Save Time and Effort"
                            class="w-10 h-10 object-contain">
                    </div>
                    <div class="flex-1">
                        <h3
                            class="text-lg font-bold text-gray-800 mb-2 group-hover:text-amber-600 transition-colors duration-300">
                            {{__('Save Time and Effort')}}</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {{__("Our dedicated team is committed to keeping you safe and satisfied. Contact us, and we'll help you plan the perfect trip to Egypt.")}}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Fast Booking --}}
            <div
                class="group relative bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-amber-100/50 hover:border-amber-200 hover:-translate-y-1">
                <div class="flex items-start gap-4">
                    <div
                        class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-amber-100 to-amber-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <img src="{{asset('Images/icons/guide.png')}}" alt="Fast Booking"
                            class="w-10 h-10 object-contain">
                    </div>
                    <div class="flex-1">
                        <h3
                            class="text-lg font-bold text-gray-800 mb-2 group-hover:text-amber-600 transition-colors duration-300">
                            {{__('Fast Booking')}}</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {{__('Book your dream tour quickly and effortlessly with our seamless reservation process, ensuring a stress-free and enjoyable experience!')}}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Best Price --}}
            <div
                class="group relative bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-amber-100/50 hover:border-amber-200 hover:-translate-y-1">
                <div class="flex items-start gap-4">
                    <div
                        class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-amber-100 to-amber-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <img src="{{asset('Images/Icons/best-price.png')}}" alt="Best Price"
                            class="w-10 h-10 object-contain">
                    </div>
                    <div class="flex-1">
                        <h3
                            class="text-lg font-bold text-gray-800 mb-2 group-hover:text-amber-600 transition-colors duration-300">
                            {{__('Best Price')}}</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {{__('We provide the most competitive prices, ensuring you get the best value for an unforgettable travel experience!')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>