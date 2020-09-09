<?php
namespace App\Repositories;
use App\Models\EntidadGenero;
use Exception;

class GeneroPost {

    public function getModel(){
        return new EntidadGenero;
    }

    public function all(){


        return $this->getModel()->all();
       
            
        
    }
}