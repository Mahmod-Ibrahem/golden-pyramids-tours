<?php

namespace App\Observers;

use App\Models\YoutubeVideo;
use App\Services\YoutubeVideoService;

class YoutubeVideoObserver
{
    protected YoutubeVideoService $youtubeVideoService;

    public function __construct(YoutubeVideoService $youtubeVideoService)
    {
        $this->youtubeVideoService = $youtubeVideoService;
    }

    /**
     * Handle the YoutubeVideo "created" event.
     */
    public function created(YoutubeVideo $youtubeVideo): void
    {
        $this->youtubeVideoService->clearCache();
    }

    /**
     * Handle the YoutubeVideo "updated" event.
     */
    public function updated(YoutubeVideo $youtubeVideo): void
    {
        $this->youtubeVideoService->clearCache();
    }

    /**
     * Handle the YoutubeVideo "deleted" event.
     */
    public function deleted(YoutubeVideo $youtubeVideo): void
    {
        $this->youtubeVideoService->clearCache();
    }

    /**
     * Handle the YoutubeVideo "restored" event.
     */
    public function restored(YoutubeVideo $youtubeVideo): void
    {
        $this->youtubeVideoService->clearCache();
    }

    /**
     * Handle the YoutubeVideo "force deleted" event.
     */
    public function forceDeleted(YoutubeVideo $youtubeVideo): void
    {
        $this->youtubeVideoService->clearCache();
    }
}
