<?php

namespace App\Http\Controllers;

use App\Models\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Persona\EntidadPersona;
use Illuminate\Support\Arr;
use Caffeinated\Shinobi\Models\Permission;
use App\Repositories\Usuario\UsuarioPostFP;
use App\Http\Requests\UserCreateRequest;


class UserController extends Controller
{
    //

    protected $model;

    public function __construct(UsuarioPostFP $model)
    {
        $this->middleware('auth');
        
        $this->model = $model;
        
    }



    public function index()
    {
        //
        $users = DB::table('tbl_persona AS per')
                    ->join ('users','users.Per_ID','=','per.Per_ID')
                    ->select('per.Per_ID','per.per_Nombre','per.per_Apellido','users.id')
                    ->get();

        return view('user.showUser',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name','id');
        $permission = Permission::get();
 
        return view('user.createUser',compact('roles','permission'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        //
        $persona= EntidadPersona::create($request->validated());

        $addIdRequest= Arr::add($request->validated(),'Per_ID',$persona->id);
        
        
        $cam= array_replace($addIdRequest,array('password'=> bcrypt($request->password)));

        $user= $this->model->create($cam);

        $user->roles()->sync($request->get('roles'));

        return back()->with('Message','Usuario Creado Con Exito!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

        $roles= Role::get();

        return view('user.editUser',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //

        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.show',$user->id)->with('info','Usuario Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
