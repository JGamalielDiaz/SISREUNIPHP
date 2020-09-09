<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntidadRecinto extends Model
{
    //
    protected $table = 'TBL_Recinto';

    protected $fillable = ['rec_Descripcion'];

    protected $guarded =['Rec_ID'];
}
