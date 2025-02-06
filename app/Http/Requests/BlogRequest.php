<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'locale' => 'required',
            'title' => 'required|string',
            'blog' => 'required|string',
            'city_id' => 'required|exists:cities,id',
        ];

        if($this->isMethod('POST')){
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,webp';
        }
        else{
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,webp';
        }
        return $rules;
    }
}
