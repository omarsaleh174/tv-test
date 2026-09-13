<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class ClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // تحقق من أن الـ route هو 'clients.update'
        $rules = [
            'company_name'  => 'nullable|string|max:255',
            'name'           => 'required|string|max:255',
            'phone'          => 'required|string|max:20', 
            'phone_2'        => 'nullable|string|max:30', 
            'email'          => [
                'required',
                'email',
                // إذا كانت الروت هي clients.update، استثني العميل الحالي
                Rule::unique('clients', 'email')->ignore($this->route('client'))->when(Route::currentRouteName() === 'clients.update', function ($query) {
                    return $query;
                }),
            ], 
            'password'       => 'required|string|min:8', //|confirmed
            'whatsapp'       => 'nullable|string|max:30',
            'photo'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'type'           => 'required|in:admin,user,client',
            'country_id'     => 'required|exists:countries,id',
            'city_id'        => 'nullable|exists:cities,id',   
            'gender'         => 'required|in:1,2',
        ];

        return $rules;
    }
}
