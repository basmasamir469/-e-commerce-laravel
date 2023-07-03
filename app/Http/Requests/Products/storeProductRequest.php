<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class storeProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'product_name.en'=>'required|unique:products,product_name->en',
            'product_name.ar'=>'required|unique:products,product_name->ar',
            'category_id'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'image'=>'required'
        ];
    }
}
