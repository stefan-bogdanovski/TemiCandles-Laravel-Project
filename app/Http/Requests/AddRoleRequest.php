<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRoleRequest extends FormRequest
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
            'role' => 'unique:roles,name| required'
        ];
    }
    public function messages()
    {
        return [
            'role.required' => 'Morate uneti naziv uloge.',
            'role.unique' => 'Uloga sa zadatim nazivom već postoji.'
        ];
    }
}
