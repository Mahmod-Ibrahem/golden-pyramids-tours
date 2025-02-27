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
        $tours = Tour::whereJsonContains('locations->'.app()->getLocale(), $location)
            ->orWhereJsonContains('locations->en', $location)
        ->with('category')
        ->get();

        //ToDo Fix This
        return view('BestDestination.index', compact('tours', 'location'));
    }
}
