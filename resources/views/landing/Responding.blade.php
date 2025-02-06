@extends('layout.layouts')
@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class=" p-6  md:mx-auto">
            <div
                    class="w-12 h-12 rounded-full bg-green-500 p-2 flex items-center justify-center mx-auto mb-3.5">
                <svg aria-hidden="true" class="w-8 h-8 text-white " fill="currentColor"
                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Success</span>
            </div>

            <div class="text-center px-20">
                <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">{{$text}}</h3>
                <p class="text-gray-600 my-2 font-semibold">{{$thanks}}</p>
                <p class="font-semibold text-gray-600"> Have a Great day! </p>
            </div>
        </div>
    </div>
@endsection
<script>
    setTimeout(
        () => {
            window.location.href = "{{route($route)}}";
        },
        5000
    )
</script>
