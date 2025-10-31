<?php

namespace App\Services;

use App\Models\City;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CityService
{
    /**
     * Get all cities with caching.
     *
     * @return Collection
     */
    public function getAllCities(): Collection
    {
        return Cache::rememberForever('cities.all', function () {
            return City::all();
        });
    }

    /**
     * Get city by slug for current locale with caching.
     *
     * @param string $slug
     * @param string|null $locale
     * @return City|null
     */
    public function getCityBySlug(string $slug, ?string $locale = null): ?City
    {
        $locale = $locale ?? app()->getLocale();
        $cacheKey = "cities.slug.{$slug}.{$locale}";

        return Cache::remember($cacheKey, now()->addDay(), function () use ($slug, $locale) {
            return City::where("slug->{$locale}", $slug)->first();
        });
    }

    /**
     * Get cities by locale with caching.
     *
     * @param string $locale
     * @return Collection
     */
    public function getCitiesByLocale(string $locale): Collection
    {
        return Cache::remember("cities.locale.{$locale}", now()->addDay(), function () use ($locale) {
            return City::whereNotNull("name->{$locale}")->get();
        });
    }

    /**
     * Clear all city-related caches.
     *
     * @return void
     */
    public function clearCache(): void
    {
        Cache::forget('cities.all');
        // Note: Individual city caches should be cleared by slug/locale if needed
    }

    /**
     * Clear cache for a specific city slug.
     *
     * @param string $slug
     * @param string|null $locale
     * @return void
     */
    public function clearCacheBySlug(string $slug, ?string $locale = null): void
    {
        $locale = $locale ?? app()->getLocale();
        Cache::forget("cities.slug.{$slug}.{$locale}");
        Cache::forget('cities.all');
    }
}

