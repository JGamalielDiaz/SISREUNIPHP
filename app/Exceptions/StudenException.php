<?php
namespace App\Exceptions;
use Exception;
use Illuminate\Support\Facades\Redirect;

class StudenException extends Exception{

    public function report (){

    }

    public function render($request){

        return response()->view(
            'Layout.layout',
            array(
                'exception' => $this
            ));
        
    }

}