<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\FaqService;
use App\Services\PageTextService;
use App\Services\ReviewService;
use App\Services\TourService;
use App\Services\YoutubeVideoService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected TourService $tourService;
    protected YoutubeVideoService $youtubeVideoService;
    protected ReviewService $reviewService;
    protected FaqService $faqService;
    protected PageTextService $pageTextService;

    /**
     * Inject all required services via constructor dependency injection.
     */
    public function __construct(
        TourService $tourService,
        YoutubeVideoService $youtubeVideoService,
        ReviewService $reviewService,
        FaqService $faqService,
        PageTextService $pageTextService
    ) {
        $this->tourService = $tourService;
        $this->youtubeVideoService = $youtubeVideoService;
        $this->reviewService = $reviewService;
        $this->faqService = $faqService;
        $this->pageTextService = $pageTextService;
    }

    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        $recommendedDayTours = $this->tourService->getRecommendedDayTours();
        $recommendedTourPackages = $this->tourService->getRecommendedTourPackages();
        $limitedOffersTorus = $this->tourService->getLimitedOffersTours();
        $youtubeVideos = $this->youtubeVideoService->getAllVideos();
        $reviews = $this->reviewService->getGeneralReviews();
        $faqs = $this->faqService->getAllFaqs();
        $pageText = $this->pageTextService->getAllPageTexts();

        return view('HomeView.HomePage',
            compact('recommendedDayTours', 'recommendedTourPackages', 'limitedOffersTorus', 'reviews', 'faqs', 'pageText', 'youtubeVideos'));
    }
}
