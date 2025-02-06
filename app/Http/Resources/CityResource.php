<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static $wrap = false;
    public function toArray(Request $request): array
    {
        $locale=request('locale','en');
        return [
            'id' => $this->id,
            'name' => $this->getTranslation('name',$locale),
            'image_url' => $this->image
        ];
    }
}
