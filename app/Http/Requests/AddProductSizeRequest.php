<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductSizeRequest extends FormRequest
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
            'price' => 'required | gt:0',
            'product' => 'exists:products,id',
            'size'=>'exists:sizes,id'
        ];
    }
    public function messages()
    {
        return [
            'price.gt' => 'Cena mora biti veća od 0 dinara.',
            'product.exists' => 'Proizvod ne postoji.',
            'size.exists' => 'Veličina ne postoji.'
        ];
    }
}
