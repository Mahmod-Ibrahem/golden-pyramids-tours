<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'reviewer' => $this->reviewer,
            'tour_id' => $this->tour_id,
            'title' => $this->title,
            'content' => $this->content
        ];
    }
}
