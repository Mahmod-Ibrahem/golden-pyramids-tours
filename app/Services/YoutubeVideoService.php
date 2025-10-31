<?php

namespace App\Services;

use App\Models\YoutubeVideo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class YoutubeVideoService
{
    /**
     * Cache TTL in seconds (1 day = 86400 seconds).
     */
    private const CACHE_TTL = 86400;

    /**
     * Get all YouTube videos with caching.
     *
     * @return Collection
     */
    public function getAllVideos(): Collection
    {
        return Cache::remember('videos.all', self::CACHE_TTL, function () {
            return YoutubeVideo::all();
        });
    }

    /**
     * Clear all video-related caches.
     *
     * @return void
     */
    public function clearCache(): void
    {
        Cache::forget('videos.all');
    }
}
