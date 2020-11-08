<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class saveStudentRequest extends FormRequest
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
            'per_Nombre' => 'required|string|between:3,30|regex:/(^[a-zA-Z ñ]+$)/',
            'per_Apellido' => 'required|string|between:3,30|regex:/(^[a-zA-Z ñ]+$)/',
            'est_Carnet' => 'required|unique:tbl_estudiante|between:9,9|regex:/(^[a-zA-Z0-9-]+$)/',
            'per_Identificacion' => 'required|unique:tbl_persona|between:10,10|regex:/(^[a-zA-Z0-9-]+$)/',
            'Gen_ID'=> 'required|numeric|min:1|not_in:0',
            'Cuar_ID' => 'required|numeric|min:1|not_in:0',
            'Car_ID' => 'required|numeric|min:1|not_in:0',
            'Tel_Descripcion' => 'nullable|between:8,8|regex:/(^([1-9][0-9])+$)/',
            'Dep_ID' => 'required|numeric|min:1|not_in:0',
            'Mun_ID' => 'required|numeric|min:1|not_in:0',
            'cor_Descripcion' => 'nullable|email|unique:tbl_correo|between:10,70',
            'dir_Descripcion' => 'nullable|regex:/(^[a-zA-Z\@,. \d]+$)/'

            
            

        ];
    }

    public function messages()
    {
        return [
            "Mun_ID.required" => "El campo municipio debe ser seleccionado",
            "Mun_ID.min" => "Seleccione una opcion valida para el campo Municipio",
            "Mun_ID.not_in" => "Seleccione una opcion valida para el campo Municipio",
            "Mun_ID.numeric" => "El valor del campo Municipio no es valido",
            

            "Cuar_ID.required" => "El campo Cuarto debe ser Seleccionado",
            "Cuar_ID.min" => "Seleccione una opcion valida para el campo Cuarto",
            "Cuar_ID.not_in" => "Seleccione una opcion valida para el campo Cuarto",
            "Cuar_ID.numeric" => "El valor del campo Cuarto no es valido",

            "Gen_ID.required" => "El campo genero debe ser seleccionado",
            "Gen_ID.min" => "Seleccione una opcion valida para el campo genero",
            "Gen_ID.not_in" => "Seleccione una opcion valida para el campo genero",
            "Gen_ID.numeric" => "El valor del campo Genero no es valido",
            

            "Car_ID.required" => "El campo carrera debe seleccionar una opcion",
            "Car_ID.min" => "Seleccione una opcion valida para el campo Carrera",
            "Car_ID.not_in" => "Seleccione una opcion valida para el campo Carrera",
            "Car_ID.numeric" => "El valor del campo Carrera no es valido",

            "Dep_ID.required" => "El campo Departamento es debe seleccionar una opcion",
            "Dep_ID.min" => "Seleccione una opcion valida para el campo Departamento",
            "Dep_ID.not_in" => "Seleccione una opcion valida para el campo Departamento",
            "Dep_ID.numeric" => "El valor del campo Departamento no es valido",

            "per_Identificacion.required" => "El campo Identificacion es un campo obligatorio, debe ser rellenado",
            "per_Identificacion.unique" => "La identificacion ya esta en uso, verifica los datos",
            "per_Identificacion.between" => "El campo identificacion no puede ser menor a :min o mayor a :max",
            "per_Identificacion.regex" => 'El campo identificacion tiene caracteres especiales que no son validos',

            "est_Carnet.required" => "El carne es un campo obligatorio, debe ser rellenado",
            "est_Carnet.unique" => "El carnet estudiantil debe ser unico, numero de carnet ya esta en sistema",
            "est_Carnet.regex" => 'El campo carnet estudiantil tiene caracteres especiales que no son validos',

            "cor_Descripcion.email" => "El campo correo no es valido",
            "cor_Descripcion.between" => "El campo correo debe tener un minimo de :min y maximo de :max caracteres",
            "cor_Descripcion.unique" => "El correo ya existe en sistema, verifica el campo",

            "per_Nombre.required" => "El campo Nombre es requerido, rellena el campo",
            "per_Nombre.string" => "El campo debe contener solo caracteres del abecedario y espacios",
            "per_Nombre.min" => "El campo nombre no puede ser menor a :min caracteres",
            "per_Nombre.between" => "El campo nombre debe tener un minimo de :min y maximo de :max caracteres",
            "per_Nombre.regex" => 'El campo nombre tiene caracteres especiales que no son validos',
            
            "per_Apellido.required" => "El campo apellido es requerido, rellena el campo",
            "per_Apellido.string" => "El campo debe contener solo caracteres del abecedario y espacios",
            "per_Apellido.between" => "El campo apellido debe tener un minimo de :min y maximo de :max caracteres",
            "per_Apellido.regex" => 'El campo apellido tiene caracteres especiales que no son validos',

            "Tel_Descripcion.regex" => "El campo telefono solo puede tener numeros y no empezar con 0",
            "Tel_Descripcion.between" => "El campo telefono debe tener un minimo de :min y maximo de :max caracteres",
        ];
    }

}
