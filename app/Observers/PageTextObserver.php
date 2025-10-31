<?php

namespace App\Observers;

use App\Models\PageText;
use App\Services\PageTextService;

class PageTextObserver
{
    protected PageTextService $pageTextService;

    public function __construct(PageTextService $pageTextService)
    {
        $this->pageTextService = $pageTextService;
    }

    /**
     * Handle the PageText "created" event.
     */
    public function created(PageText $pageText): void
    {
        $this->pageTextService->clearCache();
    }

    /**
     * Handle the PageText "updated" event.
     */
    public function updated(PageText $pageText): void
    {
        $this->pageTextService->clearCache();
    }

    /**
     * Handle the PageText "deleted" event.
     */
    public function deleted(PageText $pageText): void
    {
        $this->pageTextService->clearCache();
    }

    /**
     * Handle the PageText "restored" event.
     */
    public function restored(PageText $pageText): void
    {
        $this->pageTextService->clearCache();
    }

    /**
     * Handle the PageText "force deleted" event.
     */
    public function forceDeleted(PageText $pageText): void
    {
        $this->pageTextService->clearCache();
    }
}
