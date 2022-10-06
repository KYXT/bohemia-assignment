<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'      => 'required|string|min:3|max:255',
            'surname'   => 'required|string|min:3|max:255',
            'nickname'  => 'required|string|min:3|max:100',
            'phone'     => 'required|numeric|digits_between:6,20',
            'email'     => 'required|email|min:6|max:255|unique:users,email',
            'address'   => 'required|string|min:5|max:100',
            'city'      => 'required|string|min:3|max:50',
            'state'     => 'required|string|min:2|max:50',
            'zip'       => 'required|string|min:3|max:10',
            'password'  => 'required|string|min:8|max:255'
        ];
    }
}
