<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CategoryService
{
    /**
     * Get tour categories by type with tour count and caching.
     *
     * @param string $type
     * @return Collection
     */
    public function getTourCategories(string $type): Collection
    {
        return Cache::remember("categories.{$type}", now()->addDay(), function () use ($type) {
            return Category::where('type', '=', $type)
                ->withCount('tours')
                ->get();
        });
    }

    /**
     * Get category by slug with caching.
     *
     * @param string $slug
     * @param string $locale
     * @return Category|null
     */
    public function getCategoryBySlug(string $slug, string $locale): ?Category
    {
        return Cache::remember("categories.slug.{$slug}.{$locale}", now()->addDay(), function () use ($slug, $locale) {
            return Category::where("slug->{$locale}", $slug)
                ->orWhere('slug->en', $slug)
                ->first();
        });
    }

    /**
     * Clear all category-related caches.
     *
     * @return void
     */
    public function clearCache(): void
    {
        // Clear specific cache patterns
        Cache::forget('categories.tourPackages');
        Cache::forget('categories.DayTours');
        
        // Note: For production, consider using cache tags for better management
        // Cache::tags(['categories'])->flush();
    }

    /**
     * Clear cache for a specific category type.
     *
     * @param string $type
     * @return void
     */
    public function clearCacheByType(string $type): void
    {
        Cache::forget("categories.{$type}");
    }
}
