<?php

namespace App\Observers;

use App\Models\Review;
use App\Services\ReviewService;

class ReviewObserver
{
    protected ReviewService $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    /**
     * Handle the Review "created" event.
     */
    public function created(Review $review): void
    {
        $this->reviewService->clearCache();
    }

    /**
     * Handle the Review "updated" event.
     */
    public function updated(Review $review): void
    {
        $this->reviewService->clearCache();
    }

    /**
     * Handle the Review "deleted" event.
     */
    public function deleted(Review $review): void
    {
        $this->reviewService->clearCache();
    }

    /**
     * Handle the Review "restored" event.
     */
    public function restored(Review $review): void
    {
        $this->reviewService->clearCache();
    }

    /**
     * Handle the Review "force deleted" event.
     */
    public function forceDeleted(Review $review): void
    {
        $this->reviewService->clearCache();
    }
}
