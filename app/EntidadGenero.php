<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadGenero extends Model
{
    //
    protected $table = 'TBL_Genero';

    public static function getGenero(){

        return EntidadGenero::pluck('gen_Nombre','Gen_id');
    }
}
