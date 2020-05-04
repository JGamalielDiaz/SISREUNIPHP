<?php

namespace Repositories\Estudiante;

use App\Repositories\Estudiante\EntidadEstudiante;
use Repositories\Estudiante\IEstudiantePost;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
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
        return $this->getModel()->where('id',$id)->update($data);
    }

    public function finById($id)
    {
        if (null== $post = $this->getModel()->find($id)) {

            throw new ModelNotFoundException("Post Not Found");
        }

        return $post;
    }

}