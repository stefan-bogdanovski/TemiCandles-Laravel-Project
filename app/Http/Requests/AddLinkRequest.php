<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddLinkRequest extends FormRequest
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
            'link' => 'bail | required',
            'linkpath' => 'bail | required | url',
            'linkpriority' => 'bail | required | numeric',
            'category' => 'bail | exists:menu_types,id',
            'roles' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'link.required' => 'Naziv je obavezan.',
            'linkpath.required' => 'Putanja je obavezna.',
            'linkpath.url' => 'Proverite da li je putanja vazeca URL adresa.',
            'linkpriority.required' => 'Prioritet prikazivanja linka je obavezan.',
            'category.exists' => 'Izabrana kategorija linka ne postoji.',
            'roles.required' => 'Izaberite ko može sve videti link.'
        ];
    }
}
