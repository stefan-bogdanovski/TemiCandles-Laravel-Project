<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSizeRequest extends FormRequest
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
            'size' => 'bail | numeric | gt:0 |required',
            'unit' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'size.gt' => 'Veličina mora biti veća od 0.',
            'size.required' => 'Veličina je obavezna.',
            'unit.required' => 'Merna jedinica je obavezna.'
        ];
    }
}
