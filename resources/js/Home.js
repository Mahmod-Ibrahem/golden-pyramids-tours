document.addEventListener("DOMContentLoaded", function () {
    const popular_Dest=document.getElementById('Popular_Dest_header')
    const popularToursHeader=document.getElementById('popularToursHeader')
    const HotOfferHeader=document.getElementById('HotOfferHeader')
    const Category_header=document.getElementById('CategoryHeader')
    const popular_card=document.querySelectorAll('[id^="card_"]')
    const Tours_Card=document.querySelectorAll('[id^="ToursCard_"]')
    const TourPackage_card=document.getElementById('Toupackages')
    const Daytour_card=document.getElementById('Daytours')

    function debounce(func, delay) {
        let timerId;
        return function(...args) {
            clearTimeout(timerId);
            timerId = setTimeout(() => {
                func.apply(this, args);
            }, delay);
        };
    }

    // Your original scroll function
    function scrollfunction()
     {
        console.log(window.scrollY)
        if(window.innerWidth >= 768)
        {
        if(window.scrollY>=250)
        {
            popular_Dest.classList.remove('hidden')
            popular_Dest.classList.add('flex')
        }
        if(window.scrollY>=400)
        {
            popular_card.forEach(function(card) {
                card.classList.remove('hidden')
                card.classList.add('md:animate-ToUp')
            });
        }
        if(window.scrollY>=728)
            {
                Category_header.classList.remove('hidden')
            }
        if(window.scrollY>800)
        {
        TourPackage_card.classList.remove('opacity-0')
        TourPackage_card.classList.add('animate-CategoryToRight')
        Daytour_card.classList.remove('opacity-0')
        Daytour_card.classList.add('animate-CategoryToLeft')

        }
        if(window.scrollY>=2270)
            {
                HotOfferHeader.classList.remove('md:hidden')
            }
        if(window.scrollY>=1320)
            {
                Tours_Card.forEach(function(card, index) {
                      card.classList.remove('md:hidden');

            })
        }
         if(window.scrollY>=1250)
            {
                popularToursHeader.classList.remove('md:hidden')
            }
    }
        if(window.innerWidth<=640)
        {

            if(window.scrollY>=875)
                {
                    popular_Dest.classList.remove('hidden')
                    popular_Dest.classList.add('flex')
                }

            if(window.scrollY>=905)
            {
                popular_card[0].classList.remove('hidden')
                popular_card[0].classList.add('animate-DestToRight')
            // popular_card.forEach(function(card) {
            //     card.classList.remove('hidden')
            //     card.classList.add('animate-DestToRight')

            // });
        }
        if(window.scrollY>=1220)
        {
            popular_card[1].classList.remove('hidden')
            popular_card[1].classList.add('animate-DestToLeft')
         }
         if(window.scrollY>=1500)
         {
             popular_card[2].classList.remove('hidden')
             popular_card[2].classList.add('animate-DestToRight')
          }
          if(window.scrollY>=1770)
          {
              popular_card[3].classList.remove('hidden')
              popular_card[3].classList.add('animate-DestToLeft')
           }
           if(window.scrollY>=2170)
           {
            Category_header.classList.remove('hidden')
            Category_header.classList.add('animate-ToUp')
           }
           if(window.scrollY>=2170)
           {
            TourPackage_card.classList.remove('opacity-0')
            TourPackage_card.classList.add('animate-CategoryToRight')
           }
           if(window.scrollY>=2490)
           {
            Daytour_card.classList.remove('opacity-0')
            Daytour_card.classList.add('animate-CategoryToLeft')
           }
        }

    }

    // Apply debounce to your scroll function with a delay of 250 milliseconds
    const debouncedScrollFunction = debounce(scrollfunction, 0);

    // Attach the debounced scroll function to the scroll event
    window.onscroll = function() {
        debouncedScrollFunction();
    };

});

