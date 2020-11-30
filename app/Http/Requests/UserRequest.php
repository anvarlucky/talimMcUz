<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'f_name' => 'required|min:3|max:50',
            's_name' => 'required|min:3|max:50',
            'l_name' => 'required|min:3|max:50',
            'email' => 'required|max:50|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required'
        ];
    }
}
