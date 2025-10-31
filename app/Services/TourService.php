<?php

namespace App\Services;

use App\Models\IpTable;
use App\Models\Tour;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class TourService
{
    /**
     * Get recommended day tours with caching.
     *
     * @return Collection
     */
    public function getRecommendedDayTours(): Collection
    {
        return Cache::rememberForever('tours.recommended.day_tours', function () {
            return Tour::where('preference', 'recommended')
                ->where('group', 'DayTours')
                ->with('category')
                ->get();
        });
    }

    /**
     * Get recommended tour packages with caching.
     *
     * @return Collection
     */
    public function getRecommendedTourPackages(): Collection
    {
        return Cache::rememberForever('tours.recommended.tour_packages', function () {
            return Tour::where('preference', 'recommended')
                ->where('group', 'TourPackages')
                ->with('category')
                ->get();
        });
    }

    /**
     * Get limited offers tours with caching.
     *
     * @return Collection
     */
    public function getLimitedOffersTours(): Collection
    {
        return Cache::rememberForever('tours.limited_offers', function () {
            return Tour::where('preference', 'limited_offers')
                ->with('category')
                ->get();
        });
    }

    /**
     * Get tours by category slug with caching.
     *
     * @param string $categorySlug
     * @param string $locale
     * @return Collection
     */
    public function getToursByCategorySlug(string $categorySlug, string $locale): Collection
    {
        return Cache::remember("tours.category.{$categorySlug}.{$locale}", now()->addDay(), function () use ($categorySlug, $locale) {
            return Tour::whereHas('category', function ($query) use ($categorySlug, $locale) {
                $query->where("slug->{$locale}", $categorySlug)
                    ->orWhere('slug->en', $categorySlug);
            })
                ->with('category')
                ->get();
        });
    }

    /**
     * Get tour by slug with images and category.
     *
     * @param string $slug
     * @param string $locale
     * @return Tour|null
     */
    public function getTourBySlug(string $slug, string $locale): ?Tour
    {
        return Cache::remember("tours.slug.{$slug}.{$locale}", now()->addDay(), function () use ($slug, $locale) {
            return Tour::where("slug->{$locale}", $slug)
                ->orWhere('slug->en', $slug)
                ->with(['images', 'category'])
                ->first();
        });
    }

    /**
     * Get related tours based on locations and group.
     *
     * @param array $locations
     * @param int $excludeId
     * @param string $group
     * @param string $locale
     * @return Collection
     */
    public function getRelatedTours(array $locations, int $excludeId, string $group, string $locale): Collection
    {
        $cacheKey = "tours.related.{$excludeId}.{$group}." . md5(implode(',', $locations));
        
        return Cache::remember($cacheKey, now()->addDay(), function () use ($locations, $excludeId, $group, $locale) {
            return Tour::where(function ($query) use ($locations, $locale) {
                foreach ($locations as $location) {
                    $query->whereJsonContains("locations->{$locale}", $location)
                        ->orWhereJsonContains('locations->en', $location);
                }
            })
                ->where('group', $group)
                ->where('id', '!=', $excludeId)
                ->with('category')
                ->inRandomOrder()
                ->get();
        });
    }

    /**
     * Store IP address and increment visit count if not already visited.
     *
     * @param string $ip
     * @param int $tourId
     * @return void
     */
    public function storeIp(string $ip, int $tourId): void
    {
        $alreadyVisited = IpTable::where('ip', $ip)
            ->where('tour_id', $tourId)
            ->exists();

        if (!$alreadyVisited) {
            IpTable::create([
                'ip' => $ip,
                'tour_id' => $tourId
            ]);

            $this->incrementVisitCount($tourId);
        }
    }

    /**
     * Increment tour visit count.
     *
     * @param int $tourId
     * @return void
     */
    protected function incrementVisitCount(int $tourId): void
    {
        $tour = Tour::find($tourId);
        if ($tour) {
            $tour->visit_count = $tour->visit_count + 1;
            $tour->save();
        }
    }

    /**
     * Clear all tour-related caches.
     *
     * @return void
     */
    public function clearCache(): void
    {
        Cache::forget('tours.recommended.day_tours');
        Cache::forget('tours.recommended.tour_packages');
        Cache::forget('tours.limited_offers');
    }
}
