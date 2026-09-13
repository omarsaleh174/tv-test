<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingTimeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'day_send_tender' => 'required|integer|min:1',
            'time_send_tender' => 'required|date_format:H:i',
        ];
    }
}
