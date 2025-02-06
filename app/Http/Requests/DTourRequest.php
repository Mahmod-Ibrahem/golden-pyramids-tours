<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DTourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return
            [
                'category_id' => 'bail|required',
                'group' => "bail|required",
                'preference' => 'bail|required',
                'title' => 'bail|min:5|max:100|required',
                'places' => 'bail|required|min:5|max:100',
                'description' => 'bail|required|gt:0',
                'tour_cover' => 'bail|image|mimes:jpg,jpeg,png',
                'itenary_title' => 'bail|required',
                'itenary_section' => 'bail|required',
                'included' => 'bail|required',
                'excluded' => 'bail|required',
                'Duration' => 'bail|required|string',
                'price_per_person' => 'bail|required|numeric',
                'price_plane' => 'bail|required'
            ];
    }
}
