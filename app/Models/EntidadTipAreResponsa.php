<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntidadTipAreResponsa extends Model
{
    //
    protected $table = 'TBL_TipoArea_Responsable';
    protected $fillable = ['area_Descripcion','area_Estado'];
}
