<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\EntidadEvento;
use Http;



class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return view('asignacionAseo.RolesAseo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function EventCalendar()
    {
        
        $Roles = DB::table('tbl_asignacionaseo as asig')
        ->join ('tbl_tipoaseo as tipA','asig.TipoAseo_ID','=','tipA.TipoAseo_ID')
        ->join('tbl_estudiante as est','est.Est_ID','=','asig.Est_ID')
        ->join('tbl_histoestucuarto as hiscua','hiscua.Est_ID','=','est.Est_ID')
        ->join('tbl_cuarto as cua','cua.Cuar_ID','=','hiscua.Cuar_ID')
        ->where('hiscua.hisCuarto_Estado',1)
        ->select('asig.rolAseo_ID as id',
        'asig.rolAseo_FechaInicial as start',
        'asig.rolAseo_FechaFinal as end',
        'cua.Cuar_ID',
        DB::raw('CONCAT("Aseo para el cuarto: ",cua.cuar_Numero ) as title'))
        ->get();
       return response()->json($Roles);
    }

    public function showRolesCuarto(Request $request,$fechaInicial,$fechafinal,$id)
    {
        if( $request->ajax()){

            $data = DB::table('tbl_persona AS per')
            ->join('TBL_Estudiante AS estu','per.Per_ID','=','estu.Est_ID')
            ->join('tbl_histoestucuarto as hsc','estu.Est_ID','=','hsc.Est_ID')
            ->join('tbl_cuarto as cua','hsc.Cuar_ID','=','cua.Cuar_ID')
            ->join('tbl_asignacionaseo as asigA','estu.Est_ID','=','asigA.Est_ID')
            ->leftJoin('tbl_histo_asignaciones_aseo as his','asigA.RolAseo_ID','=','his.RolAseo_ID')
            ->join('tbl_tipoaseo as tipAseo','asigA.TipoAseo_ID','=','tipAseo.TipoAseo_ID')
            ->where('hsc.hisCuarto_Estado',1)
            ->where('estu.est_Estado',1)
            ->where('cua.Cuar_ID',$id)
            ->where('asigA.rolAseo_FechaInicial',$fechaInicial)
            ->where('asigA.rolAseo_FechaFinal',$fechafinal)
            ->select('estu.Est_ID','hisAseo_Cumple','asigA.RolAseo_ID','tipAseo.tipoAseo_Nombre','cua.cuar_Numero','rolAseo_Estado', DB::raw('CONCAT(per.per_nombre , " ", per.per_Apellido) AS full_name'))
            ->get();
            return Datatables($data)
            ->addColumn('btnEstado','asignacionAseo.btnTablesEstado')
            ->rawColumns(['btnEstado'])
            ->toJson();       
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request,$cua_ID,$asigID)
    {
        $data = DB::table('tbl_persona AS per')
        ->join('TBL_Estudiante AS estu','per.Per_ID','=','estu.Est_ID')
        ->join('tbl_histoestucuarto as hsc','estu.Est_ID','=','hsc.Est_ID')
        ->join('tbl_cuarto as cua','hsc.Cuar_ID','=','cua.Cuar_ID')
        ->join('tbl_asignacionaseo as asigA','estu.Est_ID','=','asigA.Est_ID')
        ->leftJoin('tbl_histo_asignaciones_aseo as his','asigA.RolAseo_ID','=','his.RolAseo_ID')
        ->join('tbl_tipoaseo as tipAseo','asigA.TipoAseo_ID','=','tipAseo.TipoAseo_ID')
        ->where('hsc.hisCuarto_Estado',1)
        ->where('estu.est_Estado',1)
        ->where('cua.Cuar_ID',$cua_ID)
        ->where('asiasigA.Est_ID',$asigID)
        ->select('per.per_nombre','per.per_Apellido','cua.cuar_Numero')
        ->get();
        return response()->json($data);        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verificarCumplimiento($asigID){
        $detalles = DB::table('tbl_persona AS per')
        ->join('TBL_Estudiante AS estu','per.Per_ID','=','estu.Est_ID')
        ->join('tbl_histoestucuarto as hsc','estu.Est_ID','=','hsc.Est_ID')
        ->join('tbl_cuarto as cua','hsc.Cuar_ID','=','cua.Cuar_ID')
        ->join('tbl_asignacionaseo as asigA','estu.Est_ID','=','asigA.Est_ID')
        ->join('tbl_carrera as car','estu.Car_ID','=','car.Car_ID')
        ->join('tbl_recinto as rec','car.Rec_ID','=','car.Rec_ID')
        ->leftJoin('tbl_histo_asignaciones_aseo as his','asigA.RolAseo_ID','=','his.RolAseo_ID')
        ->join('tbl_tipoaseo as tipAseo','asigA.TipoAseo_ID','=','tipAseo.TipoAseo_ID')
        ->where('estu.est_Estado',1)
        ->where('rec.Rec_ID',1)
        ->where('asigA.RolAseo_ID',$asigID)
        ->select('per.per_Nombre','per.per_Apellido',
        'cua.cuar_Numero','asigA.RolAseo_ID','car.car_Nombre',
        'rec.rec_Descripcion','estu.est_Carnet','his.hisAseo_Cumple')
        ->get();
        $hoy=now();
     
        return view('asignacionAseo.verificarCumplimiento',compact('detalles','hoy'));
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
