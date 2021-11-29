<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'f_name' => 'required|min:3|max:100',
            's_name' => 'required|min:3|max:100',
            'l_name' => 'required|min:3|max:100',
            'entering_number' => 'required|sometimes|min:3|max:20',
            'photo' => 'max:5120',
            'order_photo' => 'max:5120',
            'pnfl' => 'required|min:14|max:14'
        ];
    }
}
