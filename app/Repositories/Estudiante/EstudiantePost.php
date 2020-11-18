<?php

namespace Repositories\Estudiante;

use App\Repositories\Estudiante\EntidadEstudiante;
use Repositories\Estudiante\IEstudiantePost;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Repositories\Cuarto\CuartoHistorialPost;

class EstudiantePost implements IEstudiantePost {

    public function getModel()
    {
        return new EntidadEstudiante;
    }

    public function all()
    {
        return $this->getModel()->all();
    }

    public function create(array $data)
    {
        $date = Carbon::now();
        $Estudiante = $this->getModel();
            $Estudiante->Est_ID = $data['Est_ID'];
            $Estudiante->Car_ID = $data['Car_ID'];
            $Estudiante->est_Carnet = $data['est_Carnet'];
            $Estudiante->est_FechaInicial = $date->toDateString();
            $Estudiante->est_FechaFinal = null;
        $Estudiante->save();

        $HisCuarto= new CuartoHistorialPost();
        $HisCuarto->create($data);

        return $Estudiante;
    }

    public function update(array $data, $id)
    
    {
        $dataEstudent = ['est_Carnet'=> $data['est_Carnet']];
        return $this->getModel()->where('Est_ID',$id)->update($dataEstudent);
    }

    public function finById($id)
    {
        if (null== $post = $this->getModel()->where('Est_ID','=',$id)) {

            throw new ModelNotFoundException("Post Not Found");
        }

        return $post;
    }

    public function getInfoToEdit($id){

       $infoStudentEdit= DB::table('tbl_persona')
                ->join('tbl_estudiante','tbl_persona.Per_ID','=','tbl_estudiante.Est_ID')
                ->where('tbl_persona.Per_ID','=',$id)
                ->select('tbl_persona.Per_ID AS Per_ID','tbl_persona.per_Nombre AS per_Nombre','tbl_persona.per_Apellido AS per_Apellido','tbl_persona.per_Identificacion AS per_Identificacion','tbl_estudiante.est_Carnet AS est_Carnet')
            ->first();

        return $infoStudentEdit;
    }

    public function getInfoFilter(array $data)
    {
        
        $carreras = isset($data['Car_ID'])?$data['Car_ID']:0;
        $carnet = isset($data['Carnet'])?$data['Carnet']:0;
        $generos = isset($data['Gen_ID'])?$data['Gen_ID']:0;
        $option = isset($data['option'])?$data['option']:0;
        

        switch ($option) {
            case 'genero':
                # code...
                

                $response = DB::table('tbl_persona')
                            ->join('tbl_estudiante','tbl_estudiante.Est_ID','=','tbl_persona.Per_ID')
                            ->whereIn('tbl_persona.Gen_ID',$generos)
                            ->select('tbl_persona.Per_ID as Per_ID','tbl_persona.per_Nombre as per_Nombre','tbl_persona.per_Apellido as per_Apellido','tbl_persona.per_Identificacion as per_Identificacion','tbl_estudiante.est_Carnet as est_Carnet');
                            
                

            break;

            case 'carrera':

                $response = DB::table('tbl_persona as persona')
                            ->join('tbl_estudiante as estudiante','estudiante.Est_ID','=','persona.Per_ID')
                            ->whereIn('estudiante.Car_ID',$carreras)
                            ->select('persona.Per_ID as Per_ID','persona.per_Nombre as per_Nombre','persona.per_Apellido as per_Apellido','persona.per_Identificacion as per_Identificacion','estudiante.est_Carnet as est_Carnet');
            
            break;

            case 'carnet':
                $response = DB::table('tbl_persona')
                ->join('tbl_estudiante','tbl_estudiante.Est_ID','=','tbl_persona.Per_ID')
                ->where(function($query) use ($carnet){

                    if(is_array($carnet)){
                        $query->whereIn((DB::raw('substr(tbl_estudiante.est_Carnet,1,4)')),$carnet);
                    }
                    else{
                        $query->where((DB::raw('substr(tbl_estudiante.est_Carnet,1,4)')),'=', $carnet);
                    }
                })
                ->select('tbl_persona.Per_ID as Per_ID','tbl_persona.per_Nombre as per_Nombre','tbl_persona.per_Apellido as per_Apellido','tbl_persona.per_Identificacion as per_Identificacion','tbl_estudiante.est_Carnet as est_Carnet');
    

            break;

            case 'all':
                $response = DB::table('tbl_persona as persona')
                            ->join('tbl_estudiante as estudiante','estudiante.Est_ID','=','persona.Per_ID')
                            ->whereIn('persona.Gen_ID',$generos)
                            ->where(function($query) use ($carreras, $carnet){

                                if(is_array($carreras) && is_array($carnet)){
                                    $query->whereIn('estudiante.Car_ID',$carreras);
                                    $query->whereIn((DB::raw('substr(tbl_estudiante.est_Carnet,1,4)')),$carnet);
                                }
                                else{
                                    $query->where('estudiante.Car_ID','=',$carreras);
                                    $query->where((DB::raw('substr(tbl_estudiante.est_Carnet,1,4)')),'=',$carnet);
                                }
                                
                            })
                            ->select('persona.Per_ID as Per_ID','persona.per_Nombre as per_Nombre','persona.per_Apellido as per_Apellido','persona.per_Identificacion as per_Identificacion','estudiante.est_Carnet as est_Carnet');
            

            break;

            case 'generoCarrera':

                $response = DB::table('tbl_persona as persona')
                            ->join('tbl_estudiante as estudiante','estudiante.Est_ID','=','persona.Per_ID')
                            ->whereIn('persona.Gen_ID',[1,2])
                            ->where(function($query) use ($carreras,$generos){

                                if(is_array($carreras) && is_array($generos)){
                                    $query->whereIn('estudiante.Car_ID',$carreras);
                                    $query->whereIn('persona.Gen_ID',$generos);
                                }
                                else{
                                    $query->where('estudiante.Car_ID','=',$carreras);
                                    $query->where('persona.Gen_ID','=',$generos);
                                }
                                
                            })
                            ->select('persona.Per_ID as Per_ID','persona.per_Nombre as per_Nombre','persona.per_Apellido as per_Apellido','persona.per_Identificacion as per_Identificacion','estudiante.est_Carnet as est_Carnet');

            break;

            case 'generoCarnet':

                $response = DB::table('tbl_persona as persona')
                            ->join('tbl_estudiante as estudiante','estudiante.Est_ID','=','persona.Per_ID')
                            ->where(function($query) use ($carnet,$generos){

                                if(is_array($carnet) && is_array($generos)){
                                    $query->whereIn((DB::raw('substr(tbl_estudiante.est_Carnet,1,4)')),$carnet);
                                    $query->whereIn('persona.Gen_ID',$generos);
                                }
                            })
                            ->select('persona.Per_ID as Per_ID','persona.per_Nombre as per_Nombre','persona.per_Apellido as per_Apellido','persona.per_Identificacion as per_Identificacion','estudiante.est_Carnet as est_Carnet');

            break;

            case 'carreraCarnet':

                $response = DB::table('tbl_persona as persona')
                            ->join('tbl_estudiante as estudiante','estudiante.Est_ID','=','persona.Per_ID')
                            ->where(function($query) use ($carreras,$carnet){

                                if(is_array($carreras) && is_array($carnet)){
                                    $query->whereIn('estudiante.Car_ID',$carreras);
                                    $query->whereIn((DB::raw('substr(estudiante.est_Carnet,1,4)')),$carnet);
                                }
                                
                            })
                            ->select('persona.Per_ID as Per_ID','persona.per_Nombre as per_Nombre','persona.per_Apellido as per_Apellido','persona.per_Identificacion as per_Identificacion','estudiante.est_Carnet as est_Carnet')
                            ->get();

            break;
        
        }

        return $response;
    }

    
}