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
            'title' =>['string','required','max:255'],
            'description'=>['string', 'required', 'min:10'],
            'quantity'=>['numeric','required','min:0'],
            'price'=>['required'],
            'category'=>['required','exists:categories,category_name'],
            'image'=>['sometimes','image','min:1','max:10240'],
        ];
    }
}
