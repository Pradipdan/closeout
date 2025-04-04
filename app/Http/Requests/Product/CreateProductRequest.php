<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'category' =>'required|string',
            'price'=>'required|numeric',
            'discount_price'=> 'required|numeric|lt:price',
            'quntity' => 'required|numeric',
            'minimum_quntity' => 'required|numeric|lt:quntity',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
