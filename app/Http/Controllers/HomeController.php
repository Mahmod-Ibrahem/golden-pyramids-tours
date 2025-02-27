<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\PageText;
use App\Models\Review;
use App\Models\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $recommendedDayTours = Tour::where('preference', 'recommended')
            ->where('group', 'DayTours')
            ->with('category')
            ->get();
        $recommendedTourPackages = Tour::where('preference', 'recommended')->where('group', 'TourPackages')
            ->with('category')
            ->get();
        $limitedOffersTorus = Tour::where('preference', 'limited_offers')
            ->with('category')
            ->get();
        $reviews = Review::where('tour_id', '=', null)->get();
        $faqs = Faq::all();
        $pageText = PageText::all()
            ->keyBy('type');
        return view('HomeView.HomePage',
            compact('recommendedDayTours', 'recommendedTourPackages', 'limitedOffersTorus', 'reviews', 'faqs', 'pageText'));


    }
}
