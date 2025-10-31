<?php

namespace App\Services;

use App\Models\PageText;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class PageTextService
{
    /**
     * Get all page texts keyed by type with caching.
     *
     * @return Collection
     */
    public function getAllPageTexts(): Collection
    {
        return Cache::rememberForever('page_texts.all', function () {
            return PageText::all()->keyBy('type');
        });
    }

    /**
     * Get page text by type with caching.
     *
     * @param string $type
     * @return PageText|null
     */
    public function getPageTextByType(string $type): ?PageText
    {
        return Cache::rememberForever("page_texts.{$type}", function () use ($type) {
            return PageText::where('type', $type)->first();
        });
    }

    /**
     * Clear all page text-related caches.
     *
     * @return void
     */
    public function clearCache(): void
    {
        Cache::forget('page_texts.all');
        // Note: Individual page text caches should be cleared by type if needed
    }

    /**
     * Clear cache for a specific page text type.
     *
     * @param string $type
     * @return void
     */
    public function clearCacheByType(string $type): void
    {
        Cache::forget("page_texts.{$type}");
        Cache::forget('page_texts.all');
    }
}
