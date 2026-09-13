<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'           => 'required|string|max:255',
            'link'           => 'nullable|string|max:255',
            // 'photo'          => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
