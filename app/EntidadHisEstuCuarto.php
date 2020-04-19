<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadHisEstuCuarto extends Model
{
    //
    protected $table = 'TBL_HistoEstuCuarto';
    protected $fillable = ['hisCuarto_FechaInicial','hisCuarto_FechaFinal','hisCuarto_MotivoCambio','hisCuarto_Estado'];
    protected $guarded =['Est_ID','Cuar_ID','Usu_ID'];
}
