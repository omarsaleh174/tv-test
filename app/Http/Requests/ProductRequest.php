<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [

            'title_en' => 'required|string|max:191|min:3',
            'title_ar' => 'required|string|max:191|min:3',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'minimum_order' => 'nullable|integer|min:1',
            'order' => 'nullable|integer|min:1',
            'is_active' => 'boolean',
            'price' => 'required|numeric',
            'real_price' => 'nullable|numeric|max:'.$this->price,
            'code' => 'nullable|string|max:191|min:3|unique:products,code', 
            'amount' => 'required|integer|min:1',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'active' => 'nullable|boolean',
            'unit_id' => 'required|exists:units,id', 
            'sub_category_id' => 'required|exists:sub_categories,id', 
            'country_id' => 'nullable|exists:countries,id', 
            'brand_id' => 'nullable|exists:brands,id', 
            'type_id' => 'nullable|exists:types,id', 
            'manufacture_id' => 'nullable|exists:manufactures,id', 
            'is_packaging' => 'nullable|boolean'
        ];
    }
}
