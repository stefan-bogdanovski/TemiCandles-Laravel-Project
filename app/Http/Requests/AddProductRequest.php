<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            "name" => 'required | unique:products',
            "opis" => 'required',
            "size" => 'required',
            "type" => 'required',
            "notes" => 'required',
            "price" => 'required | numeric | gt:0',
            "slika" => 'required | image'
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "Ime je obavezno polje.",
            "name.unique" => "Sveća sa ovim imenom već postoji u bazi podataka, proverite obrisane proizvode.",
            "opis.required" => "Opis je obavezan.",
            "size.required" => "Morate odabrati veličinu proizvoda.",
            "type.required" => "Morate odabrati tip proizvoda.",
            "notes.required" => "Proizvod mora imati bar jednu notu.",
            "price.required" => "Cena je obavezna.",
            "price.numeric" => "Cena mora biti broj.",
            "price.gt" => "Cena mora biti veća od 0."
        ];
    }
}
