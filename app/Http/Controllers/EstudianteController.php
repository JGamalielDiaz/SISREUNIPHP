<?php

namespace App\Http\Controllers;

use App\Models\EntidadCarrera;
use App\Models\EntidadCuarto;
use App\Models\EntidadDepartamento;
use App\Models\EntidadGenero;
use App\Models\EntidadMunicipio;
use App\Http\Requests\EstuUpdateRequest;
use App\Http\Requests\filterRequest;
use App\Http\Requests\saveStudentRequest;
use Dotenv\Result\Result;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Repositories\Persona\IPersonaPost;
use Repositories\Estudiante\EstudiantePost as EstudianteEstudiantePost;
use Yajra\DataTables\DataTables;

class EstudianteController extends Controller
{
    //

    protected $model;

    public function __construct(IPersonaPost $model){

    
        $this->middleware('auth');
    
        $this->model = $model;
    }

    public function index(){

        try {
            //code...
            $departamentos = EntidadDepartamento::pluck('dep_Nombre','Dep_Id');
            $carrera = EntidadCarrera::getCarrera();
            $genero = EntidadGenero::getGenero();
            return view('estudiante.crearEstudiante',compact('departamentos','carrera','genero'));

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
        

        
        
    }

    public function getMunicipio(Request $request, $id){

        try {
            //code...
            if ($request->ajax()) {
                # code...
                $Municipios= EntidadMunicipio::getMunicipioId($id);
                
                return response()->json($Municipios);
            }
        } catch (\Throwable $th) {
            //throw $th;

            throw new Exception($th->getMessage());
        }

        
    }

    public function getRoom(Request $request, $id){

        try {
            //code...

            if ($request->ajax()) {
                # code...
                
                $cuarto = EntidadCuarto::getCuarto($id);
    
                return response()->json($cuarto);
            }

        } catch (\Throwable $th) {
            //throw $th;

            throw new Exception($th->getMessage());

        }

         

    }

    public function getEstuInfo(){

        $carreras = EntidadCarrera::pluck('car_Nombre','Car_ID');
        
        $generos = EntidadGenero::pluck('gen_Nombre','Gen_ID');

        return view('estudiante.visualizarEstudiantes',compact('generos','carreras'));
    }

    public  function store (saveStudentRequest $request){

        try {
            //code...
            
            if($request->ajax()){

               $this->model->create($request->validated());


                return response()->json(['message'=> 'ok']);
            }
            

        } catch (\Throwable $th) {
            //throw $th;
            
            return response()->json(['message' => 'Error al guardar Informacion', 'error'=>$th->getMessage()]);
        }
            
          
    }

    public function edit($id){


        $persona = new EstudianteEstudiantePost();

        $persona = $persona->getInfoToEdit($id);


        return view('estudiante.editarEstudiante',compact('persona'));

    }

    public function update(EstuUpdateRequest $Student, $id){

        // dd($Student);

        $ban =$this->model->update($Student->validated(),$id);

        // dd($ban);

        return redirect()->back()->with('Message','Usuario Creado Con Exito!');
        
    }

    public function filterResult(filterRequest $request){

        

        // dd($option);

        if($request->ajax()){

    

            $data = new EstudianteEstudiantePost();
            $data = $data->getInfoFilter($request->validated());

            if( $data === null ) { return response()->json(['info' =>'error vacio']); }

            return (DataTables::of($data)
                        ->addColumn('btnEdit',function($data){
                            return ('<a href="'.(route('student.edit',$data->Per_ID)).'" id="'.$data->Per_ID.'" class="edit btn btn-primary">Editar</a>');
                        })
                    ->rawColumns(['btnEdit'])
                    ->toJson());


        }

        

        
    }

}
