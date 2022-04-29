<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'              => ['nullable'],
            'name'            => ['required', 'max:255'],
            'unit_price'      => ['required', 'integer', 'min:0'],
            'promotion_price' => ['integer', 'min:0'],
            'category_id'        => ['required', 'integer', 'min:0'],
        ];
    }
}
