<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap=false;
    public function toArray(Request $request): array
    {
        $locale=request('locale');
        return [
            'id' => $this->id,
            'question' => $this->getTranslation('question',$locale),
            'answer' => $this->getTranslation('answer',$locale),
        ];
    }
}
