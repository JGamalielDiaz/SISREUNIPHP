<?php
namespace App\Repositories;
use App\Models\EntidadGenero;

class GeneroPost {

    public function getModel(){
        return new EntidadGenero;
    }

    public function all(){

        return $this->getModel()->all();
    }
}