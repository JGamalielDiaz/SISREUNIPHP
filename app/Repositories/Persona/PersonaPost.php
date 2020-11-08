<?php
namespace Repositories\Persona;

use App\Repositories\Persona\EntidadPersona;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;
use Repositories\Estudiante\EstudiantePost;

class PersonaPost implements IPersonaPost{

    public function getModel(){

        return new EntidadPersona;
    }

    public function all()
    {
        return $this->getModel()->all();
    }

    public function create(array $data)
    {
        $Persona = $this->getModel()->create($data);

        $Lastid = $Persona->id;

        $dataEstuden = Arr::add($data,'Est_ID',$Lastid);

        $Estudent = new EstudiantePost();
        $Estudent->create($dataEstuden);

        return $Persona;
        
    }

    public function update(array $data, $id)
    {
        $flag = true;
        try {
            //code...

            $Estudent = new EstudiantePost();
            $dataStudentUpdate= [
                'per_Identificacion'=>$data['per_Identificacion'],
                'per_Nombre' => $data['per_Nombre'],
                'per_Apellido' => $data['per_Apellido']
            ];

            if($this->getModel()->where('Per_ID',$id)->update($dataStudentUpdate)){

                $Estudent->update($data,$id);
            } 

            return $flag;
            
        } catch (\Throwable $th) {
            //throw $th;
            return !$flag;
        }
        

        return $flag;
    }

    public function finById($id)
    {
        if (null== $post = $this->getModel()->where('Per_ID','=',$id)) {

            throw new ModelNotFoundException("Post Not Found");
        }

        return $post;
    } 
}

