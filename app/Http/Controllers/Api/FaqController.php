<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FAQRequest;
use App\Http\Resources\FaqListResource;
use App\Http\Resources\FaqResource;
use App\Models\Faq;
use App\Models\FaqTranslation;

class FaqController extends Controller
{
    public function index()
    {
        $locale=request('locale');
        return FaqListResource::collection(Faq::where('question->'.$locale,'!=','')->get());
    }

    public function show(Faq $faq)
    {
        return new FaqResource($faq);
    }
    public function store(FAQRequest $request)
    {
        $validatedFaqData = $request->validated();
        $faq = Faq::create($validatedFaqData);
        return new FaqResource($faq);
    }

    public function update(FAQRequest $request, Faq $faq)
    {
        $validatedFaqData = $request->validated();
        $locale=request('locale');
        $faq->setTranslation('question', $locale,$validatedFaqData['question']);
        $faq->setTranslation('answer', $locale,$validatedFaqData['answer']);
        $faq->save();
        return $faq;
    }
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return response()->noContent();
    }

    public function createFaqTranslation(FAQRequest $request,string $faqId)
    {
        $faq=Faq::Find($faqId);
        $faqTranslationData=$request->validated();
        if (!$faq)
        {
            return response()->json('Faq Not Found', 404);
        }
        else {
            $this->setFaqTranslation($faq,$faqTranslationData['locale'],$faqTranslationData);//update translatable attribute of blog
            $faq->save();
            return response()->json([
                'message' => 'Faq Translation Created Successfully'
            ]);
        }
    }

    private function setFaqTranslation(Faq $faq,$locale,$faqValidatedData) : void
    {
        $faq->setTranslation('question', $locale,$faqValidatedData['question']);
        $faq->setTranslation('answer', $locale,$faqValidatedData['answer']);
    }

    public function getFaqForTranslation(string $faqId)
    {
        $faq=Faq::find($faqId);
        if (!$faq)
        {
            return response()->json('$faq Not Found',404);
        }
        return response()->json([
            'id'=>$faq->id,
            'availableLocales'=>array_diff(['en','fr','sp','zh','pt'],$faq->locales()),
            'locale'=>''
        ]);
    }

}
