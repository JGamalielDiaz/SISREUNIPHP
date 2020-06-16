<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntidadMunicipio extends Model
{
    //
    protected $table = 'TBL_Municipio';

    protected $fillable = ['mun_Nombre'];

    protected $guarded = ['Dep_ID'];

    public static function getMunicipioID($id){

        return EntidadMunicipio::where('Dep_ID','=',$id)
        ->get();
    }

}
