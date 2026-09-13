<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassificationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title_en'	=>'required|min:3|max:191',
            'title_ar'	=>'required|min:3|max:191',
        ];
    }
}
