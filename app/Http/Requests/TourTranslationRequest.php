<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourTranslationRequest extends FormRequest
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
        return [
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'itenary_title' => 'required',
            'itenary_section' => 'required',
            'locale' => 'required',
            'places' => 'required',
            'locations' => 'required',
            'duration' => 'required',
            'included' => 'required',
            'excluded' => 'required',
        ];
    }

    protected function prepareForValidation() //runs before Validation
    {
        // Safely handle `locations` to ensure it's properly transformed if present
        $locations = $this->locations;

        $this->merge([
            'locations' => json_encode(array_map('trim', explode('/', $locations))),
        ]);
    }
}
