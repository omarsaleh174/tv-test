<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
    {
        if(auth()->user()->can('admin') || auth()->user()->can('update user')|| auth()->user()->id==$this->user)
        return true;
        return false;
    }
    public function rules()
    {
        // 'regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/','regex:/[@$!%*#?&]/',
        return [
            'name'	=>'	required|min:3|max:191',
            'email'  =>'required|email|unique:users,email,'.$this->user.',id,deleted_at,NULL',
            'phone'  =>'required|digits_between:2,20|unique:users,phone,'.$this->user.',id,deleted_at,NULL',
            'password' => ['nullable','min:8','max:32',],
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ];
    }
}
