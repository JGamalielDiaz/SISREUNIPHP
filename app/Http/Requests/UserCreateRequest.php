<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            //
            'per_Nombre' => 'required|min:3|max:20',
            'per_Identificacion' => 'required|min:3',
            'per_Apellido' => 'required',
            'roles'=> 'required',
            'password'=> 'required',
            'name'=> 'required',
            'permission'=> 'required',
            'email' => 'required'
        ];
    }
}
