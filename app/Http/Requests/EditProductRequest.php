<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            "name" => 'required',
            "opis" => 'required',
            "size" => 'required',
            "notes" => 'required',
            "price" => 'required'
        ];
    }
    public function messages()
    {
        return [
          "name.required" => "Ime je obavezno",
          "opis.required" => "Opis je obavezan",
          "notes.required" => "Mora postojati bar 1 aroma sveće",
          "size.required" => "Morate izabrati veličinu proizvoda",
          "price.required" => "Morate staviti cenu proizvoda"
        ];
    }
}
