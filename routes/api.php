<?php

use App\Repositories\Persona\EntidadPersona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Repositories\Persona\PersonaPost;
use Yajra\DataTables\DataTables;


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

Route::get('AllStudent',function(){

    $data = DB::table('TBL_Persona')
        ->join('TBL_Estudiante','TBL_Persona.Per_ID','=','TBL_Estudiante.Est_ID')
        ->select('TBL_Persona.Per_ID as Per_ID','TBL_Persona.per_Nombre as per_Nombre','TBL_Persona.per_Apellido as per_Apellido','TBL_Persona.per_Identificacion as per_Identificacion','TBL_Estudiante.est_Carnet as est_Carnet');
        //yajra  en el select si no coincide con el nombre del column name de ajax, no funciona el serverside    
            
    return (DataTables::of($data)
        ->addColumn('btnEdit',function($data){
            return ('<a href="'.(route('student.edit',$data->Per_ID)).'" id="'.$data->Per_ID.'" class="edit btn btn-primary">Editar</a>');
        })
        ->rawColumns(['btnEdit'])
        ->toJson());
})->name('lista');

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

Route::get('getGen',function(){

    return response()->json(['women'=>(EntidadPersona::getGenderID(1)),'men'=>(EntidadPersona::getGenderID(2))]);
});

Route::get('editUser',function(){

    try {
        //code...
        $data = DB::table('tbl_persona AS per')
        ->join('users', 'users.Per_ID','=','per.Per_ID')
        ->select('per.Per_ID','per.per_Nombre','per_Apellido','users.name')
        ->get();
        return Datatables($data)
        ->addColumn('btn',function($data){
            return ('<a href="#" id="'.$data->Per_ID.'" class="edit btn btn-primary" data-target="#ModalUpdate">Editar</a>');
        })
        ->rawColumns(['btn'])
        ->toJson();

    } catch (\Throwable $th) {
        //throw $th;

        throw new Exception($th->getMessage());
    }
    

});