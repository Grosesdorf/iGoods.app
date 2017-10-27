<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoods extends FormRequest
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
            'name' => 'required|alpha_dash|max:100',
            'price' => 'required|numeric|between:0.01,999999.99',
//            'price_old' => 'numeric|between:0.01,999999.99',
//            'shipping_costs' => 'numeric|between:0.01,999999.99',
            'EAN' => 'required|numeric|between:0000000000000,9999999999999',
        ];
    }
}
