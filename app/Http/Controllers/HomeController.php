<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Repositories\Carrera\CarreraClass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getTotalStudentForCarrera(Request $request){

        if($request->ajax()){

            $data = new CarreraClass();
            $data = $data->getCarreraInfo();
        }

        return response()->json($data);
        
    }
}
