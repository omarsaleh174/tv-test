<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
           'title' => 'required|string|max:255',
        'description' => 'required|string',
        'subscription_type' => 'required|string|max:255',
        'type_amount' => 'required|string|max:255',
        'duration' => 'required|integer|between:1,12',
        'status' => 'required|boolean',
        'price' => 'required|numeric',
        'real_price' => 'required|numeric',
        ];
    }
}
