<!-- Faq Heading -->
<section id="faq">
    <div class="parent_container mx-auto">
        <h2 class="parent_header">
            Frequently Asked Questions
        </h2>
        <p class="max-w-lg px-6 mx-auto text-center text-[#1A2B48">
            Here are some of our FAQs. If you have any other questions you'd like
            answered please feel free to email us.
        </p>
    </div>
</section>

<!-- Faq Accordion -->
<section id="faq-accordion">
    <!-- Main Container -->
    <div class="container mx-auto px-6 mb-32">
        <!-- Accordion Container -->
        <div class="max-w-2xl m-8 mx-auto overflow-hidden">
            <!-- Tabs -->
            @forelse($faqs as $faq)
            <div class="py-1 border-b outline-none group" tabindex={{$faq->id}}>

                <!-- Tab Flex Container -->
                <div
                    class="flex items-center justify-between py-3 text-gray-500 transition duration-500 cursor-pointer group ease"
                >
                    <!-- Tab Title -->
                    <div
                        class="transition duration-500 ease group-hover:text-main group-focus:text-main"
                    >

                        {{$faq->translations[0]->question}}
                    </div>
                    <!-- Arrow -->
                    <div
                        class="transition duration-500 ease group-focus:-rotate-180 group-focus:text-main"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12">
                            <path
                                fill="none"
                                stroke="currentColor"
                                stroke-width="3"
                                d="M1 1l8 8 8-8"
                            />
                        </svg>
                    </div>
                </div>

                <!-- Tab Inner Content -->
                <div
                    class="overflow-hidden transition duration-500 group-focus:max-h-screen max-h-0 ease"
                >
                    <p class="py-2 text-justify text-gray-600">
                        {{$faq->translations[0]->answer}}
                    </p>
                </div>
            </div>
            @empty
            @endforelse
            </div>
        </div>
</section>
