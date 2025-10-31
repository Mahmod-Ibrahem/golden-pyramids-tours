<?php

namespace App\Services;

use App\Models\Review;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ReviewService
{
    /**
     * Get general reviews (not associated with any specific tour) with caching.
     *
     * @return Collection
     */
    public function getGeneralReviews(): Collection
    {
        return Cache::rememberForever('reviews.general', function () {
            return Review::where('tour_id', '=', null)->get();
        });
    }

    /**
     * Clear all review-related caches.
     *
     * @return void
     */
    public function clearCache(): void
    {
        Cache::forget('reviews.general');
    }
}
