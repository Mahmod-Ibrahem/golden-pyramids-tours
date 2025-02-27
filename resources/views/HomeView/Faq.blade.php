<!-- Faq Heading -->
<section id="faq" style="background-image: url('{{ asset('Images/hero-bg.png') }}');" >
    <div class="parent_container mx-auto h-fit mt-0 pt-6" >
        <h2 class="parent_header">
            {{__('Frequently Asked Questions')}}
        </h2>
    </div>

    <!-- Main Container -->
    <div class="container mx-auto px-6">
        <!-- Accordion Container -->
        <div class="max-w-2xl m-8 mb-0 mx-auto overflow-hidden">
            <!-- Tabs -->
            @forelse($faqs as $faq)
            <div class="py-1 border-b outline-none group" tabindex={{$faq->id}}>

                <!-- Tab Flex Container -->
                <div
                    class="flex items-center justify-between py-3 text-main font-semibold transition duration-500 cursor-pointer group ease"
                >
                    <!-- Tab Title -->
                    <div
                        class="transition duration-500 ease group-hover:text-bg-main group-focus:text-bg-main"
                    >
                        {{$faq->question}}
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
                        {{$faq->answer}}
                    </p>
                </div>
            </div>
            @empty
            @endforelse
            </div>
        </div>
</section>
