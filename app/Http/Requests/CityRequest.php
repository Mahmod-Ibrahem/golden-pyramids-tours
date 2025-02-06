<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'name' => 'required|string',
        ];

        if($this->isMethod('POST')) {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,webp';
        }
        else{
            $rules['image'] = 'nullable|bail|image|mimes:jpeg,png,jpg,webp';
        }
        return $rules;
    }
}
