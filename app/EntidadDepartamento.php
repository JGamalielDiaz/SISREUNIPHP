<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadDepartamento extends Model
{
    //
    protected $table = 'TBL_Departamento';

    protected $fillable = ['dep_Nombre'];

}
