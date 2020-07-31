<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiteInfo extends FormRequest
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
            //
            'txtAbout' => 'required',
            'txtEmail'=> 'required',
            'txtPhone' => 'required'
        

        ];
    }

    public function messages()
    {
        return [
            'txtAbout.required' => 'يجب ادخال وصف الموقع للمساعدة في ارشفة الموقع ضمن محركات البحث <style>#txtAbout{background-color:#FFFF99}</style>',
            'txtEmail.required' => 'يجب ادخال االبريد الالكتروني <style>#txtEmail{background-color:#FFFF99}</style>',
            'txtPhone.required' => 'يجب ادخال رقم الهاتف <style>#txtPhone{background-color:#FFFF99}</style>',
        ];
    }
}
