<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
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
            'name.uz' => 'required|min:5|max:50|unique:regions_for_all,name->uz',
            'name.ru' => 'required|min:5|max:50|unique:regions_for_all,name->ru',
            'name.en' => 'required|min:5|max:50|unique:regions_for_all,name->en',
        ];
    }
}
