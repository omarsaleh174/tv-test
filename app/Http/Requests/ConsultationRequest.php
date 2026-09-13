<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',  // تأكد من أن العميل موجود
            'consultant_id' => 'required|exists:consultants,id',  // تأكد من أن المستشار موجود
            'title' => 'required|string|max:255',  // تأكد من وجود العنوان وأنه نص قصير
            'message' => 'required|string',  // تأكد من أن الرسالة موجودة وأنها نص

        ];
    }
}
