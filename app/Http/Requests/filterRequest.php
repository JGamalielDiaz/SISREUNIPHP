<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class filterRequest extends FormRequest
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
            'Gen_ID.*' => 'numeric|not_in:0',
            'Car_ID.*' => 'numeric|min:1|not_in:0',
            'Carnet.*' => 'string|between:1,4|regex:/(^[0-9]+$)/',
            'option' => 'string|between:3,13|regex:/(^[a-zA-Z]+$)/'
        ];
    }
}
