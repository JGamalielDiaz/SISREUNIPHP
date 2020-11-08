<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstuUpdateRequest extends FormRequest
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
        $shopId = $this->route('id'); //obtenemos el id pasado al url
        // dd($shopId);
        return [
            //
            'per_Nombre' => 'required|string|between:3,30|regex:/(^[a-zA-Z ñ]+$)/',
            'per_Apellido' => 'required|string|between:3,30|regex:/(^[a-zA-Z ñ]+$)/',
            'est_Carnet' => 'required|between:9,9|regex:/(^[a-zA-Z0-9-]+$)/|unique:tbl_estudiante,est_Carnet,'.$shopId.',Est_ID',
            'per_Identificacion' => 'required|between:10,10|regex:/(^[a-zA-Z0-9- ]+$)/|unique:tbl_persona,per_Identificacion,'.$shopId.',Per_ID',
            
        ];
    }

    public function messages()
    {
        return [
            "per_Identificacion.required" => "El campo Identificacion es un campo obligatorio, debe ser rellenado",
            "per_Identificacion.unique" => "La identificacion ya esta en uso, verifica los datos",
            "per_Identificacion.between" => "El campo identificacion no puede ser menor a :min o mayor a :max",
            "per_Identificacion.regex" => 'El campo identificacion tiene caracteres especiales que no son validos',

            "est_Carnet.required" => "El carne es un campo obligatorio, debe ser rellenado",
            "est_Carnet.unique" => "El carnet estudiantil debe ser unico, numero de carnet ya esta en sistema",
            "est_Carnet.regex" => 'El campo carnet estudiantil tiene caracteres especiales que no son validos',

            "per_Nombre.required" => "El campo Nombre es requerido, rellena el campo",
            "per_Nombre.string" => "El campo debe contener solo caracteres del abecedario y espacios",
            "per_Nombre.min" => "El campo nombre no puede ser menor a :min caracteres",
            "per_Nombre.between" => "El campo nombre debe tener un minimo de :min y maximo de :max caracteres",
            "per_Nombre.regex" => 'El campo nombre tiene caracteres especiales que no son validos',
            
            "per_Apellido.required" => "El campo apellido es requerido, rellena el campo",
            "per_Apellido.string" => "El campo debe contener solo caracteres del abecedario y espacios",
            "per_Apellido.between" => "El campo apellido debe tener un minimo de :min y maximo de :max caracteres",
            "per_Apellido.regex" => 'El campo apellido tiene caracteres especiales que no son validos',
        ];
    }
}
