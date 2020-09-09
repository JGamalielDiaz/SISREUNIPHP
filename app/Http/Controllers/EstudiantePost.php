<?php

namespace App\Http\Controllers;

use App\Models\EntidadCarrera;
use App\Models\EntidadCuarto;
use App\Models\EntidadDepartamento;
use App\Models\EntidadGenero;
use App\Models\EntidadMunicipio;
use App\Http\Requests\EstuStoreRequest;
use App\Http\Requests\EstuUpdateRequest;
use Illuminate\Http\Request;
use Repositories\Persona\IPersonaPost;
use Illuminate\Support\Facades\DB;


class EstudiantePost extends Controller
{
    //

    protected $model;

    public function __construct(IPersonaPost $model){

    
        $this->middleware('auth');
    
        $this->model = $model;
    }

    public function index(){

        // $departamentos = EntidadDepartamento::pluck('dep_Nombre','Dep_Id');
        // $carrera = EntidadCarrera::getCarrera();
        // $genero = EntidadGenero::getGenero();

        
        // return view('student.createStudent',compact('departamentos','carrera','genero'));

        throw new \App\Exceptions\StudenException('Problemas al cargar la pagina');
    }

    public function getMunicipio(Request $request, $id){

        if ($request->ajax()) {
            # code...
            $Municipios= EntidadMunicipio::getMunicipioId($id);
            
            return response()->json($Municipios);
        }
    }

    public function getRoom(Request $request, $id){

        if ($request->ajax()) {
            # code...
            
            $cuarto = EntidadCuarto::getCuarto($id);

            return response()->json($cuarto);
        }

    }

    public function getEstuInfo(){

        return view('student.showStudent');
    }

    public function store (EstuStoreRequest $request){

        // if ($request->ajax()) {
            # code...
            $this->model->create($request->validated());

            return back()->with('Message', 'Registro Guardado Con Exito');
        // }   
    }

    function getData(Request $request){

        $id= $request->input('id');

        $data = DB::table('TBL_Persona AS per')
    ->join('TBL_Estudiante AS estu','per.Per_ID','=','estu.Est_ID')
    ->where([
        ['per.Per_ID','=',$id],
        ['estu.Est_ID','=',$id]
    ])
    ->select('per.Per_ID','per.per_Nombre','per.per_Apellido','per.per_Identificacion','estu.est_Carnet')
    ->get();
    return response()->json($data);
    }

    public function edit(EstuUpdateRequest $request,$id){

        if ($request->ajax()) {
            # code...
           $data =$this->model->update($request->validated(),$id);

           return response()->json($data);
        }
    }
}
