<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class BlogService
{
    /**
     * Get all blogs with caching.
     *
     * @return Collection
     */
    public function getAllBlogs(): Collection
    {
        return Cache::rememberForever('blogs.all', function () {
            return Blog::all();
        });
    }

    /**
     * Get blogs by city ID with caching.
     *
     * @param int $cityId
     * @return Collection
     */
    public function getBlogsByCityId(int $cityId): Collection
    {
        return Cache::remember("blogs.city.{$cityId}", now()->addDay(), function () use ($cityId) {
            return Blog::where('city_id', $cityId)->get();
        });
    }

    /**
     * Get blog by slug for current locale with caching.
     *
     * @param string $slug
     * @param string|null $locale
     * @return Blog|null
     */
    public function getBlogBySlug(string $slug, ?string $locale = null): ?Blog
    {
        $locale = $locale ?? app()->getLocale();
        $cacheKey = "blogs.slug.{$slug}.{$locale}";

        return Cache::remember($cacheKey, now()->addDay(), function () use ($slug, $locale) {
            return Blog::where("slug->{$locale}", $slug)->first();
        });
    }

    /**
     * Get blog by slug and city ID with caching.
     *
     * @param string $slug
     * @param int $cityId
     * @param string|null $locale
     * @return Blog|null
     */
    public function getBlogBySlugAndCity(string $slug, int $cityId, ?string $locale = null): ?Blog
    {
        $locale = $locale ?? app()->getLocale();
        $cacheKey = "blogs.slug.{$slug}.city.{$cityId}.{$locale}";

        return Cache::remember($cacheKey, now()->addDay(), function () use ($slug, $cityId, $locale) {
            return Blog::where("slug->{$locale}", $slug)
                ->where('city_id', $cityId)
                ->first();
        });
    }

    /**
     * Clear all blog-related caches.
     *
     * @return void
     */
    public function clearCache(): void
    {
        Cache::forget('blogs.all');
        // Note: Individual blog caches should be cleared by slug/city if needed
    }

    /**
     * Clear cache for a specific blog slug.
     *
     * @param string $slug
     * @param string|null $locale
     * @return void
     */
    public function clearCacheBySlug(string $slug, ?string $locale = null): void
    {
        $locale = $locale ?? app()->getLocale();
        Cache::forget("blogs.slug.{$slug}.{$locale}");
        Cache::forget('blogs.all');
    }

    /**
     * Clear cache for blogs by city ID.
     *
     * @param int $cityId
     * @return void
     */
    public function clearCacheByCityId(int $cityId): void
    {
        Cache::forget("blogs.city.{$cityId}");
        Cache::forget('blogs.all');
    }
}

