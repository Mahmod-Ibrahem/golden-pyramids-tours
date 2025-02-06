<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap=false;
    public function toArray(Request $request): array
    {
        $locale=request('locale', 'en');
        return [
            'id' => $this->id,
            'title' => $this->getTranslation('title',$locale),
            'blog' => $this->getTranslation('blog',$locale),
            'image_url' => $this->image,
            'city_id' => $this->city_id ?? '',
            'availableLocales'=>array_diff(['en','fr','sp','zh','pt'],$this->locales())
        ];
    }
}
