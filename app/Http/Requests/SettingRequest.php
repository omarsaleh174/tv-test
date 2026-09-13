<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|max:191',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_free' => 'required|integer|min:0|max:1',
        ];
        // 'day_send_tender' => 'required|integer|min:1',
        // 'time_send_tender' => 'required|date_format:H:i',
    }
}
