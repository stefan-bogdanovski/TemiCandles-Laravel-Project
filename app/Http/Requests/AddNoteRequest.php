<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNoteRequest extends FormRequest
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
            'name' => 'bail | required | unique:notes,name'
        ];
    }
    public function messages()
    {
        return [
            'name.unique' => 'Aroma sa ovakvim imenom već postoji.',
            'name.required' => 'Naziv arome je obavezno polje.'
        ];
    }
}
