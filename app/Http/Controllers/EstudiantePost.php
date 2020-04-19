<?php

namespace App\Http\Controllers;

use App\EntidadCarrera;
use App\EntidadCuarto;
use App\EntidadDepartamento;
use App\EntidadGenero;
use App\EntidadMunicipio;
use App\Http\Requests\EstuStoreRequest;
use Illuminate\Http\Request;
use Repositories\Persona\IPersonaPost;

class EstudiantePost extends Controller
{
    //

    protected $model;

    public function __construct(IPersonaPost $model){

        $this->model = $model;
    }

    public function index(){

        $departamentos = EntidadDepartamento::pluck('dep_Nombre','Dep_Id');
        $carrera = EntidadCarrera::getCarrera();
        $genero = EntidadGenero::getGenero();

        
        return view('ViewEstudianteRegistro',compact('departamentos','carrera','genero'));
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

        return view('viewListadoEstu');
    }

    public function store (EstuStoreRequest $request){

       $this->model->create($request->validated());

         return back();
    }

}
