<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\BlogService;
use App\Services\CityService;
use App\Services\PageTextService;

class BlogController extends Controller
{
    public function __construct(
        private CityService $cityService,
        private BlogService $blogService,
        private PageTextService $pageTextService
    ) {}

    public function index()
    {
        $cities = $this->cityService->getAllCities();
        $blogText = $this->pageTextService->getPageTextByType('blogBackGroundImageTitle');
        
        return view('Blog.index', ['cities' => $cities, 'blogText' => $blogText]);
    }

    public function show(string $city)
    {
        $city = $this->cityService->getCityBySlug($city);
        
        if (!$city) {
            abort(404);
        }
        
        $cityAttractions = $this->blogService->getBlogsByCityId($city->id);
        
        return view('Blog.show', compact('cityAttractions', 'city'));
    }

    public function Attraction(string $city, string $blog)
    {
        $city = $this->cityService->getCityBySlug($city);
        $blog = $this->blogService->getBlogBySlug($blog);
        
        if (!$city || !$blog) {
            abort(404);
        }
        
        return view('Blog.blog', compact('city', 'blog'));
    }
}



