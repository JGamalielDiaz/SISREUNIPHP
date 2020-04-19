<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadCuarto extends Model
{
    //
    protected $table = 'TBL_Cuarto';

    protected $fillable = ['cuar_Numero','cuar_Ubicacion','cuar_Estado'];

    protected $guarded =['Gen_id'];


    public static function getCuarto($id){

        return EntidadCuarto::where('Gen_id','=',$id)->get();
    }
}
