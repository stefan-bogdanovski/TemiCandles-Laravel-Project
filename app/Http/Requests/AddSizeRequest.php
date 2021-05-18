<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSizeRequest extends FormRequest
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
            'size' => 'bail | unique:sizes,size| required',
            'unit' => 'bail | required'
        ];
    }
    public function messages()
    {
        return [
            'size.unique' => 'Ova veličina već postoji, povratite privremeno obrisan zapis.',
            'unit.required' => 'Merna jedinica je obavezno polje.'
        ];
    }
}
