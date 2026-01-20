{{-- City Card Component --}}
<div
    class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
    {{-- Image Container --}}
    <div class="relative overflow-hidden">
        <a href="{{ route('Blog.show', $city) }}" class="block">
            <img src="{{ $city->image }}" alt="{{ $city->name }}" class="w-full object-cover transition-transform
                 duration-700 group-hover:scale-110 h-[250px]">
        </a>

        {{-- Gradient Overlay --}}
        <div
            class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        </div>
    </div>

    {{-- Content --}}
    <div class="p-5">
        <a href="{{ route('Blog.show', $city->slug) }}" class="block group/title">
            <h3 class="text-lg font-bold text-gray-800 group-hover/title:text-amber-600 transition-colors duration-300">
                {{ $city->name }}
            </h3>
        </a>

        {{-- Decorative Line --}}
        <div class="mt-3 w-12 h-0.5 bg-gradient-to-r from-amber-400 to-amber-500 rounded-full 
                    group-hover:w-full transition-all duration-500"></div>
    </div>

    {{-- Corner Accent --}}
    <div class="absolute top-4 right-4 w-10 h-10 bg-amber-500/90 backdrop-blur-sm rounded-full flex items-center justify-center 
                opacity-0 group-hover:opacity-100 transform scale-0 group-hover:scale-100 transition-all duration-300">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
    </div>
</div>