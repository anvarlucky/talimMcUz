<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatsiyaRequest extends FormRequest
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
            //'fullname'=>'required|sometimes|min:10|max:100|unique:validatsiyas,fullname',
            //'address' => 'required|min:10|max:100',
            //'college' => 'required|min:5|max:100',
            //'enteringNumber' => 'required|sometimes|min:3|max:10|unique:validatsiyas,enteringNumber',

        ];
    }
}
