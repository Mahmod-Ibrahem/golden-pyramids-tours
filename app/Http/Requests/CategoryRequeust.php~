<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequeust extends FormRequest
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
        $rules = [
            'type' => 'bail|required',
            'header' => 'bail|required',
            'bg_header' => 'bail|required',
            'description' => 'bail|required',
            'name' => 'bail|required',
            'title_meta'=> 'bail|required',
            'description_meta' => 'bail|required',
            'locale' => 'bail|required|in:en,sp',
        ];

        if($this->isMethod('POST')) {
            $rules['image'] = 'bail|required|image|mimes:jpeg,png,jpg,webp';
        }
        else{
            $rules['image'] = 'bail|nullable|image|mimes:jpeg,png,jpg,webp';
        }
        return $rules;
    }
}
