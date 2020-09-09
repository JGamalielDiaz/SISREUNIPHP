<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstuStoreRequest extends FormRequest
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
            'per_Identificacion' => 'required|unique:tbl_persona,per_Identificacion',
            'Gen_ID'=> 'required',
            'Car_ID' => 'required',
            'est_Carnet' => 'required|unique:tbl_estudiante,est_Carnet',
            'Mun_ID' => 'required',
            'Cuar_ID' => 'required',
            'cor_Descripcion' => 'required',
            'per_Nombre' => 'required|min:3',
            'per_Apellido' => 'required|min:3'
            

        ];
    }
}
