<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $locale=request('locale', 'en');
        return [
            'id' => $this->id,
            'title' => $this->getTranslation('title',$locale),
            'blog' => $this->getTranslation('title',$locale),
            'image_url' => $this->image,
            'city_id' => $this->city_id ?? ''
        ];
    }
}
