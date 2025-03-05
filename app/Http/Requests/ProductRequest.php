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
        return [
            'name'=>['required','regex:/^[a-zA-Z\s]+$/u', 'max:255'],
            'description'=>['required','regex:/^[a-zA-Z\s]+$/u'],
            'price'=>['required','numeric','min:0'],
            // 'image'=>['required','image','mimes:jpeg,png,jpg,gif','max:2048'],


        ];
    }
}
