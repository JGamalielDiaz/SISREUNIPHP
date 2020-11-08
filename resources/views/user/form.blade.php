<div class="form-group">
  {{Form::label('name','Nombre de Usuario')}}
  {{Form::text('username',null, ['class'=>'form-control'])}}
</div>

<hr>

<h3>Lista de Roles</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($roles as $role)
            <li>
                <label>
                    {{Form::checkbox('roles[]',$role->id,null,['class'=>'form-check-input'])}}
                    {{$role->name}}
                    <em>({{$role->description ?: 'N/A'}})</em>
                </label>
            </li>
        @endforeach
    </ul>
</div>

<div class="form-group">
    {{Form::submit('Guardar', ['class'=> 'btn btn-primary'])}}
</div>