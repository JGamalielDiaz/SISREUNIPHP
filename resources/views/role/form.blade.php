<div class="form-group">
  {{Form::label('name','Nombre del Rol')}}
  {{Form::text('name',null, ['class'=>'form-control'])}}
</div>

<hr>

<div class="form-group">
    {{Form::label('slug','URL amigable')}}
    {{Form::text('slug',null,['class'=> 'form-control'])}}
</div>

<hr>

<div class="form-group">
    {{Form::label('description','Descripcion')}}
    {{Form::text('description',null,['class'=> 'form-control'])}}
</div>
 <hr>
 
<h3>Lista de Roles</h3>
<div class="form-group row">
    <div class="col-md-12">
        <ul class="list-unstyled">
            @foreach ($permissions as $permission)
                <li>
                    <label class=" mt-2">
                        {{Form::checkbox('permissions[]',$permission->id,null,['class'=>'form-check-input'])}}
                        {{$permission->name}}
                        <em class="text-secondary">({{$permission->description ?: 'N/A'}})</em>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
    
    
</div>

<div class="form-group">
    {{Form::submit('Guardar', ['class'=> 'btn btn-primary'])}}
</div>