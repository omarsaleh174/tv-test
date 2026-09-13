<?php
namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::guard('client')->check();
    }

    public function rules()
    {
        $clientId = Auth::guard('client')->id();
        return [
            'email' => ['required', 'email', 'max:255', Rule::unique('clients')->ignore($clientId)],
            'company_name'  => 'nullable|string|max:255',
            'name'           => 'required|string|max:255',
            'phone'          => 'required|string|max:20', 
            'phone_2'        => 'nullable|string|max:30', 
            'whatsapp'       => 'nullable|string|max:30',
            'country_id'     => 'required|exists:countries,id',
            'city_id'        => 'nullable|exists:cities,id',   
            'gender'         => 'required|in:1,2',    
            'category_id' => 'nullable|array|min:1',
            'category_id.*' => 'exists:categories,id',
        ];
    }
    public function attributes()
    {
        return [
            'company_name' => 'Company Name',
            'name' => 'Full Name',
            'email' => 'Email Address',
            'phone' => 'Phone Number',
            'phone_2' => 'Second Phone Number',
            'whatsapp' => 'WhatsApp',
            'gender' => 'Gender',
            'country_id' => 'Country',
            'city_id' => 'City',
            'category_id' => 'Categories',
        ];
    }
}