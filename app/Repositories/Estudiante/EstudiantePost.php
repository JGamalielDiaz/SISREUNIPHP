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

    public function getIinfoFilter(array $data){
        $carnetFilter = ($data['carnetFilter'])?:false;
        $carreraFilter = ($data['carreraFilter'])?:false;
        $generoFilter = ($data['generoFilter'])?:false;
    }
}