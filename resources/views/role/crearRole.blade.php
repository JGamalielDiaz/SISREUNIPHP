 @extends('Layout.layout')
  @section('Content')
        <div class="container">
            @if(Session::has('Message'))
            <div class="alert alert-info">{{ session::get('Message') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="card border-primary">
                        <div class="card-header bg-primary">Registro de Roles</div>
                        <div class="card-body">
                        <form action="{{route('role.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label for="lblNombre" class="col-sm-10 col-form-label">Nombre del Rol</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group row">
                                    <label for="lblApellidos" class="col-sm-10 col-form-label">URL Amigable</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="slug" id="txtslug" class="form-control" placeholder="Rol.algo">
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group row">
                                    <label for="lblIdentifacion" class="col-sm-10 col-form-label">Descripcion del Rol</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="description" id="description" class="form-control" placeholder="descripcion" >
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                    <label for="lblPermisos" class="col-sm-10 col-form-label">Seleccione los Permisos que Tendra el Rol</label>
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
  @endsection
    