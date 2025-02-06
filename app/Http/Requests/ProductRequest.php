<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules= [
            'category_id' => 'nullable',
            'group' => 'required',
            'preference' => 'nullable',
            'title' => 'required',
            'description' => 'required',
            'places' => 'required',
            'itenary_title' => 'required',
            'itenary_section' => 'required',
            'locations'=>'required|json',
            'included' => 'required',
            'excluded' => 'required',
            'duration' => 'required',
            'price_per_person' => 'required',
            'price_two_five' => 'required',
            'price_six_twenty'=> 'required'
        ];

        if ($this->isMethod('POST')) {
            $rules['tour_cover'] = 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048';
            $rules['tour_images'] = 'required|array';
            $rules['tour_images.*'] = 'required|image';
        } else {
            $rules['tour_cover'] = 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048';
            $rules['tour_images'] = 'nullable|array';
            $rules['tour_images.*'] = 'nullable|image';
        }
        return $rules;
    }

    protected function prepareForValidation() //runs before Validation
    {
        // Safely handle `locations` to ensure it's properly transformed if present
        $locations = $this->locations ?? '';
        if ($locations)
        $this->merge([
            'locations' => json_encode(array_map('trim', explode('/', $locations))),
        ]);
    }
}
