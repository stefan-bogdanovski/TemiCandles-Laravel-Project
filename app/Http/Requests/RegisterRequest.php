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
            "name" => "bail | required | alpha | max:255",
            "lastName" => "bail | required | alpha | max:255",
            "email" => "bail | required | unique:App\Models\User",
            "password" => "bail | required | string | min:6 | max:255"
        ];
    }
    public function messages()
    {
      return [
          "name.required" => "Ime je obavezno polje.",
          "name.alpha" => "Ime ne sme sadrzati brojeve i specijalne karaktere.",
          "lastName.required" => "Prezime je obavezno polje.",
          "lastName.alpha" => "Prezime ne sme sadrzati brojeve i specijalne karaktere.",
          "email.required" => "Email je obavezno polje.",
          "email.unique" => "Korisnik sa ovom email adresom već postoji.",
          "password.required" => "Lozinka je obavezno polje",
          "password.min" => "Minimalna duzina lozinke mora da bude 6 karaktera.",
          "password.max" => "Maksimalna duzina lozinke moze da bude 255 karaktera."
        ];
    }
}
