<?php

namespace App\Http\Requests;

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
            'First_name' => 'required|max:250|string',
            'Last_name' => 'required|max:250|string',
            'email' => 'required|max:255|unique:useres,email',
            'password' => 'required|min:6',
            'contact' => 'required|numeric',
            'gender' => 'in:Male,Female,Other',
            'address' => 'string',
            // 'country' => 'required|exists:countries,id',
            // 'state' => 'required|exists:states,id',
            'profile' => 'mimes:jpg,jpeg,png'

        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'First_name.required' => 'Name is required!',
            'password.required' => 'Password is required!'
        ];
    }

    public function filters()
    {
        return [
            'email' => 'trim|lowercase',
            'name' => 'trim|capitalize|escape'
        ];
    }
}
