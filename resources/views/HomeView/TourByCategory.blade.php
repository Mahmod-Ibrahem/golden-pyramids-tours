<section>
    <div class="parent_container relative">
        <header>
            <h1
                class="parent_header ">
                {{__('Book Your Tour By Category !')}}</h1>
        </header>

        <div class="flex flex-col items-center max-w-7xl mx-auto">
            <div class="flex flex-col  md:flex-row justify-between  mb-5 gap-8">
                @component('components.core.MainCategoryCard',
                ['Category'=>'Day Tours', 'image'=>asset('Images/TourByCategory/DayToursHomeCard.jpg') ,'route'=>'DayTours.index','type'=>'dayTours'])
                @endcomponent

                @component('components.core.MainCategoryCard',
                ['Category'=>'Tour Packages', 'image'=>asset('Images/TourByCategory/TourPackagesHome.jpg') , 'route'=>'TourPackages.index','type'=>'tourPackages'])
                @endcomponent
            </div>
            @component('components.core.SecondryCategoryCard',
            ['Category'=>'Nile Cruise', 'image'=>asset('Images/TourByCategory/Nile Cruise.jpg') , 'route'=>'TourPackages.index'])
            @endcomponent
        </div>
</section>
