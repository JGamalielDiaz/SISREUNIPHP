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
        // $Estudent = new EstudiantePost();
        // $Estudent->update($data,$id);
        $dataPer= ['per_Identificacion'=>$data['per_Identificacion']];
        return $this->getModel()->where('Per_ID',$id)->update($dataPer);

        
    }

    public function finById($id)
    {
        if (null== $post = $this->getModel()->find($id)) {

            throw new ModelNotFoundException("Post Not Found");
        }

        return $post;
    }
}

