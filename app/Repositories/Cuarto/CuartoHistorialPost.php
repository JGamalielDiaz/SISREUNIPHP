<?php 

namespace Repositories\Cuarto;

use App\Models\EntidadHisEstuCuarto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CuartoHistorialPost implements ICuartoHistorialPost{


    public function getModel()
    {
        return new EntidadHisEstuCuarto;
    }

    public function all()
    {
        return $this->getModel()->all();
    }

    public function create(array $data)
    {
        $date = Carbon::now();
        $HisCuarto = $this->getModel();
            $HisCuarto->Est_ID = $data['Est_ID'];
            $HisCuarto->Cuar_ID = $data['Cuar_ID'];
            $HisCuarto->hisCuarto_FechaInicial = $date->toDateString();
            $HisCuarto->hisCuarto_FechaFinal = null;
            $HisCuarto->Usu_ID= null;
            $HisCuarto->hisCuarto_MotivoCambio= 'Primer Asignacion de Cuarto';
            $HisCuarto->hisCuarto_Estado = true;
        $HisCuarto->save();

        return $HisCuarto;
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