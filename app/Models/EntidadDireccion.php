<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntidadDireccion extends Model
{
    //
    protected $table = 'TBL_Direccion';
    protected $fillable = ['dir_Descripcion','dir_Estado'];
    protected $guarded = ['Mun_ID','Per_ID'];
}
