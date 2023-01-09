<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'productName' => 'required|max:250|string',
            'productPrice' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'productImage' => 'required|mimes:jpg,jpeg,png'

        ];
    }

    public function messages()
    {
        return [
<<<<<<< HEAD
            'productName.required' => 'product Name is required!',
            'productPrice.required' => 'product Price is required!',
            'productPrice.regex' => 'Plese enter valid amount!',
            'productImage.required' => 'product Image is required!'
=======
            'productName.required' => 'productName is required!',
            'productPrice.required' => 'productPrice is required!',
            'productImage.required' => 'productImage is required!',
            'productPrice.regex' => 'Plese enter a valid amount!'
>>>>>>> 388901ad394a90c1c4cb11d9383bff182eb7a157
        ];
    }
}
