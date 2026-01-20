<section id="faq" class="py-16 bg-gradient-to-b from-amber-50/30 via-white to-amber-50/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-3 mb-4">
                <span class="w-12 h-0.5 bg-gradient-to-r from-transparent to-amber-400"></span>
                <span class="text-amber-600 font-semibold text-sm uppercase tracking-wider">Get Answers</span>
                <span class="w-12 h-0.5 bg-gradient-to-l from-transparent to-amber-400"></span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                {{__('Frequently Asked Questions')}}
            </h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                Find answers to common questions about our tours and services.
            </p>
        </div>

        {{-- FAQ Accordion --}}
        <div class="max-w-3xl mx-auto space-y-4">
            @forelse($faqs as $index => $faq)
                <div class="group bg-white/80 backdrop-blur-sm rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-amber-100/50 overflow-hidden"
                    x-data="{ open: false }">
                    {{-- Question Header --}}
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between p-5 text-left focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-inset rounded-xl transition-colors duration-300"
                        :class="open ? 'bg-gradient-to-r from-amber-50 to-white' : 'hover:bg-amber-50/50'">
                        <span class="font-semibold text-gray-800 pr-4 text-base md:text-lg"
                            :class="open ? 'text-amber-700' : ''">
                            {{ $faq->question }}
                        </span>
                        <span
                            class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full transition-all duration-300"
                            :class="open ? 'bg-amber-500 text-white rotate-180' : 'bg-amber-100 text-amber-600'">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>

                    {{-- Answer Content --}}
                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-2" class="px-5 pb-5">
                        <div class="pt-2 border-t border-amber-100">
                            <p class="text-gray-600 leading-relaxed pt-4">
                                {{ $faq->answer }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-100 rounded-full mb-4">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-gray-500 text-lg">No FAQs available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>