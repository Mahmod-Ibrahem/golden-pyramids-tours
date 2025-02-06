<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Review;
use App\Models\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $test;
    public function home()
    {
        $recommendedDayTours = Tour::where('preference', 'recommended')->where('group', 'DayTours')
            ->whereHas('tourTranslations', function ($query) {
                $query->where('locale', app()->getLocale());
            })
            ->WithTranslations()->get()->toArray();
        $recommendedTourPackages = Tour::where('preference', 'recommended')->where('group', 'TourPackages')
            ->whereHas('tourTranslations', function ($query) {
                $query->where('locale', app()->getLocale());
            })
            ->WithTranslations()->get()->toArray();
        $limitedOffersTorus = Tour::where('preference', 'limited_offers')
            ->whereHas('tourTranslations', function ($query) {
                $query->where('locale', app()->getLocale());
            })
            ->WithTranslations()->get()->toArray();
        $reviews = Review::where('tour_id', '=', null)->get();
        $faqs=Faq::with('translations')->get();
        return view('HomeView.HomePage', compact('recommendedDayTours', 'recommendedTourPackages', 'limitedOffersTorus', 'reviews', 'faqs'));


    }
}
