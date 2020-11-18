<?php

namespace Repositories\Carrera;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CarreraClass
{
    //

    public function getCarreraInfo(){

        $getData = DB::table('tbl_persona')
                    ->join('tbl_estudiante','tbl_estudiante.Est_ID','=','tbl_persona.Per_ID')
                    ->join('tbl_carrera','tbl_carrera.Car_ID','=','tbl_estudiante.Car_ID')
                    ->select('tbl_carrera.car_Nombre',(DB::raw('count(tbl_carrera.car_Nombre) as total')))
                    ->groupBy('tbl_carrera.car_Nombre')
                    ->get();
        return $getData;

    }
}
