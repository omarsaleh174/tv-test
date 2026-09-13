<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
     public function authorize()
    {
        if(auth()->user()->can('admin') || auth()->user()->can('add user') )

            return true;

        return false;
    }

    public function rules()
    {
        return [
        'email'  =>'required|email|unique:users,email,NULL,id,deleted_at,NULL',
        'phone'  =>'required|digits_between:2,20|unique:users,phone,NULL,id,deleted_at,NULL',
        'password'=>'required|min:8|max:32',
        'name'	=>'	required|min:3|max:191',
        'photo'	=>'	nullable|image|max:4096',
         ];
    }
}
