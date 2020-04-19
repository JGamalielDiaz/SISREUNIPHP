<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadCorreo extends Model
{
    //
    protected $table = 'TBL_Correo';
    protected $fillable = ['cor_Descripcion','cor_Estado'];
    protected $guarded = ['Per_ID'];
}
