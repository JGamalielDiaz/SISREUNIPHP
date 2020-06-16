<?php

namespace App\Repositories\Usuario;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsuarioPostFP {

    public function getModel(){

        return new User();
    }

    public function all(){
        return $this->getModel()->all();
    }

    public function create(array $data){

        return $this->getModel()->create($data);
    }

    public function finByID($id){

        if (null== $post = $this->getModel()->find($id)) {

            throw new ModelNotFoundException("Post Not Found");
        }

        return $post;
    }
}