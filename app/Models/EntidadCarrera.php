<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntidadCarrera extends Model
{
    //
    protected $table = 'TBL_Carrera';

    public static function getCarrera(){

        return EntidadCarrera::pluck('car_Nombre','Car_ID');
    }

}
