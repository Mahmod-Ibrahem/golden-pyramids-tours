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
        $locale = request('locale');
        return [
            'id' => $this->id,
            'group' => $this->group,
            'category_id' => $this->category->id ?? null,
            'preference' => $this->preference ?? '',
            'title' => $this->getTranslation('title', $locale),
            'description' => $this->getTranslation('description', $locale),
            'places' => $this->getTranslation('places', $locale),
            'included' => $this->getTranslation('included', $locale),
            'excluded' => $this->getTranslation('excluded', $locale),
            'locations' => $this->locations,
            'itenary_title' => $this->getTranslation("itenary_title", $locale),
            'itenary_section' => $this->getTranslation('itenary_section', $locale),
            'tour_cover' => $this->tour_cover,
            'duration' => $this->getTranslation('duration', $locale),
            'tour_images' => $this->images,
            'price_per_person' => $this->price_per_person,
            'price_two_five' => $this->price_two_five,
            'price_six_twenty' => $this->price_six_twenty,
        ];
    }
}
