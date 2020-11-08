  <div class="form-group">
    {{Form::label('per_Nombre','Nombres del Estudiante')}}
    {{Form::text('per_Nombre',null, ['class'=>'form-control'])}}
  </div>
  <hr>

  <div class="form-group">
    {{Form::label('per_Apellido','Apellidos del Estudiante')}}
    {{Form::text('per_Apellido',null, ['class'=>'form-control'])}}
  </div>
  <hr>

  <div class="form-group">
    {{Form::label('per_Identificacion','Identificación del Estudiante')}}
    {{Form::text('per_Identificacion',null, ['class'=>'form-control'])}}
  </div>
  <hr>


  <div class="form-group">
    {{Form::label('est_Carnet','Carné Estudiantil')}}
    {{Form::text('est_Carnet',null, ['class'=>'form-control'])}}
  </div>
  <hr>

  <div class="form-group">
    {{Form::submit('Guardar Cambios', ['class'=> 'btn btn-primary'])}}
  </div>
  <hr>


