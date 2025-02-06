<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DTourRequest;
use App\Models\Category;
use App\Models\IpTable;
use App\Models\Review;
use App\Models\Tour;
use App\Traits\TourUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TourController extends Controller
{
    use TourUtility;

    public function index()
    {
        $CategoryType=\request('type');
        $category = Category::whereHas('categoryTranslations', function ($query) {
            $query->where('locale', app()->getLocale());
        })->where('type', '=', $CategoryType)
            ->with(['categoryTranslations'=>function ($query) {
                $query->where('locale', app()->getLocale());
            }])
            ->withCount(['tours' => function ($query) {
                $query->whereHas('tourTranslations', function ($query) {
                    $query->where('locale', app()->getLocale());
                });
            }])->get()->toArray();

        if($CategoryType=='tourPackages')
        {
            return view('TourPackage.index', compact('category'));
        }
        return view('Tours.index', compact('category'));
    }


    public function view($Category)
    {
        $tours = Tour::whereHas('category', function ($query) use ($Category) {
            $query->whereHas('categoryTranslations', function ($query) use ($Category) {
                $query->where('slug', $Category);
            });
        })
            ->whereHas('tourTranslations', function ($query) {
                $query->where('locale', app()->getLocale());
            })
            ->WithTranslations()
            ->get()
            ->toArray();
        return view('Tours.view', compact('tours'));
    }

    public function Tour($Cateogry, $Tour)
    {
        $tour = Tour::whereHas('tourTranslations', function ($query) use ($Tour) {
            $query->where('locale', app()->getLocale());
            $query->where('slug', $Tour);
        })->with(['images', 'category', 'tourTranslations'])->first();
        $locations=json_decode( $tour->tourTranslations[0]->locations);
        $tour->tourTranslations[0]->locations = implode('-', json_decode($tour->tourTranslations[0]->locations));
        $this->storeIp(Request()->ip(), $tour->id);
        $reviews = Review::take(20)->get();
        $relatedTours=$this->getRelatedTours($locations,$tour->id,$tour->group);
        return view('Tour', compact('tour', 'reviews', 'relatedTours'));
    }
    public function getRelatedTours($locations, $id, $group)
    {
        return Tour::whereHas('tourTranslations', function ($query) use ($locations, $group) {
            foreach($locations as $location)
            {
                $query->whereJsonContains('locations',$location);
            }
        })
            ->where('group', $group)
            ->where('id', '!=', $id)
            ->WithTranslations()
            ->inRandomOrder()
            ->get()
            ->toArray();
    }

}
