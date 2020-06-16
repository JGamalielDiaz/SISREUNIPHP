<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntidadBarrio extends Model
{
    //
    protected $table ='TBL_Barrio';
    protected $fillable = ['bar_Nombre'];
    protected $guarded = ['Mun_ID'];
    
}
