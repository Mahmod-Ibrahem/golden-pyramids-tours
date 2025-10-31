<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FAQRequest;
use App\Http\Resources\FaqListResource;
use App\Http\Resources\FaqResource;
use App\Jobs\TranslateJob;
use App\Models\Faq;
use App\Models\FaqTranslation;

class FaqController extends Controller
{
    public function index()
    {
        $locale = request('locale');
        return FaqListResource::collection(Faq::where('question->' . $locale, '!=', '')->get());
    }

    public function show(Faq $faq)
    {
        return new FaqResource($faq);
    }

    public function store(FAQRequest $request)
    {
        $validatedFaqData = $request->validated();
        $faq = Faq::create($validatedFaqData);
        $this->translateFaq($faq, ['fr', 'es', 'pt', 'zh'], $validatedFaqData);
        return new FaqResource($faq);
    }

    public function update(FAQRequest $request, Faq $faq)
    {
        $validatedFaqData = $request->validated();
        $this->translateFaq($faq, ['en', 'fr', 'es', 'pt', 'zh'], $validatedFaqData);
        return response()->json('success', 200);
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return response()->noContent();
    }


    private function translateFaq(Faq $faq, $locale, $faqValidatedData): void
    {
        TranslateJob::dispatch([
            'question' => $faqValidatedData['question'],
            'answer' => $faqValidatedData['answer']
        ], $locale, $faq, 'faq');
    }

}
