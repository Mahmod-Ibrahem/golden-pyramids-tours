<?php

namespace App\Observers;

use App\Models\Faq;
use App\Services\FaqService;

class FaqObserver
{
    protected FaqService $faqService;

    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    /**
     * Handle the Faq "created" event.
     */
    public function created(Faq $faq): void
    {
        $this->faqService->clearCache();
    }

    /**
     * Handle the Faq "updated" event.
     */
    public function updated(Faq $faq): void
    {
        $this->faqService->clearCache();
    }

    /**
     * Handle the Faq "deleted" event.
     */
    public function deleted(Faq $faq): void
    {
        $this->faqService->clearCache();
    }

    /**
     * Handle the Faq "restored" event.
     */
    public function restored(Faq $faq): void
    {
        $this->faqService->clearCache();
    }

    /**
     * Handle the Faq "force deleted" event.
     */
    public function forceDeleted(Faq $faq): void
    {
        $this->faqService->clearCache();
    }
}
