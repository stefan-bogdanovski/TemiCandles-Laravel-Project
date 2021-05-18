<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakePurchaseRequest extends FormRequest
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
            'placanje' => 'bail | required | exists:payment,id',
            'opstina' => 'bail | required | min:2',
            'grad' => 'bail | required | min:2',
            'adresa' => 'bail | required',
            'telefon' => 'bail | required | min:12'
        ];
    }
    public function messages()
    {
        return [
            'placanje.exists' => 'Morate izabrati način plaćanja.',
            'opstina.required' => 'Morate uneti opštinu.',
            'opstina.min' => 'Opština mora sadržati bar 2 karaktera.',
            'grad.required' => 'Morate uneti grad ili naselje.',
            'grad.min' => 'Grad mora sadrŽati bar 2 karaktera.',
            'adresa.required' => 'Morate uneti adresu.',
            'telefon.required' => 'Morate uneti broj telefona',
            'telefon.min' => 'Minimalan broj karaktera za telefon je 12, primer:+38162123456'
        ];
    }
}
