<!-- Tour Description -->
<div class="flex flex-col mt-4 space-x-1 p-[10px] md:p-2  bg-white   rounded-lg shadow text-Primary border-l-main border-l-[3px]
                font-medium">
    <div class="flex gap-1">
        <svg fill="#df7f11" width="30px" height="30px" viewBox="0 0 36 36" version="1.1"
             preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier"><title>details-line</title>
                <path
                    d="M32,6H4A2,2,0,0,0,2,8V28a2,2,0,0,0,2,2H32a2,2,0,0,0,2-2V8A2,2,0,0,0,32,6Zm0,22H4V8H32Z"
                    class="clr-i-outline clr-i-outline-path-1"></path>
                <path d="M9,14H27a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Z"
                      class="clr-i-outline clr-i-outline-path-2"></path>
                <path d="M9,18H27a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Z"
                      class="clr-i-outline clr-i-outline-path-3"></path>
                <path d="M9,22H19a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Z"
                      class="clr-i-outline clr-i-outline-path-4"></path>
                <rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect>
            </g>
        </svg>
        <h3 class="font-semibold">
            {{__('Short Description')}}
        </h3>
    </div>
    <p>
        {{$tour->description}}
    </p>
</div>
