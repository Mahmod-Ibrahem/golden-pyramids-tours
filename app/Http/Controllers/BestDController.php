<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourTranslation;
use Illuminate\Http\Request;

class BestDController extends Controller
{
    public function index($location)
    {
        $tours = Tour::whereHas('tourTranslations', function ($query) use ($location) {
            $query->where('locale', app()->getLocale());
            $query->whereJsonContains('locations', $location);
        })
            ->withTranslations()->get()->toArray();
        return view('BestDestination.index', compact('tours', 'location'));
    }
}
