<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenderRequest extends FormRequest
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
            'tender_code'         => 'nullable|string|max:255', 
            'title'               => 'required|string|max:255',
            'type_id'             => 'nullable|exists:types,id',  
            'publication_date'    => 'nullable|date',
            'closing_date'        => 'required|date', 
            'opening_date'        => 'required|date',//|before_or_equal:closing_date  
            'publisher_name'      => 'nullable|string|max:255',
            'bid_docs_price'      => 'nullable|numeric|min:0',
            'docs_sale_place'     => 'nullable|string|max:255',
            'docs_sale_phone'     => 'nullable|string|max:25',  
            'reference'           => 'nullable|string|max:255',  
            'website_link'        => 'nullable|url|max:255',
            'city_id'             => 'nullable|exists:cities,id',  
            'category_id'         => 'required|array|min:1',  
            'country_id'          => 'nullable|exists:countries,id',  
            'submission_place'    => 'nullable|string|max:255',
            'phone'               => 'nullable|string|max:25',
            'internal_phone'      => 'nullable|string|max:25',

        ];
    }
}
