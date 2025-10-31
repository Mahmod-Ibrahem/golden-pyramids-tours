<?php

namespace App\Services;

use App\Models\Faq;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class FaqService
{
    /**
     * Cache TTL in seconds (1 day = 86400 seconds).
     */
    private const CACHE_TTL = 86400;

    /**
     * Get all FAQs with caching.
     *
     * @return Collection
     */
    public function getAllFaqs(): Collection
    {
        return Cache::remember('faqs.all', self::CACHE_TTL, function () {
            return Faq::all();
        });
    }

    /**
     * Clear all FAQ-related caches.
     *
     * @return void
     */
    public function clearCache(): void
    {
        Cache::forget('faqs.all');
    }
}
