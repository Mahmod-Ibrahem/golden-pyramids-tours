<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ReviewService;
use App\Services\TourService;

class TourController extends Controller
{
    protected CategoryService $categoryService;
    protected TourService $tourService;
    protected ReviewService $reviewService;

    /**
     * Inject required services via constructor dependency injection.
     */
    public function __construct(
        CategoryService $categoryService,
        TourService $tourService,
        ReviewService $reviewService
    ) {
        $this->categoryService = $categoryService;
        $this->tourService = $tourService;
        $this->reviewService = $reviewService;
    }

    /**
     * Display tour categories by type.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categoryType = request('type');

        $category = $this->categoryService->getTourCategories($categoryType);

        if ($categoryType == 'tourPackages') {
            return view('TourPackage.index', compact('category'));
        }
        return view('Tours.index', compact('category'));
    }

    /**
     * Display tours by category slug.
     *
     * @param string $Category
     * @return \Illuminate\View\View
     */
    public function view($Category)
    {
        $locale = app()->getLocale();
        $tours = $this->tourService->getToursByCategorySlug($Category, $locale);

        return view('Tours.view', compact('tours'));
    }

    /**
     * Display a single tour with related tours and reviews.
     *
     * @param string $Cateogry
     * @param string $Tour
     * @return \Illuminate\View\View
     */
    public function Tour($Cateogry, $Tour)
    {
        $locale = app()->getLocale();
        $tour = $this->tourService->getTourBySlug($Tour, $locale);

        $locations = $tour->getTranslation('locations', $locale);
        $locations = explode('/', $locations);
        $tour->locations = implode('-', $locations);

        // Record visitor IP and increment visit count
        $this->tourService->storeIp(request()->ip(), $tour->id);

        $reviews = $this->reviewService->getGeneralReviews()->take(20);
        $relatedTours = $this->tourService->getRelatedTours($locations, $tour->id, $tour->group, $locale);

        return view('Tour', compact('tour', 'reviews', 'relatedTours'));
    }
}
