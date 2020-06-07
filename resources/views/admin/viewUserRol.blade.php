<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary">Registro de Usuario al Sistema</div>
                    <div class="card-body">
                    <form action="{{route('admin.UserRegister')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label for="lblNombre" class="col-sm-10 col-form-label">Ingrese Nombre del Usuario</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="per_Nombre">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group row">
                                  <label for="lblApellidos" class="col-sm-10 col-form-label">Apellidos del Usuario</label>
                                  <div class="col-sm-10">
                                    <input type="text" name="per_Apellido" id="txtApellido" class="form-control" placeholder="Apellidos">
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                  <label for="lblIdentifacion" class="col-sm-10 col-form-label">Identificacion del Usuario</label>
                                  <div class="col-sm-10">
                                    <input type="text" name="per_Identificacion" id="txtidentificacion" class="form-control" placeholder="Identificacion" >
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                  <label for="lblemail" class="col-sm-10 col-form-label">correo</label>
                                  <div class="col-sm-10">
                                    <input type="email" name="email" id="txtemail" class="form-control" placeholder="correo" >
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                  <label for="lblname" class="col-sm-10 col-form-label">Nombre de Usuario</label>
                                  <div class="col-sm-10">
                                    <input type="text" name="name" id="txtname" class="form-control" placeholder="Nombre de usuario" >
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                  <label for="lblPass" class="col-sm-10 col-form-label">Ingrese una Contraseña</label>
                                  <div class="col-sm-10">
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password ">
                                  </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
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
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label for="lblPermisos" class="col-sm-10 col-form-label">Seleccione los Permisos que Tendra el Usuario</label>
                                  <div class="col-sm-10">
                                        <div class="form-check">
                                            @foreach ($permission as $permiss)
                                                <li>
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permission[]" id="txtPermission" value="{{$permiss->id}}">
                                                        {{$permiss->name}}
                                                    </label>
                                                </li>
                                                
                                            @endforeach
                                        </div>
                                  </div>
                                </div>
                            </div>
                        </div>
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
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
    
