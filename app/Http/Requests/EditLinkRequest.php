<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditLinkRequest extends FormRequest
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
            'roles' => 'bail | required'
        ];
    }
    public function messages()
    {
        return [
            'link.required' => 'Naziv linka je obavezan.',
            'linkpath.required' => 'Putanja je obavezna.',
            'linkpath.url' => 'Putanja nije ispravna.',
            'linkpriority.required' => 'Prioritet prikazivanja linka je obavezan.',
            'roles' => 'Morate izabrati ko može videti link.'
        ];
    }
}
