<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $data = [
            'desc_ar'        =>'required|min:3',
            'sub_desc_ar'        =>'required|min:3|max:191',
            'desc_en'        =>'nullable|min:3',
            'sub_desc_en'        =>'nullable|min:3|max:191',
        //   'photo'             => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];


    if(\Route::currentRouteName()=='articles.store')
    {
        $data['title_en']  ='required|min:3|max:191|unique:articles,title_en,NULL,id';
        $data['title_ar'] ='required|min:3|max:191|unique:articles,title_ar,NULL,id';            
    }
    else
    {
        $data['title_en'] = 'required|min:3|max:191|unique:articles,title_en,'.$this->article .',id';
        $data['title_ar'] = 'required|min:3|max:191|unique:articles,title_ar,'.$this->article .',id';
    }
       return $data; 
}
}
