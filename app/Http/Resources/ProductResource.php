<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = false;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tourTranslationId' => $this->tourTranslations[0]->id ?? null,
            'group' => $this->group,
            'category_id' => $this->category->id ?? null,
            'preference' => $this->preference,
            'title' => $this->tourTranslations[0]->title,
            'description' => $this->tourTranslations[0]->description,
            'places' => $this->tourTranslations[0]->places,
            'included' => $this->tourTranslations[0]->included,
            'excluded' => $this->tourTranslations[0]->excluded,
            'locations' => $this->tourTranslations[0]->locations ? implode('/', json_decode($this->tourTranslations[0]->locations)) : null,
            'itenary_title' => $this->tourTranslations[0]->itenary_title,
            'itenary_section' => $this->tourTranslations[0]->itenary_section,
            'price_per_person' => $this->price_per_person,
            'tourCover' => $this->tour_cover,
            'price_two_five' => $this->price_two_five,
            'price_six_twenty' => $this->price_six_twenty,
            'duration' => $this->tourTranslations[0]->duration,
            'tourImages' => $this->images,
        ];
    }
}
