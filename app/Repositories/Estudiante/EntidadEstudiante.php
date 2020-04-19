<?php

namespace App\Repositories\Estudiante;

use Illuminate\Database\Eloquent\Model;

class EntidadEstudiante extends Model
{
    //
    protected $table = "tbl_Estudiante";

    protected $fillabel= [
        'Car_ID',
        'est_Carnet',
        'est_FechaInicial',
        'est_FechaFinal',
        'est_Estado'
    ];

    protected $guarded = ['Estu_ID'];
}
