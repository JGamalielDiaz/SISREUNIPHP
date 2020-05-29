<?php

use App\Repositories\Estudiante\EntidadEstudiante;
use App\Repositories\Persona\EntidadPersona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Repositories\Persona\PersonaPost;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\QueryDataTable;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('EstuList',function(){

    $data = DB::table('TBL_Persona AS per')
    ->join('TBL_Estudiante AS estu','per.Per_ID','=','estu.Est_ID')
    ->select('per.Per_ID','per.per_Nombre','per.per_Apellido','per.per_Identificacion','estu.est_Carnet')
    ->get();
    return Datatables($data)
            ->addColumn('btn',function($data){
                return '<a href="#" id="'.$data->Per_ID.'" class="edit btn btn-primary" data-target="#ModalUpdate">Editar</a>';
            })
            ->rawColumns(['btn'])
            ->toJson();
});

Route::get('RolesPendientes',function(){

    $data = DB::table('tbl_persona AS per')
    ->join('TBL_Estudiante AS estu','per.Per_ID','=','estu.Est_ID')

    ->join('tbl_histoestucuarto as hsc','estu.Est_ID','=','hsc.Est_ID')
    ->join('tbl_cuarto as cua','hsc.Cuar_ID','=','cua.Cuar_ID')
    ->join('tbl_usuario as usu','hsc.Usu_ID','=','usu.Usu_ID')
    ->join('tbl_histo_asignaciones_aseo as hra','usu.Usu_ID','=','hra.Usu_ID')
    ->join('tbl_asignacionaseo as asigA','hra.RolAseo_ID','=','asigA.RolAseo_ID')
    ->join('tbl_tipoaseo as tipAseo','asigA.TipoAseo_ID','=','tipAseo.TipoAseo_ID')
    ->select('per.Per_ID','per.per_Nombre','per.per_Apellido','tipAseo.tipoAseo_Nombre')
    ->get();
    
    return Datatables($data)->addColumn('btn',function($data){
        return '<a href="#" id="'.$data->Per_ID.'" class="edit btn btn-primary" data-target="#ModalUpdate">Editar</a>';
    })
    ->rawColumns(['btn'])
    ->toJson();       
});
