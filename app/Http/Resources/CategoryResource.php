<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'categoryTranslationId' => $this->categoryTranslations[0]->id,
            'type' => $this->type,
            'locale' => $this->categoryTranslations[0]->locale,
            'header' => $this->categoryTranslations[0]->header,
            'description' => $this->categoryTranslations[0]->description,
            'bg_header' => $this->categoryTranslations[0]->bg_header,
            'name' => $this->categoryTranslations[0]->name,
            'image_url' => $this->image,
            'title_meta' => $this->categoryTranslations[0]->title_meta,
            'description_meta' => $this->categoryTranslations[0]->description_meta
        ];
    }
}
