<?php

namespace App\Repositories\Persona;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EntidadPersona extends Model
{
    //
    protected $table = "TBL_Persona";
    
    protected $fillable = [
        'per_Identificacion',
        'Gen_ID',
        'per_Nombre',
        'per_Apellido',
        'per_fechaNacimiento',
        'per_RutaImage',
        'per_Estado'
    ];

    public function allsd()
    {
        return DB::table('TBL_Persona')->select('*');
    }

}
