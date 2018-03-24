<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsCreateRequest extends FormRequest
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
            'name' => 'required',
            'category' => 'required',
            'firm' => 'required',
            'number' => 'required',
            'percent' => 'required',
            'first_price' => 'required',
            'last_price' => 'required',
        ];
    }
}