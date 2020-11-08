 @extends('Layout.layout')
 @section('Content')
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('Message'))
                    <div class="alert alert-info alert-dismissible">{{ session::get('Message') }}
                        <button type="button" class="close " data-dismiss="alert">&times;</button>
                    </div>
                    
                @endif

                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div cla
                ss="card border-primary">
                    <div class="card-header bg-primary">Registro de Usuario al Sistema</div>
                    <div class="card-body">
                    <form action="{{route('user.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-2"><br></div>
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label for="lblNombre" class="col-sm-10 col-form-label">Ingrese Nombre del Usuario</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="per_Nombre">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"><br></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><br></div>
                            <div class="col-md-8">
                                <div class="form-group row">
                                <label for="lblApellidos" class="col-sm-10 col-form-label">Apellidos del Usuario</label>
                                <div class="col-sm-10">
                                    <input type="text" name="per_Apellido" id="txtApellido" class="form-control" placeholder="Apellidos">
                                </div>
                                </div>
                            </div>
                            <div class="col-md-2"><br></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><br></div>
                            <div class="col-md-8">
                                <div class="form-group row">
                                <label for="lblIdentifacion" class="col-sm-10 col-form-label">Identificacion del Usuario</label>
                                <div class="col-sm-10">
                                    <input type="text" name="per_Identificacion" id="txtidentificacion" class="form-control" placeholder="Identificacion" >
                                </div>
                                </div>
                            </div>
                            <div class="col-md-2"><br></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><br></div>
                            <div class="col-md-8">
                                <div class="form-group row">
                                <label for="lblemail" class="col-sm-10 col-form-label">correo</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" id="txtemail" class="form-control" placeholder="correo" >
                                </div>
                                </div>
                            </div>
                            <div class="col-md-2"><br></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><br></div>
                            <div class="col-md-8">
                                <div class="form-group row">
                                <label for="lblname" class="col-sm-10 col-form-label">Nombre de Usuario</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" id="txtname" class="form-control" placeholder="Nombre de usuario" >
                                </div>
                                </div>
                            </div>
                            <div class="col-md-2"><br></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><br></div>
                            <div class="col-md-8">
                                <div class="form-group row">
                                <label for="lblPass" class="col-sm-10 col-form-label">Ingrese una Contraseña</label>
                                <div class="col-sm-10">
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password ">
                                </div>
                                </div>
                                <div class="col-md-2"><br></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><br></div>
                            <div class="col-md-8">
                                <div class="form-group row">
                                <label for="lblRol" class="col-sm-10 col-form-label">Seleccion el Rol del Usuario</label>
                                <div class="col-sm-10">
                                    <select name="roles" id="txtRol" class="form-control selectpicker">
                                        @foreach ($roles as $key=> $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                       {{--  <div class="row">
                            <div class="col-md-2"><br></div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label for="lblPermisos" class="col-sm-10 col-form-label">Seleccione los Permisos que Tendra el Usuario</label>
                                <div class="col-sm-10">
                                        <div class="n-chk">
                                            @foreach ($permission as $permiss)
                                               <li> 
                                                    <label class="new-control new-checkbox checkbox-primary">
                                                        <input type="checkbox" class="new-control-input" name="permission[]" id="txtPermission" value="{{$permiss->id}}">
                                                        <span class="new-control-indicator"></span>
                                                        {{$permiss->name}}
                                                    </label>
                                               </li>
                                                
                                                
                                            @endforeach
                                        </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-2"><br></div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

        </div>
 @endsection
    