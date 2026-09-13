<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'    =>'required|email|max:255',
            'name'     =>'required|min:3|max:255',
            'subject'  =>'required|min:3|max:255',
            'message'  =>'required|min:3|max:2000'
        ];
    }
}
