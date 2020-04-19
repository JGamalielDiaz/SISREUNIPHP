<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadTelefono extends Model
{
    //
    protected $table = 'TBL_Telefono';

    protected $fillable = ['tel_Numero','tel_Estado'];

    protected $guarded = ['Per_ID'];
    
}
