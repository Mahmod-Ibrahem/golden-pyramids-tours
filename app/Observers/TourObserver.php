<?php

namespace App\Observers;

use App\Models\Tour;
use App\Services\TourService;

class TourObserver
{
    protected TourService $tourService;

    public function __construct(TourService $tourService)
    {
        $this->tourService = $tourService;
    }

    /**
     * Handle the Tour "created" event.
     */
    public function created(Tour $tour): void
    {
        $this->tourService->clearCache();
    }

    /**
     * Handle the Tour "updated" event.
     */
    public function updated(Tour $tour): void
    {
        $this->tourService->clearCache();
    }

    /**
     * Handle the Tour "deleted" event.
     */
    public function deleted(Tour $tour): void
    {
        $this->tourService->clearCache();
    }

    /**
     * Handle the Tour "restored" event.
     */
    public function restored(Tour $tour): void
    {
        $this->tourService->clearCache();
    }

    /**
     * Handle the Tour "force deleted" event.
     */
    public function forceDeleted(Tour $tour): void
    {
        $this->tourService->clearCache();
    }
}
