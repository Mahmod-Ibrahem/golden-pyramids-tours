<section>
    <div class="parent_container relative">
        <header>
            <h1
                class="parent_header ">
                Book Your Tour By Category !</h1>
        </header>

        <div class="w-fit mx-auto">
            <div class="flex flex-col space-y-6 md:flex-row justify-between  mb-5 md:space-x-10 md:space-y-0">
                @component('components.core.MainCategoryCard',
                ['Category'=>'Day Tours', 'image'=>asset('Images/TourByCategory/DayToursHomeCard.jpg') ,'route'=>'DayTours.index'])
                @endcomponent

                @component('components.core.MainCategoryCard',
                ['Category'=>'Tour Packages', 'image'=>asset('Images/TourByCategory/TourPackagesHome.jpg') , 'route'=>'TourPackages.index'])
                @endcomponent
            </div>
        </div>
</section>
